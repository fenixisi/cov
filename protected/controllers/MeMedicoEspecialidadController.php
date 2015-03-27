<?php

class MeMedicoEspecialidadController extends Controller
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
	public function actionCreate($id)
	{
				
		$model=new MeMedicoEspecialidad;
                $medico= MeMedico::model()->findByPk($id);
                $personal= PerPersonal::model()->findByPk($medico->fk_personal);
                date_default_timezone_set('America/La_Paz');
                $time = time();
                $fecha = date("Y-m-d H:i:s", $time); 
		
		// $this->performAjaxValidation($model);

		if(isset($_POST['MeMedicoEspecialidad']))
		{
			$transaction = Yii::app()->db->beginTransaction();
			try{
				$messageType='warning';
				$message = "Hay algunos errores ";
                                $model->fk_medico=$id;
				$model->attributes=$_POST['MeMedicoEspecialidad'];
				$model->fecha_modificacion= "0000-00-00 00:00:00" ;
                                $model->fk_usuario_creacion=Yii::app()->user->getState('usuario');
                                $model->fk_usuario_modificacion = 0;
                                
				if($model->save()){
					$messageType = 'success';
					$message = "<strong>Muy Bien!</strong> Usted Registro los datos con éxito";				
					$transaction->commit();
					Yii::app()->user->setFlash($messageType, $message);
					$this->redirect(array('view','id'=>$model->pk_id_medico_especialidad));
				}				
			}
			catch (Exception $e){
				$transaction->rollBack();
				Yii::app()->user->setFlash('error', "{$e->getMessage()}");
				//$this->refresh();
			}
			
		}
                $this->render('create',array('model'=>$model,'fechaSer'=>$fecha,'personal'=>$personal,'medico'=>$medico));
	}
	
	public function actionUpdate($id)
	{
		
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['MeMedicoEspecialidad']))
		{
			$messageType='warning';
			$message = "Hay algunos errores ";
			$transaction = Yii::app()->db->beginTransaction();
			try{
				$model->attributes=$_POST['MeMedicoEspecialidad'];                                
                                $model->fk_usuario_modificacion=Yii::app()->user->getState('usuario');
				$messageType = 'success';
				$message = "<strong>Muy Bien!</strong> Usted Actualizo los datos con éxito";
				if($model->save()){
					$transaction->commit();
					Yii::app()->user->setFlash($messageType, $message);
					$this->redirect(array('view','id'=>$model->pk_id_medico_especialidad));
				}
			}
			catch (Exception $e){
				$transaction->rollBack();
				Yii::app()->user->setFlash('error', "{$e->getMessage()}");
				// $this->refresh(); 
			}

			$model->attributes=$_POST['MeMedicoEspecialidad'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->pk_id_medico_especialidad));
		}

		$this->render('update',array('model'=>$model,'fechaSer'=>$fecha));
		
			}
	
	public function actionIndex()
	{
		/*
		$dataProvider=new CActiveDataProvider('MeMedicoEspecialidad');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
		*/
		
		$model=new MeMedicoEspecialidad('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['MeMedicoEspecialidad']))
			$model->attributes=$_GET['MeMedicoEspecialidad'];

		$this->render('index',array(
			'model'=>$model,
					));
		
			}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		
		$model=new MeMedicoEspecialidad('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['MeMedicoEspecialidad']))
			$model->attributes=$_GET['MeMedicoEspecialidad'];

		$this->render('admin',array(
			'model'=>$model,
					));
		
			}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return MeMedicoEspecialidad the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=MeMedicoEspecialidad::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param MeMedicoEspecialidad $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='me-medico-especialidad-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
	
	public function actionExport()
    {
        $model=new MeMedicoEspecialidad;
		$model->unsetAttributes();  // clear any default values
		if(isset($_POST['MeMedicoEspecialidad']))
			$model->attributes=$_POST['MeMedicoEspecialidad'];

		$exportType = $_POST['fileType'];
        $this->widget('ext.heart.export.EHeartExport', array(
            'title'=>'List of MeMedicoEspecialidad',
            'dataProvider' => $model->search(),
            'filter'=>$model,
            'grid_mode'=>'export',
            'exportType'=>$exportType,
            'columns' => array(
	                
					'pk_id_medico_especialidad',
					'pk_medico',
					'pk_especialidad',
					'fk_universidad',
					'fk_pais',
					'fk_ciudad',
					'anio_obtencion',
					'detalle',
					'fecha_creacion',
					'fecha_modificacion',
					'fk_usuario_creacion',
					'fk_usuario_modificacion',
	            ),
        ));
    }
    
	public function actionCalendar()
	{
		$model=new MeMedicoEspecialidad('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['MeMedicoEspecialidad']))
			$model->attributes=$_GET['MeMedicoEspecialidad'];
		$this->render('calendar',array(
			'model'=>$model,
		));	
	}

	public function actionCalendarEvents()
	{	 	
	 	$items = array();
	 	$model=MeMedicoEspecialidad::model()->findAll();	
		foreach ($model as $value) {
			$items[]=array(
				'id'=>$value->pk_id_medico_especialidad,
								
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
            $id_uno = $_POST['MeMedicoEspecialidad']['fk_pais'];
            $lista = PerCiudad::model()->findAll('fk_pais = :fk_pais',array(':fk_pais'=>$id_uno));
            $lista = CHtml::listData($lista,'pk_id_ciudad','ciudad');
            
            echo CHtml::tag('option', array('value' => ''), 'Seleccione la Ciudad', true);
            
            foreach ($lista as $valor => $descripcion){
                echo CHtml::tag('option',array('value'=>$valor),CHtml::encode($descripcion), true );
                
            }
            
        }

	
}
