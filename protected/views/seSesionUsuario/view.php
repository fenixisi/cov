<?php
/* @var $this SeSesionUsuarioController */
/* @var $model SeSesionUsuario */

$this->breadcrumbs=array(
	'Inicio de Sesion'=>array('index'),
	$model->pk_id_usuario,
);

require(dirname(__FILE__).DIRECTORY_SEPARATOR.'_menu.php');
$this->menu=array(
	array('label'=>'Personal','icon'=>'fa fa-chevron-circle-right', 'url'=>array('perPersonal/admin '), 'active' => FALSE),	        
        array('label'=>'Medico','icon'=>'fa fa-chevron-circle-right', 'url'=>  array('meMedico/admin'), 'active' => FALSE),
	array('label'=>'Inicio Sesion','icon'=>'fa fa-chevron-circle-right', 'url'=>array('seSesionUsuario/admin'), 'active' => TRUE),
//        array('label'=>'Tipo Cuenta','icon'=>'fa fa-chevron-circle-right', 'url'=>  array('seTipoCuenta/admin'), 'active' => FALSE),
);

if(!isset($_GET['asModal'])){
?>
<?php $box = $this->beginWidget(
    'bootstrap.widgets.TbBox',
    array(
        'title' => 'Ver Inicio de Sesion de '.$model->pk_id_usuario,
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
                array(                         
                 'label'=>'Tipo Cuenta',
                 'name'=>'tipocuenta.cuenta',    
                 'type'=>'raw',
                     ),
                array(                         
                 'label'=>'Nombre',
                 'name'=>'personal.nombre_completo',    
                 'type'=>'raw',
                     ),
                array(                         
                 'label'=>'Apellido Paterno',
                 'name'=>'personal.apellido_paterno',                    
                 'type'=>'raw',
                     ),		
               array(                         
                 'label'=>'Apellido Materno',
                 'name'=>'personal.apellido_materno',
                 'type'=>'raw',
                   ),
		'cuenta',		
                array(                         
                 'label'=>'Estado Cuenta',
                 'name'=>'estado.valor',    
                 'type'=>'raw',
                     ),
		'fecha_creacion',
		'fecha_modificacion',
                array(                         
                 'label'=>'Registro Usuario',
                 'name'=>'sesionc.cuenta',    
                 'type'=>'raw',
                     ),
                array(                         
                 'label'=>'Actualizo Usuario',
                 'name'=>'sesionm.cuenta',    
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