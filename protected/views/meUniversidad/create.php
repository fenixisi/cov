<?php
/* @var $this MeUniversidadController */
/* @var $model MeUniversidad */

$this->breadcrumbs=array(
	'Universidades'=>array('index'),
	'Registrar',
);

require(dirname(__FILE__).DIRECTORY_SEPARATOR.'_menu.php');
$this->menu=array(
	array('label'=>'Catalogo','icon'=>'fa fa-chevron-circle-right', 'url'=>array('sysCatalogo/admin '), 'active' => FALSE),	
        array('label'=>'Pais','icon'=>'fa fa-chevron-circle-right', 'url'=>array('perPais/admin '), 'active' => FALSE),
	array('label'=>'Ciudad','icon'=>'fa fa-chevron-circle-right', 'url'=>array('perCiudad/admin'), 'active' => FALSE),        
        array('label'=>'Profesion/Ocu','icon'=>'fa fa-chevron-circle-right', 'url'=>array('perProfesion/admin'), 'active' => FALSE),        
        array('label'=>'Titulaciones','icon'=>'fa fa-chevron-circle-right', 'url'=>array('meTitulo/admin'), 'active' => FALSE),        
        array('label'=>'Universidades','icon'=>'fa fa-chevron-circle-right', 'url'=>array('meUniversidad/admin'), 'active' => TRUE),        
        array('label'=>'Especialiadedes','icon'=>'fa fa-chevron-circle-right', 'url'=>array('meEspecialidad/admin'), 'active' => FALSE),
);
?>

<?php $box = $this->beginWidget(
    'bootstrap.widgets.TbBox',
    array(
        'title' => 'Registrar Universidades' ,
        'headerIcon' => 'icon- fa fa-plus-circle',
        'headerButtons' => array(
        	array(
            	'class' => 'bootstrap.widgets.TbButtonGroup',
            	'type' => 'success',
            	// '', 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'            	
            )
        )        
    )
);?>
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
<?php echo $this->renderPartial('_form', array('model'=>$model,'fechaSer'=>$fechaSer)); ?>
<?php $this->endWidget(); ?>