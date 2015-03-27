<?php

/**
 * This is the model class for table "me_medico".
 *
 * The followings are the available columns in table 'me_medico':
 * @property integer $pk_id_medico
 * @property integer $fk_personal
 * @property integer $fk_titulo
 * @property integer $fk_universidad
 * @property integer $fk_pais
 * @property integer $fk_ciudad
 * @property string $fecha_obtencion
 * @property integer $n_atencion
 * @property integer $n_atencion_nuevo
 * @property integer $fk_estado
 * @property string $fecha_creacion
 * @property string $fecha_modificacion
 * @property integer $fk_usuario_creacion
 * @property integer $fk_usuario_modificacion
 */
class MeMedico extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'me_medico';
	}
                
        public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('fk_personal, fk_titulo, fk_universidad, fk_pais, fk_ciudad, fecha_obtencion, n_atencion, n_atencion_nuevo, fk_estado, fecha_creacion, fecha_modificacion, fk_usuario_creacion, fk_usuario_modificacion', 'required'),
			array('fk_personal, fk_titulo, fk_universidad, fk_pais, fk_ciudad, n_atencion, n_atencion_nuevo, fk_estado, fk_usuario_creacion, fk_usuario_modificacion', 'numerical', 'integerOnly'=>true),
			/*
			//Example username
			array('username', 'match', 'pattern' => '/^[A-Za-z0-9_]+$/u',
                 'message'=>'Username can contain only alphanumeric 
                             characters and hyphens(-).'),
          	array('username','unique'),
          	*/
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('pk_id_medico, fk_personal, fk_titulo, fk_universidad, fk_pais, fk_ciudad, fecha_obtencion, n_atencion, n_atencion_nuevo, fk_estado, fecha_creacion, fecha_modificacion, fk_usuario_creacion, fk_usuario_modificacion', 'safe', 'on'=>'search'),
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
			'ciudad' => array(self::BELONGS_TO, 'PerCiudad', 'fk_ciudad'),
			'estado' => array(self::BELONGS_TO, 'SysCatalogo', 'fk_estado'),
			'pais' => array(self::BELONGS_TO, 'PerPais', 'fk_pais'),
			'personal' => array(self::BELONGS_TO, 'PerPersonal', 'fk_personal'),
                        'persona' => array(self::BELONGS_TO, 'PerPersonal', 'fk_personal'),
                        'cuentar' => array(self::BELONGS_TO, 'SeSesionUsuario', 'fk_usuario_creacion'),
                        'cuentam' => array(self::BELONGS_TO, 'SeSesionUsuario', 'fk_usuario_modificacion'),
			'titulo' => array(self::BELONGS_TO, 'MeTitulo', 'fk_titulo'),
			'universidad' => array(self::BELONGS_TO, 'MeUniversidad', 'fk_universidad'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'pk_id_medico' => 'Nº',
			'fk_personal' => 'Personal',
			'fk_titulo' => 'Titulo',
			'fk_universidad' => 'Universidad',
			'fk_pais' => 'Pais',
			'fk_ciudad' => 'Ciudad',
			'fecha_obtencion' => 'Fecha de Obtencion Titulacion',
			'n_atencion' => 'Nº Atencion',
			'n_atencion_nuevo' => 'Nº Atencion Nuevo',
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

		$criteria->compare('pk_id_medico',$this->pk_id_medico);                
		$criteria->compare('personal.identidad',$this->fk_personal);
                $criteria->compare('fk_personal',$this->fk_personal);
		$criteria->compare('titulo.titulo',$this->fk_titulo);
		$criteria->compare('universidad.universidad',$this->fk_universidad);
		$criteria->compare('fk_pais',$this->fk_pais);
		$criteria->compare('fk_ciudad',$this->fk_ciudad);
		$criteria->compare('fecha_obtencion',$this->fecha_obtencion,true);
		$criteria->compare('n_atencion',$this->n_atencion);
		$criteria->compare('n_atencion_nuevo',$this->n_atencion_nuevo);
		$criteria->compare('fk_estado',$this->fk_estado);
		$criteria->compare('fecha_creacion',$this->fecha_creacion,true);
		$criteria->compare('fecha_modificacion',$this->fecha_modificacion,true);
		$criteria->compare('fk_usuario_creacion',$this->fk_usuario_creacion);
		$criteria->compare('fk_usuario_modificacion',$this->fk_usuario_modificacion);
                $criteria->with = array(
                                                                'personal'=>array('select'=>'personal.identidad'),                                                                
                                                                'universidad'=>array('select'=>'universidad.universidad'),
                                                                'titulo'=>array('select'=>'titulo.titulo'),
                                                                );

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return MeMedico the static model class
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
        	//$from=DateTime::createFromFormat('d/m/Y',$this->fecha_obtencion);
        	//$this->fecha_obtencion=$from->format('Y-m-d');
        	
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
	
		
	public function defaultScope()   {    	
        $scope=array();   
        return $scope;
    }        
    
    
    public function getListaPersonal()
       {     			                
         return CHtml::listData(PerPersonal::model()->findAll(),"pk_id_personal","identidad");
       }
    public function getListaTitulo()
       {     			                
         return CHtml::listData(MeTitulo::model()->findAll(),"pk_id_titulo","titulo");
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
    public function getListaEstado()
       {  $ini=206;  $fi=210;        
         return CHtml::listData(SysCatalogo::model()->findAll(array("condition"=>"pk_id_catalogo >= $ini && pk_id_catalogo <= $fi ")), "pk_id_catalogo","valor");
       }
}
