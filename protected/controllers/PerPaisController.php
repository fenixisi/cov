<?php

class PerPaisController extends Controller
{	
		
	public $layout='//layouts/column3';		

	public function filters()
	{
		return array(
						
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
						
		);
	}
	
	public function accessRules()
	{
		return array(			
                        array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view','create','update','admin','export',),
                                'expression' => function ($user) 
                                {return (($user->getState('tipo') == 1));},
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}
		
	public function actionView($id)
	{
		
		if(isset($_GET['asModal'])){
			$this->renderPartial('view',array(
				'model'=>$this->loadModel($id),
			));
		}
		else{
						
			$this->render('view',array(
				'model'=>$this->loadModel($id),
			));
			
		}
	}

	public function actionCreate()
	{
				
		$model=new PerPais;

		date_default_timezone_set('America/La_Paz');
                $time = time();
                $fecha = date("Y-m-d H:i:s", $time); 
		 //$this->performAjaxValidation($model);

		if(isset($_POST['PerPais']))
		{
			$transaction = Yii::app()->db->beginTransaction();
                        $model->fecha = $fecha;
			try{
				$messageType='warning';
				$message = "Hay algunos errores ";
				$model->attributes=$_POST['PerPais'];	                                
				if($model->save()){
					$messageType = 'success';
					$message = "<strong>Muy Bien!</strong> Usted Registro los datos con éxito";					
					$transaction->commit();
					Yii::app()->user->setFlash($messageType, $message);
					$this->redirect(array('view','id'=>$model->pk_id_pais));
				}				
			}
			catch (Exception $e){
				$transaction->rollBack();
				Yii::app()->user->setFlash('error', "{$e->getMessage()}");
				//$this->refresh();
			}
			
		}

		$this->render('create',array('model'=>$model,'fe'=>$fecha));
		
				
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['PerPais']))
		{
			$messageType='warning';
			$message = "Hay algunos errores ";
			$transaction = Yii::app()->db->beginTransaction();
			try{
				$model->attributes=$_POST['PerPais'];                                
				$messageType = 'success';
				$message = "<strong>Muy Bien !</strong> Actualizo los datos con éxito ";
				
				if($model->save()){
					$transaction->commit();
					Yii::app()->user->setFlash($messageType, $message);
					$this->redirect(array('view','id'=>$model->pk_id_pais));
				}
			}
			catch (Exception $e){
				$transaction->rollBack();
				Yii::app()->user->setFlash('error', "{$e->getMessage()}");
				// $this->refresh(); 
			}

			$model->attributes=$_POST['PerPais'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->pk_id_pais));
		}

		$this->render('update',array(
			'model'=>$model,
					));
		
			}
	
	public function actionIndex()
	{
		/*
		$dataProvider=new CActiveDataProvider('PerPais');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
		*/
		
		$model=new PerPais('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['PerPais']))
			$model->attributes=$_GET['PerPais'];

		$this->render('index',array(
			'model'=>$model,
					));
		
			}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		
		$model=new PerPais('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['PerPais']))
			$model->attributes=$_GET['PerPais'];

		$this->render('admin',array(
			'model'=>$model,
					));
		
			}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return PerPais the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=PerPais::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param PerPais $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='per-pais-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
	
	public function actionExport()
    {
        $model=new PerPais;
		$model->unsetAttributes();  // clear any default values
		if(isset($_POST['PerPais']))
			$model->attributes=$_POST['PerPais'];

		$exportType = $_POST['fileType'];
        $this->widget('ext.heart.export.EHeartExport', array(
            'title'=>'List of PerPais',
            'dataProvider' => $model->search(),
            'filter'=>$model,
            'grid_mode'=>'export',
            'exportType'=>$exportType,
            'columns' => array(
	                
					'pk_id_pais',
					'pais',
					'detalle',
					'fecha',
	            ),
        ));
    }	
}
