<?php
/* @var $this PerPaisController */
/* @var $model PerPais */

$this->breadcrumbs=array(
	'Pais'=>array('index'),
	$model->pk_id_pais,
);

require(dirname(__FILE__).DIRECTORY_SEPARATOR.'_menu.php');
$this->menu=array(
	array('label'=>'Catalogo','icon'=>'fa fa-chevron-circle-right', 'url'=>array('sysCatalogo/admin '), 'active' => FALSE),	
        array('label'=>'Pais','icon'=>'fa fa-chevron-circle-right', 'url'=>array('perPais/admin '), 'active' => TRUE),
	array('label'=>'Ciudad','icon'=>'fa fa-chevron-circle-right', 'url'=>array('perCiudad/admin'), 'active' => FALSE),        
        array('label'=>'Profesion/Ocu','icon'=>'fa fa-chevron-circle-right', 'url'=>array('perProfesion/admin'), 'active' => FALSE),        
        array('label'=>'Titulaciones','icon'=>'fa fa-chevron-circle-right', 'url'=>array('meTitulo/admin'), 'active' => FALSE),        
        array('label'=>'Universidades','icon'=>'fa fa-chevron-circle-right', 'url'=>array('meUniversidad/admin'), 'active' => FALSE),        
        array('label'=>'Especialiadedes','icon'=>'fa fa-chevron-circle-right', 'url'=>array('meEspecialidad/admin'), 'active' => FALSE),
);

if(!isset($_GET['asModal'])){
?>
<?php $box = $this->beginWidget(
    'bootstrap.widgets.TbBox',
    array(
        'title' => 'Ver pais de '.$model->pais,
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
			'pk_id_pais',
		'pais',
		'detalle',
		'fecha',
		
	),
)); ?>

<?php echo CHtml::link('Administrar',array('perPais/admin'),array('class'=>'create-button btn btn-primary','title' => 'Administrar Datos del Pais', 'icon' => 'fa fa-list-alt')); ?>

<?php
if(!isset($_GET['asModal'])){
	$this->endWidget();}
?>