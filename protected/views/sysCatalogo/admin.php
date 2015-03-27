<?php
/* @var $this SysCatalogoController */
/* @var $model SysCatalogo */

$this->breadcrumbs=array(
	'Catalogo del Sistema'=>array('index'),
	'Administracion',
);

require(dirname(__FILE__).DIRECTORY_SEPARATOR.'_menu.php');
$this->menu=array(
	array('label'=>'Catalogo','icon'=>'fa fa-chevron-circle-right', 'url'=>array('sysCatalogo/admin '), 'active' => TRUE),	
        array('label'=>'Pais','icon'=>'fa fa-chevron-circle-right', 'url'=>array('perPais/admin '), 'active' => FALSE),
	array('label'=>'Ciudad','icon'=>'fa fa-chevron-circle-right', 'url'=>array('perCiudad/admin'), 'active' => FALSE),        
        array('label'=>'Profesion/Ocu','icon'=>'fa fa-chevron-circle-right', 'url'=>array('perProfesion/admin'), 'active' => FALSE),        
        array('label'=>'Titulaciones','icon'=>'fa fa-chevron-circle-right', 'url'=>array('meTitulo/admin'), 'active' => FALSE),        
        array('label'=>'Universidades','icon'=>'fa fa-chevron-circle-right', 'url'=>array('meUniversidad/admin'), 'active' => FALSE),        
        array('label'=>'Especialiadedes','icon'=>'fa fa-chevron-circle-right', 'url'=>array('meEspecialidad/admin'), 'active' => FALSE),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#sys-catalogo-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<?php $box = $this->beginWidget(
    'bootstrap.widgets.TbBox',
    array(
        'title' => 'Administrar Catalogos del Sistema',
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
            'label' => 'Registrar Catalogo',
            'url' => array('create'),
            'type'=> 'primary',
            'icon'=>'fa fa-plus',
             'htmlOptions' => array(
                'title' => 'Registrar Catalo Para el Sistema ',
                ),
            )
        ); ?>


<?php echo CHtml::beginForm(array('export')); ?>
<?php $this->widget('bootstrap.widgets.TbExtendedGridView',array(
	'id'=>'sys-catalogo-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
        'fixedHeader' => true,
        'headerOffset' => 10,
	'type' => 'striped hover', //bordered condensed
	'columns'=>array(
			array(
		        'header' => 'Nº',
		        'name'=> 'pk_id_catalogo',
		        'type'=>'raw',
		        'value' => '($data->pk_id_catalogo)',		        
	            'headerHtmlOptions' => array('style' => 'text-align:center'),				
		    ),
            
                    array(
		        'header' => 'Estado',
		        'name'=> 'estado',
		        'type'=>'raw',
		        'value' => '($data->estado)',		        
	            'headerHtmlOptions' => array('style' => 'text-align:center'),				
		    ),
            
                    array(
		        'header' => 'Nombre',
		        'name'=> 'nombre',
		        'type'=>'raw',
		        'value' => '($data->nombre)',		        
	            'headerHtmlOptions' => array('style' => 'text-align:center'),				
		    ),
			
			array(
		        'header' => 'Tabla',
		        'name'=> 'tabla',
		        'type'=>'raw',
		        'value' => '($data->tabla)',		        
	            'headerHtmlOptions' => array('style' => 'text-align:center'),				
		    ),
			
			array(
		        'header' => 'Valor',
		        'name'=> 'valor',
		        'type'=>'raw',
		        'value' => '($data->valor)',		        
	            'headerHtmlOptions' => array('style' => 'text-align:center'),				
		    ),
			
			array(
		        'header' => 'Fecha_creacion',
		        'name'=> 'fecha_creacion',
		        'type'=>'raw',
		        'value' => '($data->fecha_creacion)',		        
	            'headerHtmlOptions' => array('style' => 'text-align:center'),				
		    ),
			
	    array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
                        'template'=>'{view} {update}',
			'buttons'=>array
            (
                'view' => array
                (    
                	'url' => '$data->pk_id_catalogo."|".$data->pk_id_catalogo',              
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
        <p>One fine body...</p>
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
