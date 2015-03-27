<?php
/* @var $this PerPersonalController */
/* @var $model PerPersonal */

$this->breadcrumbs=array(
	'Personal'=>array('index'),
	'Administrar',
);

require(dirname(__FILE__).DIRECTORY_SEPARATOR.'_menu.php');
$this->menu=array(
	array('label'=>'Personal','icon'=>'fa fa-chevron-circle-right', 'url'=>array('perPersonal/admin '), 'active' => TRUE),	        
        array('label'=>'Medico','icon'=>'fa fa-chevron-circle-right', 'url'=>  array('meMedico/admin'), 'active' => FALSE),
	array('label'=>'Inicio Sesion','icon'=>'fa fa-chevron-circle-right', 'url'=>array('seSesionUsuario/admin'), 'active' => FALSE),
//        array('label'=>'Tipo Cuenta','icon'=>'fa fa-chevron-circle-right', 'url'=>  array('seTipoCuenta/admin'), 'active' => FALSE),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#per-personal-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");?>

<?php $box = $this->beginWidget(
    'bootstrap.widgets.TbBox',
    array(
        'title' => 'Administrar Personal',
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
            'label' => 'Registrar Personal',
            'url' => array('create'),
            'type'=> 'primary',
            'icon'=>'fa fa-plus',
             'htmlOptions' => array(
                'title' => 'Registrar datos del Personal ',
                ),
            )
        ); ?>

<?php $this->widget('bootstrap.widgets.TbButton',
            array(
            'label' => 'Actualizar ',
            'url' => array('admin'),
            'type'=> 'primary',
            'icon'=>'fa fa-plus',
             'htmlOptions' => array(
                'title' => 'Actualiza datos de Registro  ',
                ),
            )
        ); ?>


<?php echo CHtml::beginForm(array('export')); ?>
<?php $this->widget('bootstrap.widgets.TbExtendedGridView',array(
	'id'=>'per-personal-grid',
	'dataProvider'=>$model->search(),        
	'filter'=>$model,
        'fixedHeader' => true,
        'headerOffset' => 40,
        'template' => "{items}",        
	'type' => 'striped hover', //bordered condensed
	'columns'=>array(                   
			array(
		        'header' => 'Identidad',
		        'name'=> 'identidad',
		        'type'=>'raw',
		        'value' => '($data->identidad)',
	            'headerHtmlOptions' => array('style' => 'text-align:center'),				
		    ),
			
			array(
		        'header' => 'Nombre',
		        'name'=> 'nombre_completo',
		        'type'=>'raw',
		        'value' => '($data->nombre_completo)',		        
	            'headerHtmlOptions' => array('style' => 'text-align:center'),				
		    ),
			

			array(
		        'header' => 'Ape. Paterno',
		        'name'=> 'apellido_paterno',
		        'type'=>'raw',
		        'value' => '($data->apellido_paterno)',
	            'headerHtmlOptions' => array('style' => 'text-align:center'),				
		    ),
			
			array(
		        'header' => 'Ape. Materno',
		        'name'=> 'apellido_materno',
		        'type'=>'raw',
		        'value' => '($data->apellido_materno)',		       
	            'headerHtmlOptions' => array('style' => 'text-align:center'),				
		    ),

			array(
		        'header' => 'Profesion',
		        'name'=> 'fk_profesion',
		        'type'=>'raw',
		        'value' => '($data->profesion->profesion_ocupacion)',
	            'headerHtmlOptions' => array('style' => 'text-align:center'),				
		    ),
			

			array(
		        'header' => 'Direccion',
		        'name'=> 'direccion',
		        'type'=>'raw',
		        'value' => '($data->direccion)',
	            'headerHtmlOptions' => array('style' => 'text-align:center'),				
		    ),
			
			array(
		        'header' => 'Telefono',
		        'name'=> 'telefono',
		        'type'=>'raw',
		        'value' => '($data->telefono)',		        
	            'headerHtmlOptions' => array('style' => 'text-align:center'),				
		    ),

			array(
		        'header' => 'Celular',
		        'name'=> 'celular',
		        'type'=>'raw',
		        'value' => '($data->celular)',
	            'headerHtmlOptions' => array('style' => 'text-align:center'),				
		    ),
	    array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
                        'template'=>'{view} {update}',
			'buttons'=>array
                            (
                                'view' => array
                                (    
                                        'url' => '$data->pk_id_personal."|".$data->pk_id_personal',              
                                        'click' => 'function(){
                                                data=$(this).attr("href").split("|")
                                                $("#myModalHeader").html(data[1]);
                                                        $("#myModalBody").load("'.$this->createUrl('view').'&id="+data[0]+"&asModal=true");
                                                $("#myModal").modal();
                                                return false;
                                        }', 
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
