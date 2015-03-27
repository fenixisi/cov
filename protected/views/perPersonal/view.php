<?php
/* @var $this PerPersonalController */
/* @var $model PerPersonal */

$this->breadcrumbs=array(
	'Personal'=>array('index'),
	$model->pk_id_personal,
);

require(dirname(__FILE__).DIRECTORY_SEPARATOR.'_menu.php');
$this->menu=array(
	array('label'=>'Personal','icon'=>'fa fa-chevron-circle-right', 'url'=>array('perPersonal/admin '), 'active' => TRUE),	        
        array('label'=>'Medico','icon'=>'fa fa-chevron-circle-right', 'url'=>  array('meMedico/admin'), 'active' => FALSE),
	array('label'=>'Inicio Sesion','icon'=>'fa fa-chevron-circle-right', 'url'=>array('seSesionUsuario/admin'), 'active' => FALSE),
//        array('label'=>'Tipo Cuenta','icon'=>'fa fa-chevron-circle-right', 'url'=>  array('seTipoCuenta/admin'), 'active' => FALSE),
);

if(!isset($_GET['asModal'])){
?>
<?php $box = $this->beginWidget(
    'bootstrap.widgets.TbBox',
    array(
        'title' => 'Ver Datos del Personal '.$model->identidad,
        'headerIcon' => 'icon- fa fa-eye',
        'headerButtons' => array(
            array(
                'class' => 'bootstrap.widgets.TbButtonGroup',
                'type' => 'success',
                // '', 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'                
            ),
        ) 
    )
);?>
<?php
}
?>

		<?php $this->widget('bootstrap.widgets.TbAlert', array(
		    'block'=>false, // display a larger alert block?
		    'fade'=>true, // use transitions?
		    'closeText'=>'&times;', // close link text - if set to false, no close link is displayed
		    'alerts'=>array( // configurations per alert type
		        'success'=>array('block'=>true, 'fade'=>true, 'closeText'=>'&times;'), //success, info, warning, error or danger
		        'info'=>array('block'=>true, 'fade'=>true, 'closeText'=>'&times;'), //success, info, warning, error or danger
		        'warning'=>array('block'=>true, 'fade'=>true, 'closeText'=>'&times;'), //success, info, warning, error or danger
		        'error'=>array('block'=>true, 'fade'=>true, 'closeText'=>'&times;'), //success, info, warning, error or danger
		        'danger'=>array('block'=>true, 'fade'=>true, 'closeText'=>'&times;'), //success, info, warning, error or danger
		    ),
		));
		?>		
<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
			'pk_id_personal',
                        
                array(                         
                 'label'=>'Tipo De Identidad',
                 'name'=>'tipoidentidad.valor',    
                 'type'=>'raw',
                     ),                                    		
		'pais.pais',
		'ciudad.ciudad',
		'identidad',
		'nombre_completo',
		'apellido_paterno',
		'apellido_materno',		
			array(
		        'name'=> 'fecha_nacimiento',
		        'type'=>'raw',
                        'language' => 'es',
		        'value' => date("d M Y",strtotime($model->fecha_nacimiento)),
		    ),					
                array(                         
                 'label'=>'Profesion / Ocupacion',
                 'name'=>'profesion.profesion_ocupacion',    
                 'type'=>'raw',
                     ),
		'direccion',
		'telefono',
		'celular',
		
                array(                         
                 'label'=>'Sexo ♂ ♀ ',
                 'name'=>'sexo.valor',    
                 'type'=>'raw',
                     ),
                array(                         
                 'label'=>'Estado Civil ',
                 'name'=>'estadocivil.valor',    
                 'type'=>'raw',
                     ),		
                array(        
                 'name'=>'foto',
                 'value'=> CHtml::image(Yii::app()->request->baseUrl.'/personal_foto/'.$model->foto,"",array('width'=>200, 'height'=>100)),
                 'type'=>'raw',
                     ),
                array(                         
                 'label'=>'Estado ',
                 'name'=>'estado.valor',    
                 'type'=>'raw',
                     ),		
		'fecha_creacion',
		'fecha_modificacion',
		'fk_usuario_creacion',
		'fk_usuario_modificacion',
		/*
		//CONTOH
		array(
	        'header' => 'Level',
	        'name'=> 'ref_level_id',
	        'type'=>'raw',
	        'value' => ($model->Level->name),
	        // 'value' => ($model->status)?"on":"off",
	        // 'value' => @Admin::model()->findByPk($model->createdBy)->username,
	    ),

	    */
	),
)); ?>
<div class="form-actions">
<?php echo CHtml::link('Registrar',array('perPersonal/create'),array('class'=>'create-button btn btn-primary','title' => 'Registrar Datos del Personal', 'icon' => 'icon- fa fa-list-alt')); ?>
<?php echo CHtml::link('Administrar',array('perPersonal/admin'),array('class'=>'create-button btn btn-primary','title' => 'Administrar Datos del Personal', 'icon' => 'icon- fa fa-list-alt')); ?>
</div>
    <?php
if(!isset($_GET['asModal'])){
	$this->endWidget();}
?>