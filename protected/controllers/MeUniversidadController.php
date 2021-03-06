<?php

class MeUniversidadController extends Controller
{
	
	
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
		
	public $layout='//layouts/column3';		
		/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
						
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
						
		);
	}
	
		/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('view','create','update','admin','export',),
                                'expression' => function ($user) 
                                {return (($user->getState('tipo') == 1));},
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}
		
	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
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

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
				
		$model=new MeUniversidad;

		date_default_timezone_set('America/La_Paz');
                $time = time();
                $fecha = date("Y-m-d H:i:s", $time); 
		// $this->performAjaxValidation($model);

		if(isset($_POST['MeUniversidad']))
		{
			$transaction = Yii::app()->db->beginTransaction();
			try{
				$messageType='warning';
				$message = "Hay algunos errores ";
				$model->attributes=$_POST['MeUniversidad'];
				
				if($model->save()){
					$messageType = 'success';
					$message = "<strong>Muy Bien!</strong> Usted Registro los datos con éxito";					
					$transaction->commit();
					Yii::app()->user->setFlash($messageType, $message);
					$this->redirect(array('view','id'=>$model->pk_id_universidad));
				}				
			}
			catch (Exception $e){
				$transaction->rollBack();
				Yii::app()->user->setFlash('error', "{$e->getMessage()}");
				//$this->refresh();
			}
			
		}
                    $this->render('create',array('model'=>$model,'fechaSer'=>$fecha));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		
		$model=$this->loadModel($id);

		date_default_timezone_set('America/La_Paz');
                $time = time();
                $fecha = date("Y-m-d H:i:s", $time); 
		// $this->performAjaxValidation($model);

		if(isset($_POST['MeUniversidad']))
		{
			$messageType='warning';
			$message = "Hay algunos errores ";
			$transaction = Yii::app()->db->beginTransaction();
			try{
				$model->attributes=$_POST['MeUniversidad'];
				$messageType = 'success';
				$message = "<strong>Muy Bien!</strong> Usted Actualizo los datos con éxito";			
				if($model->save()){
					$transaction->commit();
					Yii::app()->user->setFlash($messageType, $message);
					$this->redirect(array('view','id'=>$model->pk_id_universidad));
				}
			}
			catch (Exception $e){
				$transaction->rollBack();
				Yii::app()->user->setFlash('error', "{$e->getMessage()}");
				// $this->refresh(); 
			}

			$model->attributes=$_POST['MeUniversidad'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->pk_id_universidad));
		}
            $this->render('update',array('model'=>$model,'fechaSer'=>$fecha));	
	}
		
	public function actionAdmin()
	{
		
		$model=new MeUniversidad('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['MeUniversidad']))
			$model->attributes=$_GET['MeUniversidad'];

		$this->render('admin',array(
			'model'=>$model,
					));
		
			}

	public function loadModel($id)
	{
		$model=MeUniversidad::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param MeUniversidad $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='me-universidad-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
	
	public function actionExport()
    {
        $model=new MeUniversidad;
		$model->unsetAttributes();  // clear any default values
		if(isset($_POST['MeUniversidad']))
			$model->attributes=$_POST['MeUniversidad'];

		$exportType = $_POST['fileType'];
        $this->widget('ext.heart.export.EHeartExport', array(
            'title'=>'List of MeUniversidad',
            'dataProvider' => $model->search(),
            'filter'=>$model,
            'grid_mode'=>'export',
            'exportType'=>$exportType,
            'columns' => array(
	                
					'pk_id_universidad',
					'universidad',
					'detalle',
					'fecha',
	            ),
        ));
    }    
}
