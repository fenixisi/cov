<?php

class SysCatalogoController extends Controller
{
			
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
				
		$model=new SysCatalogo;

		// $this->performAjaxValidation($model);
                date_default_timezone_set('America/La_Paz');
                $time = time();
                $fecha = date("Y-m-d H:i:s", $time); 

		if(isset($_POST['SysCatalogo']))
		{
			$transaction = Yii::app()->db->beginTransaction();
                        $model->fecha_creacion = $fecha; 
			try{
				$messageType='warning';
				$message = "Hay algunos errores ";
				$model->attributes=$_POST['SysCatalogo'];
                                $model->fk_usuario_creacion=Yii::app()->user->getState('usuario');
				if($model->save()){
					$messageType = 'success';
					$message = "<strong>Muy Bien!</strong> Usted Registro los datos con éxito";						
					$transaction->commit();
					Yii::app()->user->setFlash($messageType, $message);
					$this->redirect(array('view','id'=>$model->pk_id_catalogo));
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

	public function actionUpdate($id)
	{
		
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['SysCatalogo']))
		{
			$messageType='warning';
			$message = "Hay algunos errores ";
			$transaction = Yii::app()->db->beginTransaction();
			try{
				$model->attributes=$_POST['SysCatalogo'];
                                $model->fk_usuario_creacion=Yii::app()->user->getState('usuario');
				$messageType = 'success';
				$message = "<strong>Muy Bien!</strong> Actualizo los datos con éxito ";			
				if($model->save()){
					$transaction->commit();
					Yii::app()->user->setFlash($messageType, $message);
					$this->redirect(array('view','id'=>$model->pk_id_catalogo));
				}
			}
			catch (Exception $e){
				$transaction->rollBack();
				Yii::app()->user->setFlash('error', "{$e->getMessage()}");
				// $this->refresh(); 
			}

			$model->attributes=$_POST['SysCatalogo'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->pk_id_catalogo));
		}

		$this->render('update',array(
			'model'=>$model,
					));
		
			}
                        	
	public function actionAdmin()
	{
		
		$model=new SysCatalogo('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['SysCatalogo']))
			$model->attributes=$_GET['SysCatalogo'];

		$this->render('admin',array(
			'model'=>$model,
					));
		
			}
                        
	public function loadModel($id)
	{
		$model=SysCatalogo::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param SysCatalogo $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='sys-catalogo-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
	
	public function actionExport()
    {
        $model=new SysCatalogo;
		$model->unsetAttributes();  // clear any default values
		if(isset($_POST['SysCatalogo']))
			$model->attributes=$_POST['SysCatalogo'];

		$exportType = $_POST['fileType'];
        $this->widget('ext.heart.export.EHeartExport', array(
            'title'=>'List of SysCatalogo',
            'dataProvider' => $model->search(),
            'filter'=>$model,
            'grid_mode'=>'export',
            'exportType'=>$exportType,
            'columns' => array(
	                
					'pk_id_catalogo',
					'tabla',
					'nombre',
					'valor',
					'estado',
					'fecha_creacion',
					'fk_usuario_creacion',
	            ),
        ));
    }	
	
}
