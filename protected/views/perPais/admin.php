<?php
/* @var $this PerPaisController */
/* @var $model PerPais */

$this->breadcrumbs=array(
	'Paises'=>array('index'),
	'Administrar',
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

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#per-pais-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");

?>

<?php $box = $this->beginWidget(
    'bootstrap.widgets.TbBox',
    array(
        'title' => 'Administrar Paises',
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
            'label' => 'Registrar Pais',
            'url' => array('create'),
            'type'=> 'primary',
            'icon'=>'fa fa-plus',
             'htmlOptions' => array(
                'title' => 'Registrar de los Paises ',
                ),
            )
        ); ?>

<?php echo CHtml::beginForm(array('export')); ?>
<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'per-pais-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'type' => 'striped hover', //bordered condensed
	'columns'=>array(
			array(
		        'header' => 'Nº',
		        'name'=> 'pk_id_pais',
		        'type'=>'raw',
		        'value' => '($data->pk_id_pais)',		        
	            'headerHtmlOptions' => array('style' => 'text-align:center'),				
		    ),
			
			array(
		        'header' => 'Pais',
		        'name'=> 'pais',
		        'type'=>'raw',
		        'value' => '($data->pais)',		        
	            'headerHtmlOptions' => array('style' => 'text-align:center'),				
		    ),
			
			array(
		        'header' => 'Detalle',
		        'name'=> 'detalle',
		        'type'=>'raw',
		        'value' => '($data->detalle)',		        
	            'headerHtmlOptions' => array('style' => 'text-align:center'),				
		    ),
			
			array(
		        'header' => 'Fecha',
		        'name'=> 'fecha',
		        'type'=>'raw',
		        'value' => '($data->fecha)',		        
	            'headerHtmlOptions' => array('style' => 'text-align:center'),			
		    ),
					
	    array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
                        'template'=>'{view} {update}',
			'buttons'=>array
            (
                'view' => array
                (    
                	'url' => '$data->pk_id_pais."|".$data->pk_id_pais',              
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
