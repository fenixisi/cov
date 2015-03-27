<?php

/**
 * This is the model class for table "per_profesion".
 *
 * The followings are the available columns in table 'per_profesion':
 * @property integer $pk_id_profesion
 * @property string $profesion_ocupacion
 * @property integer $estado
 * @property string $detalle
 * @property string $fecha
 *
 * The followings are the available model relations:
 * @property PerPersonal[] $perPersonals
 */
class PerProfesion extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'per_profesion';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('profesion_ocupacion, estado, fecha', 'required'),
			array('estado', 'numerical', 'integerOnly'=>true),
			array('profesion_ocupacion', 'length', 'max'=>45),
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
			array('pk_id_profesion, profesion_ocupacion, estado, detalle, fecha', 'safe', 'on'=>'search'),
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
			'perPersonals' => array(self::HAS_MANY, 'PerPersonal', 'fk_profesion'),
                        'estadop' => array(self::BELONGS_TO, 'SysCatalogo', 'estado'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'pk_id_profesion' => 'Nº',
			'profesion_ocupacion' => 'Profesion Ocupacion',
			'estado' => 'Seleccione Profesion/Ocupacion',
			'detalle' => 'Detalle',
			'fecha' => 'Fecha',
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

		$criteria->compare('pk_id_profesion',$this->pk_id_profesion);
		$criteria->compare('profesion_ocupacion',$this->profesion_ocupacion,true);
		$criteria->compare('estado',$this->estado);
		$criteria->compare('detalle',$this->detalle,true);
		$criteria->compare('fecha',$this->fecha,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return PerProfesion the static model class
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
       {  $ini=10;  $fi=20;        
         return CHtml::listData(SysCatalogo::model()->findAll(array("condition"=>"pk_id_catalogo >= $ini && pk_id_catalogo <= $fi ")), "pk_id_catalogo","valor");
       }
}
