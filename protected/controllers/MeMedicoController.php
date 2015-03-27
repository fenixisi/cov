<?php

class MeMedicoController extends Controller
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
				'actions'=>array('view','create','update','admin','export','calendar', 'calendarEvents','selecpais',
                                    'Especialidad','ExportEspecial'),
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
				
		$model=new MeMedico;

		date_default_timezone_set('America/La_Paz');
                $time = time();
                $fecha = date("Y-m-d H:i:s", $time); 
                
		// $this->performAjaxValidation($model);

		if(isset($_POST['MeMedico']))
		{
			$transaction = Yii::app()->db->beginTransaction();
			try{
				$messageType='warning';
				$message = "Hay algunos errores ";
				$model->attributes=$_POST['MeMedico'];
                                $model->n_atencion= 0;
                                $model->n_atencion_nuevo=0;
				$model->fecha_modificacion= "0000-00-00 00:00:00" ;
                                $model->fk_usuario_creacion=Yii::app()->user->getState('usuario');
                                $model->fk_usuario_modificacion = 0;
                                $model->fk_estado=206;
                                
//                                print_r($model->fk_personal);
//                                exit();
				if($model->save()){
					$messageType = 'success';
					$message = "<strong>Muy Bien!</strong> Usted Registro los datos con éxito";
					$transaction->commit();
					Yii::app()->user->setFlash($messageType, $message);
					$this->redirect(array('view','id'=>$model->pk_id_medico));
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
                $personal= PerPersonal::model()->findByPk($model->fk_personal);
		date_default_timezone_set('America/La_Paz');
                $time = time();
                $fecha = date("Y-m-d H:i:s", $time); 
		// $this->performAjaxValidation($model);

		if(isset($_POST['MeMedico']))
		{
			$messageType='warning';
			$message = "Hay algunos errores ";
			$transaction = Yii::app()->db->beginTransaction();
			try{
				$model->attributes=$_POST['MeMedico'];
                                $model->fk_usuario_modificacion=Yii::app()->user->getState('usuario');
				$messageType = 'success';
				$message = "<strong>Muy Bien!</strong> Usted Actualizo los datos con éxito";			
				if($model->save()){
					$transaction->commit();
					Yii::app()->user->setFlash($messageType, $message);
					$this->redirect(array('view','id'=>$model->pk_id_medico));
				}
			}
			catch (Exception $e){
				$transaction->rollBack();
				Yii::app()->user->setFlash('error', "{$e->getMessage()}");
				// $this->refresh(); 
			}

			$model->attributes=$_POST['MeMedico'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->pk_id_medico));
		}

		$this->render('update',array('model'=>$model,'fechaSer'=>$fecha,'personal'=>$personal));		
	}
       

	public function actionAdmin()
	{
		
		$model=new MeMedico('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['MeMedico']))
			$model->attributes=$_GET['MeMedico'];

		$this->render('admin',array(
			'model'=>$model,
					));
		
			}
	
	public function loadModel($id)
	{
		$model=MeMedico::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param MeMedico $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='me-medico-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
	
	public function actionExport()
    {
        $model=new MeMedico;
		$model->unsetAttributes();  // clear any default values
		if(isset($_POST['MeMedico']))
			$model->attributes=$_POST['MeMedico'];

		$exportType = $_POST['fileType'];
        $this->widget('ext.heart.export.EHeartExport', array(
            'title'=>'List of MeMedico',
            'dataProvider' => $model->search(),
            'filter'=>$model,
            'grid_mode'=>'export',
            'exportType'=>$exportType,
            'columns' => array(
	                
					'pk_id_medico',
					'fk_personal',
					'fk_titulo',
					'fk_universidad',
					'fk_pais',
					'fk_ciudad',
					'fecha_obtencion',
					'n_atencion',
					'n_atencion_nuevo',
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
		$model=new MeMedico('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['MeMedico']))
			$model->attributes=$_GET['MeMedico'];
		$this->render('calendar',array(
			'model'=>$model,
		));	
	}

	public function actionCalendarEvents()
	{	 	
	 	$items = array();
	 	$model=MeMedico::model()->findAll();	
		foreach ($model as $value) {
			$items[]=array(
				'id'=>$value->pk_id_medico,
								
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
            $id_uno = $_POST['MeMedico']['fk_pais'];
            $lista = PerCiudad::model()->findAll('fk_pais = :fk_pais',array(':fk_pais'=>$id_uno));
            $lista = CHtml::listData($lista,'pk_id_ciudad','ciudad');
            
            echo CHtml::tag('option', array('value' => ''), 'Seleccione la Ciudad', true);
            
            foreach ($lista as $valor => $descripcion){
                echo CHtml::tag('option',array('value'=>$valor),CHtml::encode($descripcion), true );
                
            }
            
        }
        
        public function actionEspecialidad($id)
	{          
        
          $criteria=new CDbCriteria;
          $criteria->condition ="(fk_medico=$id)";          

          //Relleno el dataprovider con el array de registros
          $especialidad = new CActiveDataProvider('MeMedicoEspecialidad', array(
                        'criteria'=>$criteria,
                        'pagination'=>array('pageSize'=>10,),));                                                              
                          
          $this->renderPartial('especialidad', array('especialidad'=>$especialidad)); 
	}
        
        public function actionExportEspecial()
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
					'fk_medico',
					'fk_especialidad',
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

	
}
