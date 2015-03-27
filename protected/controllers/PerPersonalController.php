<?php

class PerPersonalController extends Controller
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
				'actions'=>array('view','create','update','admin','export','calendar', 'calendarEvents','selecpais',),
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
				
		$model=new PerPersonal;
                $path_picture = realpath( Yii::app( )->getBasePath( )."/../personal_foto" )."/";//ruta final de la imagen
                
		date_default_timezone_set('America/La_Paz');
                $time = time();
                $fecha = date("Y-m-d H:i:s", $time); 
		// $this->performAjaxValidation($model);

		if(isset($_POST['PerPersonal']))
		{
			$transaction = Yii::app()->db->beginTransaction();
			try{
				$messageType='warning';
				$message = "Hay algunos errores ";
				$model->attributes=$_POST['PerPersonal'];
                                ///////////////////subir Imagen/////////////////////
                                 $rnd = rand(0,9999);  // generate random number between 0-9999
                                    $uploadedFile=CUploadedFile::getInstance($model,'picture');
                                    $fileName = "{$rnd}-{$uploadedFile}";  // random number + file name or puedes usar: $fileName=$uploadedFile->getName();

                                    if(!empty($uploadedFile))  // check if uploaded file is set or not
                                    {
                                        //$uploadedFile->saveAs(Yii::app()->basePath.'/../banner/'.$fileName);  // image will uplode to rootDirectory/banner/
                                        $uploadedFile->saveAs($path_picture.$fileName);
                                        $model->foto= $fileName;
                                    }
                                ////////////////////////////////////////////////////
                                $model->fecha_modificacion= "0000-00-00 00:00:00" ;
                                $model->fk_usuario_creacion=Yii::app()->user->getState('usuario');
                                $model->fk_usuario_modificacion = 0;
                                $model->fk_estado = 136;
				if($model->save()){
					$messageType = 'success';
					$message = "<strong>Muy Bien!</strong> Usted Registro los datos con éxito";					
					$transaction->commit();
					Yii::app()->user->setFlash($messageType, $message);
					$this->redirect(array('view','id'=>$model->pk_id_personal));
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

	
	public function actionUpdate($id)
	{
		
		$model=$this->loadModel($id);
                $path_picture = realpath( Yii::app( )->getBasePath( )."/../personal_foto" )."/";//ruta final de la imagen
                
		date_default_timezone_set('America/La_Paz');
                $time = time();
                $fecha = date("Y-m-d H:i:s", $time); 
		// $this->performAjaxValidation($model);

		if(isset($_POST['PerPersonal']))
		{
			$messageType='warning';
			$message = "Hay algunos errores ";
			$transaction = Yii::app()->db->beginTransaction();
			try{
				$model->attributes=$_POST['PerPersonal'];
                                 ////////////////////////////////////////////////////////////////////
                                    $rnd = rand(0,9999);  // generate random number between 0-9999
                                    $uploadedFile=CUploadedFile::getInstance($model,'picture');

                                    if ($model->foto==''||$model->foto==null) {//si el campo de la imagen está vacio o es null

                                        $fileName = "{$rnd}-{$uploadedFile}";  // random number + file name or puedes usar: $fileName=$uploadedFile->getName();
                                    }
                                    else{//ya tenemos una imagen registrada
                                        $fileName=$model->foto;
                                    }

                                    if(!empty($uploadedFile))  // check if uploaded file is set or not
                                    {

                                        $uploadedFile->saveAs($path_picture.$fileName);// image will uplode to rootDirectory/banner/
                                        $model->foto=$fileName;

                                    }
                                    ////////////////////////////////////////////////////////////////////                               
                                $model->fk_usuario_modificacion=Yii::app()->user->getState('usuario');
                                
				$messageType = 'success';
				$message = "<strong>Muy Bien !</strong> Actualizo los datos con éxito ";		
				if($model->save()){
					$transaction->commit();
					Yii::app()->user->setFlash($messageType, $message);
					$this->redirect(array('view','id'=>$model->pk_id_personal));
				}
			}
			catch (Exception $e){
				$transaction->rollBack();
				Yii::app()->user->setFlash('error', "{$e->getMessage()}");
				// $this->refresh(); 
			}

			$model->attributes=$_POST['PerPersonal'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->pk_id_personal));
		}
		$this->render('update',array('model'=>$model,'fechaSer'=>$fecha));
		
			}

	public function actionIndex()
	{
		/*
		$dataProvider=new CActiveDataProvider('PerPersonal');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
		*/
		
		$model=new PerPersonal('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['PerPersonal']))
			$model->attributes=$_GET['PerPersonal'];

		$this->render('index',array(
			'model'=>$model,
					));
		
			}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		
		$model=new PerPersonal('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['PerPersonal']))
			$model->attributes=$_GET['PerPersonal'];

		$this->render('admin',array(
			'model'=>$model,
					));
		
			}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return PerPersonal the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=PerPersonal::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param PerPersonal $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='per-personal-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
	
	public function actionExport()
    {
        $model=new PerPersonal;
		$model->unsetAttributes();  // clear any default values
		if(isset($_POST['PerPersonal']))
			$model->attributes=$_POST['PerPersonal'];

		$exportType = $_POST['fileType'];
        $this->widget('ext.heart.export.EHeartExport', array(
            'title'=>'List of PerPersonal',
            'dataProvider' => $model->search(),
            'filter'=>$model,
            'grid_mode'=>'export',
            'exportType'=>$exportType,
            'columns' => array(
	                
					'pk_id_personal',
					'fk_tipo_identidad',
					'fk_expedido_pais',
					'fk_expedido_ciudad',
					'identidad',
					'nombre_completo',
					'apellido_paterno',
					'apellido_materno',
					'fecha_nacimiento',
					'fk_profesion',
					'direccion',
					'telefono',
					'celular',
					'fk_sexo',
					'fk_estado_civil',
					'foto',
					'fk_estado',
					'fecha_creacion',
					'fecha_modificacion',
					'fk_usuario_creacion',
					'fk_usuario_modificacion',
	            ),
        ));
    }	
	public function actionCalendar()
	{
		$model=new PerPersonal('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['PerPersonal']))
			$model->attributes=$_GET['PerPersonal'];
		$this->render('calendar',array(
			'model'=>$model,
		));	
	}

	public function actionCalendarEvents()
	{	 	
	 	$items = array();
	 	$model=PerPersonal::model()->findAll();	
		foreach ($model as $value) {
			$items[]=array(
				'id'=>$value->pk_id_personal,
								
				//'color'=>'#CC0000',
	        	//'allDay'=>true,
	        	'url'=>'#',
			);
		}
	    echo CJSON::encode($items);
	    Yii::app()->end();
	}

	public function actionselecpais()
        {
            $id_uno = $_POST['PerPersonal']['fk_expedido_pais'];
            $lista = PerCiudad::model()->findAll('fk_pais = :fk_expedido_pais',array(':fk_expedido_pais'=>$id_uno));
            $lista = CHtml::listData($lista,'pk_id_ciudad','ciudad');
            
            echo CHtml::tag('option', array('value' => ''), 'Seleccione la Ciudad', true);
            
            foreach ($lista as $valor => $descripcion){
                echo CHtml::tag('option',array('value'=>$valor),CHtml::encode($descripcion), true );
                
            }
            
        }
}
