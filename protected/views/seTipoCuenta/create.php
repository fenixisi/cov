<?php
/* @var $this SeTipoCuentaController */
/* @var $model SeTipoCuenta */

$this->breadcrumbs=array(
	'Tipo Cuenta'=>array('index'),
	'Registrar',
);

require(dirname(__FILE__).DIRECTORY_SEPARATOR.'_menu.php');
$this->menu=array(
	array('label'=>'Personal','icon'=>'fa fa-chevron-circle-right', 'url'=>array('perPersonal/admin '), 'active' => FALSE),	
        array('label'=>'Inicio Sesion','icon'=>'fa fa-chevron-circle-right', 'url'=>array('seSesionUsuario/admin'), 'active' => FALSE),
        array('label'=>'Tipo Cuenta','icon'=>'fa fa-chevron-circle-right', 'url'=>  array('seTipoCuenta/admin'), 'active' => TRUE),	  
);
?>

<?php $box = $this->beginWidget(
    'bootstrap.widgets.TbBox',
    array(
        'title' => 'Registrar Tipo Cuenta' ,
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
<?php echo $this->renderPartial('_form', array('model'=>$model,'fechaser'=>$fechaser)); ?>
<?php $this->endWidget(); ?>