<?php
/* @var $this MeMedicoController */
/* @var $model MeMedico */

$this->breadcrumbs=array(
	'Medico'=>array('index'),
	$model->pk_id_medico,
);

require(dirname(__FILE__).DIRECTORY_SEPARATOR.'_menu.php');
$this->menu=array(
	array('label'=>'Personal','icon'=>'fa fa-chevron-circle-right', 'url'=>array('perPersonal/admin '), 'active' => FALSE),	        
        array('label'=>'Medico','icon'=>'fa fa-chevron-circle-right', 'url'=>  array('meMedico/admin'), 'active' => TRUE),
	array('label'=>'Inicio Sesion','icon'=>'fa fa-chevron-circle-right', 'url'=>array('seSesionUsuario/admin'), 'active' => FALSE),
//        array('label'=>'Tipo Cuenta','icon'=>'fa fa-chevron-circle-right', 'url'=>  array('seTipoCuenta/admin'), 'active' => FALSE),
);

if(!isset($_GET['asModal'])){
?>
<?php $box = $this->beginWidget(
    'bootstrap.widgets.TbBox',
    array(
        'title' => 'Ver Datos de Medicos '.$model->personal->identidad,
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
			'pk_id_medico',
                array(                         
                 'label'=>'Personal Medico',
                 'name'=>'personal.NombreCompleto',    
                 'type'=>'raw',
                     ), 		
		'titulo.titulo',
		'universidad.universidad',
		'pais.pais',
		'ciudad.ciudad',
		
			array(
		        'name'=> 'fecha_obtencion',
		        'type'=>'raw',
		        'value' => date("d M Y",strtotime($model->fecha_obtencion)),
		    ),
			
		'n_atencion',
		'n_atencion_nuevo',
                array(                         
                 'label'=>'Estado',
                 'name'=>'estado.valor',
                 'type'=>'raw',
                     ),		
		'fecha_creacion',
		'fecha_modificacion',
                array(                         
                 'label'=>'Creado por ',
                 'name'=>'cuentar.cuenta',
                 'type'=>'raw',
                     ),
                array(                         
                 'label'=>'Modificado por ',
                 'name'=>'cuentam.cuenta',
                 'type'=>'raw',
                     ),		
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

<?php
if(!isset($_GET['asModal'])){
	$this->endWidget();}
?>