<?php
/* @var $this SeSesionUsuarioController */
/* @var $model SeSesionUsuario */

$this->breadcrumbs=array(
	'Inicio de Sesion'=>array('index'),
	'Administrar Sesiones ',
);

require(dirname(__FILE__).DIRECTORY_SEPARATOR.'_menu.php');
$this->menu=array(
	array('label'=>'Personal','icon'=>'fa fa-chevron-circle-right', 'url'=>array('perPersonal/admin '), 'active' => FALSE),	        
        array('label'=>'Medico','icon'=>'fa fa-chevron-circle-right', 'url'=>  array('meMedico/admin'), 'active' => FALSE),
	array('label'=>'Inicio Sesion','icon'=>'fa fa-chevron-circle-right', 'url'=>array('seSesionUsuario/admin'), 'active' => TRUE),
//        array('label'=>'Tipo Cuenta','icon'=>'fa fa-chevron-circle-right', 'url'=>  array('seTipoCuenta/admin'), 'active' => FALSE),
);
?>

<?php $box = $this->beginWidget(
    'bootstrap.widgets.TbBox',
    array(
        'title' => 'Registrar Inicio de Sesion ' ,
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

        <h2>Registro de Inicio de Sesion 
            <?php $this->widget('bootstrap.widgets.TbButton',
            array(
            'label' => 'Administrar Acceso',
            'url' => array('admin'),
            'type'=> 'primary',
            'icon'=>'fa fa-plus',
             'htmlOptions' => array(
                'title' => 'Administrar Accesos al Sistema  ',
                ),
            )
        ); ?>
        </h2>
    
<?php $this->widget('bootstrap.widgets.TbTabs', array(
    'type'=>'tabs', // 'tabs' or 'pills'
    'tabs'=>array(        
        array('label'=>'Personal Sin Acceso','content'=>$this->renderPartial('ver_personal',array('personal'=>$personal ), true ), 'active'=>true),
//        array('label'=>'Personal Activo ','content'=>$this->renderPartial('ver_sesion',array('sesion'=>$sesion ), true )),
        array('label'=>'Personal Inactivo','content'=>$this->renderPartial('ver_sesionin',array('sesion'=>$sesion ), true )),
        
    ),
)); ?>

<?php $this->endWidget(); ?>