<?php

/**
 * This is the model class for table "per_personal".
 *
 * The followings are the available columns in table 'per_personal':
 * @property integer $pk_id_personal
 * @property integer $fk_tipo_identidad
 * @property integer $fk_expedido_pais
 * @property integer $fk_expedido_ciudad
 * @property integer $identidad
 * @property string $nombre_completo
 * @property string $apellido_paterno
 * @property string $apellido_materno
 * @property string $fecha_nacimiento
 * @property integer $fk_profesion
 * @property string $direccion
 * @property integer $telefono
 * @property integer $celular
 * @property integer $fk_sexo
 * @property integer $fk_estado_civil
 * @property string $foto
 * @property integer $fk_estado
 * @property string $fecha_creacion
 * @property string $fecha_modificacion
 * @property integer $fk_usuario_creacion
 * @property integer $fk_usuario_modificacion
 */
class PerPersonal extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'per_personal';
	}

	public $picture;
        
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('fk_tipo_identidad, fk_expedido_pais, fk_expedido_ciudad, identidad, nombre_completo, apellido_paterno, apellido_materno, fecha_nacimiento, fk_profesion, direccion, fk_sexo, fk_estado_civil, foto, fk_estado, fecha_creacion, fecha_modificacion, fk_usuario_creacion, fk_usuario_modificacion', 'required'),
			array('fk_tipo_identidad, fk_expedido_pais, fk_expedido_ciudad, identidad, fk_profesion, telefono, celular, fk_sexo, fk_estado_civil, fk_estado, fk_usuario_creacion, fk_usuario_modificacion', 'numerical', 'integerOnly'=>true),
			array('nombre_completo', 'length', 'max'=>40),
			array('apellido_paterno, apellido_materno', 'length', 'max'=>20),
                        array('identidad','unique'),
                        array('picture', 'file', 'types'=>'jpg, png'),
			/*
			//Example username
			array('username', 'match', 'pattern' => '/^[A-Za-z0-9_]+$/u',
                 'message'=>'Username can contain only alphanumeric 
                             characters and hyphens(-).'),
          	array('username','unique'),
          	*/
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('picture, pk_id_personal, fk_tipo_identidad, fk_expedido_pais, fk_expedido_ciudad, identidad, nombre_completo, apellido_paterno, apellido_materno, fecha_nacimiento, fk_profesion, direccion, telefono, celular, fk_sexo, fk_estado_civil, foto, fk_estado, fecha_creacion, fecha_modificacion, fk_usuario_creacion, fk_usuario_modificacion', 'safe', 'on'=>'search'),
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
                    'pais' => array(self::BELONGS_TO, 'PerPais', 'fk_expedido_pais'),
                    'ciudad' => array(self::BELONGS_TO, 'PerCIudad', 'fk_expedido_ciudad'),
                    'tipoidentidad' => array(self::BELONGS_TO, 'SysCatalogo', 'fk_tipo_identidad'),
                    'profesion' => array(self::BELONGS_TO, 'PerProfesion', 'fk_profesion'),
                    'sexo' => array(self::BELONGS_TO, 'SysCatalogo', 'fk_sexo'),
                    'estadocivil' => array(self::BELONGS_TO, 'SysCatalogo', 'fk_estado_civil'),
                    'estado' => array(self::BELONGS_TO, 'SysCatalogo', 'fk_estado'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'pk_id_personal' => 'Nº',
			'fk_tipo_identidad' => 'Tipo Identidad',
			'fk_expedido_pais' => 'Expedido Pais',
			'fk_expedido_ciudad' => 'Expedido Ciudad',
			'identidad' => 'Identidad',
			'nombre_completo' => 'Nombre',
			'apellido_paterno' => 'Ape. Paterno',
			'apellido_materno' => 'Ape. Materno',
			'fecha_nacimiento' => 'Fecha Nacimiento',
			'fk_profesion' => 'Profesion/Ocupacion',
			'direccion' => 'Direccion',
			'telefono' => 'Telefono',
			'celular' => 'Celular',
			'fk_sexo' => 'Sexo',
			'fk_estado_civil' => 'Estado Civil',
			'picture' => 'Seleccione Foto (jpg-png)',
			'fk_estado' => 'Estado',
			'fecha_creacion' => 'Fecha Creacion',
			'fecha_modificacion' => 'Fecha Modificacion',
			'fk_usuario_creacion' => 'Usuario Creacion',
			'fk_usuario_modificacion' => 'Usuario Modificacion',
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
                $criteria->condition="fk_estado=:estado";   //"visible=:vis AND (fecha BETWEEN :data1 AND :data2)";
                $criteria->params=array('estado'=>'136');  

		$criteria->compare('pk_id_personal',$this->pk_id_personal);
		$criteria->compare('fk_tipo_identidad',$this->fk_tipo_identidad);
		$criteria->compare('fk_expedido_pais',$this->fk_expedido_pais);
		$criteria->compare('fk_expedido_ciudad',$this->fk_expedido_ciudad);
		$criteria->compare('identidad',$this->identidad);
		$criteria->compare('nombre_completo',$this->nombre_completo,true);
		$criteria->compare('apellido_paterno',$this->apellido_paterno,true);
		$criteria->compare('apellido_materno',$this->apellido_materno,true);
		$criteria->compare('fecha_nacimiento',$this->fecha_nacimiento,true);
		$criteria->compare('fk_profesion',$this->fk_profesion);
		$criteria->compare('direccion',$this->direccion,true);
		$criteria->compare('telefono',$this->telefono);
		$criteria->compare('celular',$this->celular);
		$criteria->compare('fk_sexo',$this->fk_sexo);
		$criteria->compare('fk_estado_civil',$this->fk_estado_civil);
		$criteria->compare('foto',$this->foto,true);
		$criteria->compare('fk_estado',$this->fk_estado);
		$criteria->compare('fecha_creacion',$this->fecha_creacion,true);
		$criteria->compare('fecha_modificacion',$this->fecha_modificacion,true);
		$criteria->compare('fk_usuario_creacion',$this->fk_usuario_creacion);
		$criteria->compare('fk_usuario_modificacion',$this->fk_usuario_modificacion);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
                        'pagination'=>array('pageSize'=>20),
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return PerPersonal the static model class
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
        	//$from=DateTime::createFromFormat('d/m/Y',$this->fecha_nacimiento);
        	//$this->fecha_nacimiento=$from->format('Y-m-d');
        	
        return parent::beforeSave();
    }

    public function beforeDelete () {
		$userId=0;
		if(null!=Yii::app()->user->id) $userId=(int)Yii::app()->user->id;
                                
        return false;
    }

    public function afterFind()    {
         
        	// NOT SURE RUN PLEASE HELP ME -> 
        	//$from=DateTime::createFromFormat('Y-m-d',$this->fecha_nacimiento);
        	//$this->fecha_nacimiento=$from->format('d/m/Y');
        	
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
    public function getListaPais()
       {     			                
         return CHtml::listData(PerPais::model()->findAll(),"pk_id_pais","pais");
       }
    public function getListaCiudad()
       {     			                
         return CHtml::listData(PerCiudad::model()->findAll(),"pk_id_ciudad","ciudad");
       }
    public function getListaTipoDocumento()
       {  $ini=100;  $fi=119;        
         return CHtml::listData(SysCatalogo::model()->findAll(array("condition"=>"pk_id_catalogo >= $ini && pk_id_catalogo <= $fi ")), "pk_id_catalogo","valor");
       }
    public function getListaSexo()
       {  $ini=120;  $fi=125;        
         return CHtml::listData(SysCatalogo::model()->findAll(array("condition"=>"pk_id_catalogo >= $ini && pk_id_catalogo <= $fi ")), "pk_id_catalogo","valor");
       }
    public function getListaEstadoCivil()
       {  $ini=126;  $fi=135;        
         return CHtml::listData(SysCatalogo::model()->findAll(array("condition"=>"pk_id_catalogo >= $ini && pk_id_catalogo <= $fi ")), "pk_id_catalogo","valor");
       }
    public function getListaEstado()
       {  $ini=136;  $fi=140;        
         return CHtml::listData(SysCatalogo::model()->findAll(array("condition"=>"pk_id_catalogo >= $ini && pk_id_catalogo <= $fi ")), "pk_id_catalogo","valor");
       }
    public function getListaProfesion()
       {     			                
         return CHtml::listData(PerProfesion::model()->findAll(),"pk_id_profesion","profesion_ocupacion");
       }
    public function getNombreCompleto()
    {
        return $this->nombre_completo.' '.$this->apellido_paterno.' '.$this->apellido_materno;
    }
}
