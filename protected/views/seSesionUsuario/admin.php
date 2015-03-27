<?php
/* @var $this SeSesionUsuarioController */
/* @var $model SeSesionUsuario */

$this->breadcrumbs=array(
	'Inicio de Sesion'=>array('index'),
	'Administrar',
);

require(dirname(__FILE__).DIRECTORY_SEPARATOR.'_menu.php');
$this->menu=array(
	array('label'=>'Personal','icon'=>'fa fa-chevron-circle-right', 'url'=>array('perPersonal/admin '), 'active' => FALSE),	        
        array('label'=>'Medico','icon'=>'fa fa-chevron-circle-right', 'url'=>  array('meMedico/admin'), 'active' => FALSE),
	array('label'=>'Inicio Sesion','icon'=>'fa fa-chevron-circle-right', 'url'=>array('seSesionUsuario/admin'), 'active' => TRUE),
//        array('label'=>'Tipo Cuenta','icon'=>'fa fa-chevron-circle-right', 'url'=>  array('seTipoCuenta/admin'), 'active' => FALSE),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#se-sesion-usuario-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<?php $box = $this->beginWidget(
    'bootstrap.widgets.TbBox',
    array(
        'title' => 'Administrar Accesos de Inicio de Sesion',
        'headerIcon' => 'icon- fa fa-tasks',
        'headerButtons' => array(
            array(
                'class' => 'bootstrap.widgets.TbButtonGroup',
                'type' => 'success',
                // '', 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'                
            ),
        ) 
    )
);?>		<?php $this->widget('bootstrap.widgets.TbAlert', array(
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

<?php $this->widget('bootstrap.widgets.TbButton',
            array(
            'label' => 'Registrar Accesos',
            'url' => array('AdminSesion'),            
            'type'=> 'primary',
            'icon'=>'fa fa-th-list',
            'htmlOptions' => array(
                'title' => 'Registrar Inicio de Sesion del Personal ',
            ),
            )
        ); ?>

<?php echo CHtml::beginForm(array('export')); ?>
<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'se-sesion-usuario-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'type' => 'striped hover', //bordered condensed
	'columns'=>array(
			array(
		        'header' => 'Tipo Cuenta',
		        'name'=> 'fk_tipo_cuenta',
		        'type'=>'raw',
		        'value' => '($data->tipocuenta->cuenta)',		
                        'filter' => CHtml::listData(SeTipoCuenta::model()->findAll(), "pk_id_cuenta","cuenta"), // Colocamos un combo en el filtro
	            'headerHtmlOptions' => array('style' => 'text-align:center'),				
		    ),
                    
                    array(
		        'header' => 'Cedula Identidad',
		        'name'=> 'fk_personal',
		        'type'=>'raw',
		        'value' => '($data->personal->identidad)',		        
	            'headerHtmlOptions' => array('style' => 'text-align:center'),				
		    ),
			
			array(
		        'header' => 'Nombre Personal',
		        'name'=> 'fk_personal',
		        'type'=>'raw',
		        'value' => '($data->personal->nombre_completo."\n".$data->personal->apellido_paterno ."\n".$data->personal->apellido_materno)', 
	            'headerHtmlOptions' => array('style' => 'text-align:center'),				
		    ),                                        
			
			array(
		        'header' => 'Cuenta',
		        'name'=> 'cuenta',
		        'type'=>'raw',
		        'value' => '($data->cuenta)',		        
	            'headerHtmlOptions' => array('style' => 'text-align:center'),				
		    ),						
			
			array(
		        'header' => 'Estado',
		        'name'=> 'fk_estado',
		        'type'=>'raw',
		        'value' => '($data->estado->valor)',		        
	            'headerHtmlOptions' => array('style' => 'text-align:center'),				
		    ),
                    array(
		        'header' => 'Fecha',
		        'name'=> 'fecha_creacion',
		        'type'=>'raw',
		        'value' => '($data->fecha_creacion)',		        
	            'headerHtmlOptions' => array('style' => 'text-align:center'),				
		    ),
			
                    array(
                                'class'=>'bootstrap.widgets.TbButtonColumn',
                                'template'=>'{view} {update} {Inactivar}',
                                'buttons'=>array
                    (
                        'view' => array
                        (    
                                'url' => '$data->pk_id_usuario."|".$data->pk_id_usuario',              
                                'click' => 'function(){
                                        data=$(this).attr("href").split("|")
                                        $("#myModalHeader").html(data[1]);
                                                $("#myModalBody").load("'.$this->createUrl('view').'&id="+data[0]+"&asModal=true");
                                        $("#myModal").modal();
                                        return false;
                                }', 
                        ),
                         'Inactivar' => array(
                                'label'=>'Inactivar Usuario', 
                                'url'=>"CHtml::normalizeUrl(array('/SeSesionUsuario/inactivar', 'id'=>\$data->pk_id_usuario))",
                                'icon'=> ' fa fa-ban',
                            ), 
                    )
		),
	),
)); ?>

<select name="fileType" style="width:150px;">
	<option value="Excel5">EXCEL 5 (xls)</option>
	<option value="Excel2007">EXCEL 2007 (xlsx)</option>	
	<option value="PDF">PDF</option>
	<option value="WORD">WORD (docx)</option>
</select>
<br>

<?php 
$this->widget('bootstrap.widgets.TbButton', array(
	'buttonType'=>'submit', 'icon'=>'fa fa-print','label'=>'Export', 'type'=> 'primary'));
?>
<?php echo CHtml::endForm(); ?>

<?php $this->endWidget(); ?>
<?php  $this->beginWidget(
    'bootstrap.widgets.TbModal',
    array('id' => 'myModal')
); ?>
 
    <div class="modal-header">
        <a class="close" data-dismiss="modal">&times;</a>
        <h4 id="myModalHeader">Modal header</h4>
    </div>
 
    <div class="modal-body" id="myModalBody">
        <p>Cargando Datos...</p>
    </div>
 
    <div class="modal-footer">
        <?php  $this->widget(
            'bootstrap.widgets.TbButton',
            array(
                'label' => 'Close',
                'url' => '#',
                'htmlOptions' => array('data-dismiss' => 'modal'),
            )
        ); ?>
    </div>
 
<?php  $this->endWidget(); ?>
