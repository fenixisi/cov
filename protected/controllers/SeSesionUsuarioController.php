<?php

class SeSesionUsuarioController extends Controller
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
				'actions'=>array('view','create','update','admin','export','activar','Inactivar','AdminSesion',),
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
	
        public function actionCreate($id)
	{
				
		$model=new SeSesionUsuario;
                $personal= PerPersonal::model()->findByPk($id);

		date_default_timezone_set('America/La_Paz');
                $time = time();
                $fecha = date("Y-m-d H:i:s", $time); 
		// $this->performAjaxValidation($model);

		if(isset($_POST['SeSesionUsuario']))
		{
			$transaction = Yii::app()->db->beginTransaction();
			try{
				$messageType='warning';
				$message = "Hay algunos errores ";
				$model->attributes=$_POST['SeSesionUsuario'];
                                $texto = $model->cuenta;
                                $model->cuenta= $texto."@viscarra.com";                                
				$model->fecha_modificacion= "0000-00-00 00:00:00" ;
                                $model->fk_usuario_creacion=Yii::app()->user->getState('usuario');
                                $model->fk_usuario_modificacion = 0;
                                $model->fk_estado = 200;
                                $model->fk_personal=$personal->pk_id_personal;
                                
				if($model->save()){
					$messageType = 'success';
					$message = "<strong>Muy Bien!</strong> Usted Registro los datos con éxito";					
					$transaction->commit();
					Yii::app()->user->setFlash($messageType, $message);
					$this->redirect(array('view','id'=>$model->pk_id_usuario));
				}				
			}
			catch (Exception $e){
				$transaction->rollBack();
				Yii::app()->user->setFlash('error', "{$e->getMessage()}");
				//$this->refresh();
			}
			
		}

		$this->render('create',array('model'=>$model,'fechaSer'=>$fecha,'personal'=>$personal));
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

		if(isset($_POST['SeSesionUsuario']))
		{
			$messageType='warning';
			$message = "Hay algunos errores ";
			$transaction = Yii::app()->db->beginTransaction();
			try{
				$model->attributes=$_POST['SeSesionUsuario'];
                                $model->fk_usuario_creacion=Yii::app()->user->getState('usuario');  
				$messageType = 'success';
				$message = "<strong>Muy Bien!</strong> Usted Actualizo los datos con éxito";
				if($model->save()){
					$transaction->commit();
					Yii::app()->user->setFlash($messageType, $message);
					$this->redirect(array('view','id'=>$model->pk_id_usuario));
				}
			}
			catch (Exception $e){
				$transaction->rollBack();
				Yii::app()->user->setFlash('error', "{$e->getMessage()}");
				// $this->refresh(); 
			}

			$model->attributes=$_POST['SeSesionUsuario'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->pk_id_usuario));
		}

		$this->render('update',array('model'=>$model,'fechaSer'=>$fecha));		
	}
	
	public function actionIndex()
	{
		/*
		$dataProvider=new CActiveDataProvider('SeSesionUsuario');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
		*/
		
		$model=new SeSesionUsuario('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['SeSesionUsuario']))
			$model->attributes=$_GET['SeSesionUsuario'];

		$this->render('index',array(
			'model'=>$model,
					));
		
			}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		
		$model=new SeSesionUsuario('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['SeSesionUsuario']))
			$model->attributes=$_GET['SeSesionUsuario'];

		$this->render('admin',array('model'=>$model,));	
       }	
                        
	public function loadModel($id)
	{
		$model=SeSesionUsuario::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param SeSesionUsuario $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='se-sesion-usuario-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
	
	public function actionExport()
    {
        $model=new SeSesionUsuario;
		$model->unsetAttributes();  // clear any default values
		if(isset($_POST['SeSesionUsuario']))
			$model->attributes=$_POST['SeSesionUsuario'];

		$exportType = $_POST['fileType'];
        $this->widget('ext.heart.export.EHeartExport', array(
            'title'=>'List of SeSesionUsuario',
            'dataProvider' => $model->search(),
            'filter'=>$model,
            'grid_mode'=>'export',
            'exportType'=>$exportType,
            'columns' => array(
	                
					'pk_id_usuario',
					'fk_tipo_cuenta',
					'fk_personal',
					'cuenta',
					'contrasenia',
					'fk_estado',
					'fecha_creacion',
					'fecha_modificacion',
					'fk_usuario_creacion',
					'fk_usuario_modificacion',
	            ),
        ));
    }
        
        public function actionAdminSesion()
        {
            $sesion = new SeSesionUsuario;
            $personal = new PerPersonal;            

            if(isset($_GET['SeSesionUsuarioController']))               
                $sesion->attributes=$_GET['SeSesionUsuarioController'];

            if(isset($_GET['PerPersonal']))
                $personal->attributes=$_GET['PerPersonal'];           
           
            $this->render('admin_sesion',array(
                'sesion'=>$sesion,
                'personal'=>$personal,                            
                ));
        }
        
        public function actionInactivar($id)
        {                      
            SeSesionUsuario::model()->updateByPk($id, array('fk_estado'=>205));            
            $this->redirect(array('admin'));
        }
        public function actionActivar($id)
        {                      
            SeSesionUsuario::model()->updateByPk($id, array('fk_estado'=>200));            
            $this->redirect(array('admin'));
        }

	
}
