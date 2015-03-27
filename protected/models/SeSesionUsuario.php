<?php

class SeSesionUsuario extends CActiveRecord
{
    
    
	public function tableName()
	{
		return 'se_sesion_usuario';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('fk_tipo_cuenta, fk_personal, cuenta, contrasenia, fk_estado, fecha_creacion, fecha_modificacion, fk_usuario_creacion, fk_usuario_modificacion', 'required'),
			array('fk_tipo_cuenta, fk_personal, fk_estado, fk_usuario_creacion, fk_usuario_modificacion', 'numerical', 'integerOnly'=>true),
			array('cuenta, contrasenia', 'length', 'max'=>20),                        
                        array('cuenta,contrasenia ', 'match', 'pattern' => '/^[a-z@.0-9_]+$/u',
                        'message'=>'Sólo puede contener letras, numeros y guiones(-).'),
                        array('cuenta','unique'),
			/*
			//Example username
			array('username', 'match', 'pattern' => '/^[A-Za-z0-9_]+$/u',
                 'message'=>'Username can contain only alphanumeric 
                             characters and hyphens(-).'),
          	array('username','unique'),
          	*/
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('pk_id_usuario, fk_tipo_cuenta, fk_personal, cuenta, contrasenia, fk_estado, fecha_creacion, fecha_modificacion, fk_usuario_creacion, fk_usuario_modificacion', 'safe', 'on'=>'search'),
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
			'personal' => array(self::BELONGS_TO, 'PerPersonal', 'fk_personal'),
                        'profesion' => array(self::BELONGS_TO, 'PerProfesion', 'fk_personal'),
			'tipocuenta' => array(self::BELONGS_TO, 'SeTipoCuenta', 'fk_tipo_cuenta'),
			'estado' => array(self::BELONGS_TO, 'SysCatalogo', 'fk_estado'),
                        'sesionc' => array(self::BELONGS_TO, 'SeSesionUsuario', 'fk_usuario_creacion'),                        
                        'sesionm' => array(self::BELONGS_TO, 'SeSesionUsuario', 'fk_usuario_modificacion'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'pk_id_usuario' => 'Nº',
			'fk_tipo_cuenta' => 'Tipo Cuenta',
			'fk_personal' => 'Personal',
			'cuenta' => 'Cuenta',
			'contrasenia' => 'Contrasenia',
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
                $criteria->params=array('estado'=>'200'); 

		$criteria->compare('pk_id_usuario',$this->pk_id_usuario);
		$criteria->compare('fk_tipo_cuenta',$this->fk_tipo_cuenta);
		$criteria->compare('fk_personal',$this->fk_personal);
		$criteria->compare('cuenta',$this->cuenta,true);
		$criteria->compare('contrasenia',$this->contrasenia,true);
		$criteria->compare('fk_estado',$this->fk_estado);		

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
        
        public function searchin()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;
                $criteria->condition="fk_estado=:estado";   //"visible=:vis AND (fecha BETWEEN :data1 AND :data2)";
                $criteria->params=array('estado'=>'205'); 
		
                $criteria->compare('pk_id_usuario',$this->pk_id_usuario);
		$criteria->compare('fk_tipo_cuenta',$this->fk_tipo_cuenta);
		$criteria->compare('fk_personal',$this->fk_personal);
		$criteria->compare('cuenta',$this->cuenta,true);		
		$criteria->compare('fk_estado',$this->fk_estado);		

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return SeSesionUsuario the static model class
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

        
        return parent::beforeSave();
    }

    public function beforeDelete () {
		$userId=0;
		if(null!=Yii::app()->user->id) $userId=(int)Yii::app()->user->id;
                                
        return false;
    }

    public function afterFind()    {
         
        parent::afterFind();
    }	
		
	public function defaultScope()
    {    	
        $scope=array();   
        return $scope;
    }
    
    public function validatePassword($password)
        {
        return $password ===$this->contrasenia;
        }
    
    public function getListaEstado()
       {  $ini=200;  $fi=205;        
         return CHtml::listData(SysCatalogo::model()->findAll(array("condition"=>"pk_id_catalogo >= $ini && pk_id_catalogo <= $fi ")), "pk_id_catalogo","valor");
       }
    public function getListaTipo()
       {         
         return CHtml::listData(SeTipoCuenta::model()->findAll(), "pk_id_cuenta","cuenta");
       }
}
