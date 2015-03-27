<?php

/**
 * This is the model class for table "me_medico_especialidad".
 *
 * The followings are the available columns in table 'me_medico_especialidad':
 * @property integer $pk_id_medico_especialidad
 * @property integer $fk_medico
 * @property integer $fk_especialidad
 * @property integer $fk_universidad
 * @property integer $fk_pais
 * @property integer $fk_ciudad
 * @property string $anio_obtencion
 * @property string $detalle
 * @property string $fecha_creacion
 * @property string $fecha_modificacion
 * @property integer $fk_usuario_creacion
 * @property integer $fk_usuario_modificacion
 */
class MeMedicoEspecialidad extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'me_medico_especialidad';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('fk_medico, fk_especialidad, fk_universidad, fk_pais, fk_ciudad, anio_obtencion, fecha_creacion, fecha_modificacion, fk_usuario_creacion, fk_usuario_modificacion', 'required'),
			array('fk_medico, fk_especialidad, fk_universidad, fk_pais, fk_ciudad, fk_usuario_creacion, fk_usuario_modificacion', 'numerical', 'integerOnly'=>true),
			array('detalle', 'safe'),
			/*
			//Example username
			array('username', 'match', 'pattern' => '/^[A-Za-z0-9_]+$/u',
                 'message'=>'Username can contain only alphanumeric 
                             characters and hyphens(-).'),
          	array('username','unique'),
          	*/
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('pk_id_medico_especialidad, fk_medico, fk_especialidad, fk_universidad, fk_pais, fk_ciudad, anio_obtencion, detalle, fecha_creacion, fecha_modificacion, fk_usuario_creacion, fk_usuario_modificacion', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
                    'personal' => array(self::BELONGS_TO, 'PerPersonal', 'fk_medico'),
                    'medico' => array(self::BELONGS_TO, 'Medico', 'fk_medico'),
                    'ciudad' => array(self::BELONGS_TO, 'PerCiudad', 'fk_ciudad'),
                    'estado' => array(self::BELONGS_TO, 'SysCatalogo', 'fk_estado'),
                    'pais' => array(self::BELONGS_TO, 'PerPais', 'fk_pais'),
                    'cuentar' => array(self::BELONGS_TO, 'SeSesionUsuario', 'fk_usuario_creacion'),
                    'cuentam' => array(self::BELONGS_TO, 'SeSesionUsuario', 'fk_usuario_modificacion'),
                    'especialidad' => array(self::BELONGS_TO, 'MeEspecialidad', 'fk_especialidad'),
                    'titulo' => array(self::BELONGS_TO, 'MeTitulo', 'fk_especialidad'),
                    'universidad' => array(self::BELONGS_TO, 'MeUniversidad', 'fk_universidad'),
                    );
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'pk_id_medico_especialidad' => 'Pk Id Medico Especialidad',
			'fk_medico' => 'Fk Medico',
			'fk_especialidad' => 'Fk Especialidad',
			'fk_universidad' => 'Fk Universidad',
			'fk_pais' => 'Fk Pais',
			'fk_ciudad' => 'Fk Ciudad',
			'anio_obtencion' => 'Anio Obtencion',
			'detalle' => 'Detalle',
			'fecha_creacion' => 'Fecha Creacion',
			'fecha_modificacion' => 'Fecha Modificacion',
			'fk_usuario_creacion' => 'Fk Usuario Creacion',
			'fk_usuario_modificacion' => 'Fk Usuario Modificacion',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('pk_id_medico_especialidad',$this->pk_id_medico_especialidad);
		$criteria->compare('fk_medico',$this->fk_medico);
		$criteria->compare('fk_especialidad',$this->fk_especialidad);
		$criteria->compare('fk_universidad',$this->fk_universidad);
		$criteria->compare('fk_pais',$this->fk_pais);
		$criteria->compare('fk_ciudad',$this->fk_ciudad);
		$criteria->compare('anio_obtencion',$this->anio_obtencion,true);
		$criteria->compare('detalle',$this->detalle,true);
		$criteria->compare('fecha_creacion',$this->fecha_creacion,true);
		$criteria->compare('fecha_modificacion',$this->fecha_modificacion,true);
		$criteria->compare('fk_usuario_creacion',$this->fk_usuario_creacion);
		$criteria->compare('fk_usuario_modificacion',$this->fk_usuario_modificacion);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return MeMedicoEspecialidad the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	
	public function beforeSave() 
    {
        $userId=0;
		if(null!=Yii::app()->user->id) $userId=(int)Yii::app()->user->id;
		
		if($this->isNewRecord)
        {           
                        						
        }else{
                        						
        }

        
        	// NOT SURE RUN PLEASE HELP ME -> 
        	//$from=DateTime::createFromFormat('d/m/Y',$this->anio_obtencion);
        	//$this->anio_obtencion=$from->format('Y-m-d');
        	
        return parent::beforeSave();
    }

    public function beforeDelete () {
		$userId=0;
		if(null!=Yii::app()->user->id) $userId=(int)Yii::app()->user->id;
                                
        return false;
    }

    public function afterFind()    {
         
        	// NOT SURE RUN PLEASE HELP ME -> 
        	//$from=DateTime::createFromFormat('Y-m-d',$this->anio_obtencion);
        	//$this->anio_obtencion=$from->format('d/m/Y');
        	
        parent::afterFind();
    }
	
		
	public function defaultScope()
    {
    	/*
    	//Example Scope
    	return array(
	        'condition'=>"deleted IS NULL ",
            'order'=>'create_time DESC',
            'limit'=>5,
        );
        */
        $scope=array();

        
        return $scope;
    }
    
    public function getListaPersonal()
       {     			                
         return CHtml::listData(PerPersonal::model()->findAll(),"pk_id_personal","identidad");
       }
    public function getListaEspecialidad()
       {     			                
         return CHtml::listData(MeEspecialidad::model()->findAll(),"pk_id_especialidad","especialidad");
       }
       
   public function getListaUniversidad()
       {     			                
         return CHtml::listData(MeUniversidad::model()->findAll(),"pk_id_universidad","universidad");
       }  
   public function getListaPais()
       {     			                
         return CHtml::listData(PerPais::model()->findAll(),"pk_id_pais","pais");
       }
    public function getListaCiudad()
       {     			                
         return CHtml::listData(PerCiudad::model()->findAll(),"pk_id_ciudad","ciudad");
       }    
}
