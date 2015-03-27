<?php

/**
 * This is the model class for table "se_tipo_cuenta".
 *
 * The followings are the available columns in table 'se_tipo_cuenta':
 * @property integer $pk_id_cuenta
 * @property string $cuenta
 * @property string $detalle
 * @property integer $estado
 * @property string $fecha
 * @property integer $fk_usuario_creacion
 */
class SeTipoCuenta extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'se_tipo_cuenta';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('cuenta, detalle, estado, fecha, fk_usuario_creacion', 'required'),
			array('estado, fk_usuario_creacion', 'numerical', 'integerOnly'=>true),
			array('cuenta', 'length', 'max'=>20),
			/*
			//Example username
			array('username', 'match', 'pattern' => '/^[A-Za-z0-9_]+$/u',
                 'message'=>'Username can contain only alphanumeric 
                             characters and hyphens(-).'),
          	array('username','unique'),
          	*/
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('pk_id_cuenta, cuenta, detalle, estado, fecha, fk_usuario_creacion', 'safe', 'on'=>'search'),
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
                    'fkestado' => array(self::BELONGS_TO, 'SysCatalogo', 'estado'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'pk_id_cuenta' => 'Nº',
			'cuenta' => 'Cuenta',
			'detalle' => 'Detalle',
			'estado' => 'Estado',
			'fecha' => 'Fecha Registro',
			'fk_usuario_creacion' => 'Usuario Creacion',
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

		$criteria->compare('pk_id_cuenta',$this->pk_id_cuenta);
		$criteria->compare('cuenta',$this->cuenta,true);
		$criteria->compare('detalle',$this->detalle,true);
		$criteria->compare('estado',$this->estado);
		$criteria->compare('fecha',$this->fecha,true);
		$criteria->compare('fk_usuario_creacion',$this->fk_usuario_creacion);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return SeTipoCuenta the static model class
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
    
    public function getListaEstado()
       {  $ini=16;  $fi=20;        
         return CHtml::listData(SysCatalogo::model()->findAll(array("condition"=>"pk_id_catalogo >= $ini && pk_id_catalogo <= $fi ")), "pk_id_catalogo","valor");
       }
}
