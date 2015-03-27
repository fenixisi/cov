<?php
/* @var $this MeEspecialidadController */
/* @var $model MeEspecialidad */

$this->breadcrumbs=array(
	'Especialidades'=>array('index'),
	$model->pk_id_especialidad,
);

require(dirname(__FILE__).DIRECTORY_SEPARATOR.'_menu.php');
$this->menu=array(
	array('label'=>'Catalogo','icon'=>'fa fa-chevron-circle-right', 'url'=>array('sysCatalogo/admin '), 'active' => FALSE),	
        array('label'=>'Pais','icon'=>'fa fa-chevron-circle-right', 'url'=>array('perPais/admin '), 'active' => FALSE),
	array('label'=>'Ciudad','icon'=>'fa fa-chevron-circle-right', 'url'=>array('perCiudad/admin'), 'active' => FALSE),        
        array('label'=>'Profesion/Ocu','icon'=>'fa fa-chevron-circle-right', 'url'=>array('perProfesion/admin'), 'active' => FALSE),        
        array('label'=>'Titulaciones','icon'=>'fa fa-chevron-circle-right', 'url'=>array('meTitulo/admin'), 'active' => FALSE),        
        array('label'=>'Universidades','icon'=>'fa fa-chevron-circle-right', 'url'=>array('meUniversidad/admin'), 'active' => FALSE),        
        array('label'=>'Especialiadedes','icon'=>'fa fa-chevron-circle-right', 'url'=>array('meEspecialidad/admin'), 'active' => TRUE),
);

if(!isset($_GET['asModal'])){
?>
<?php $box = $this->beginWidget(
    'bootstrap.widgets.TbBox',
    array(
        'title' => 'Ver Especialidad '.$model->especialidad,
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
			'pk_id_especialidad',
		'especialidad',
		'detalle',
		'fecha_creacion',
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
    
    <?php $this->widget('bootstrap.widgets.TbButton',
            array(
            'label' => 'Registrar',
            'url' => array('create'),
            'type'=> 'primary',
            'icon'=>'fa fa-plus',
             'htmlOptions' => array(
                'title' => 'Registro de Datos del Especialidad ',
                ),
            )
        ); ?>
    
    <?php $this->widget('bootstrap.widgets.TbButton',
            array(
            'label' => 'Administra',
            'url' => array('admin'),
            'type'=> 'primary',
            'icon'=>'fa fa-list',
             'htmlOptions' => array(
                'title' => 'Administrar de Datos del Especialidad ',
                ),
            )
        ); ?>
</div>

<?php
if(!isset($_GET['asModal'])){
	$this->endWidget();}
?>