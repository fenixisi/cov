<?php
/* @var $this MeMedicoEspecialidadController */
/* @var $model MeMedicoEspecialidad */

$this->breadcrumbs=array(
	'Especialidad Medico'=>array('index'),
	'Administrar',
);

require(dirname(__FILE__).DIRECTORY_SEPARATOR.'_menu.php');
$this->menu=array(
	array('label'=>'Personal','icon'=>'fa fa-chevron-circle-right', 'url'=>array('perPersonal/admin '), 'active' => FALSE),	        
        array('label'=>'Medico','icon'=>'fa fa-chevron-circle-right', 'url'=>  array('meMedico/admin'), 'active' => TRUE),
	array('label'=>'Inicio Sesion','icon'=>'fa fa-chevron-circle-right', 'url'=>array('seSesionUsuario/admin'), 'active' => FALSE),
//        array('label'=>'Tipo Cuenta','icon'=>'fa fa-chevron-circle-right', 'url'=>  array('seTipoCuenta/admin'), 'active' => FALSE),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#me-medico-especialidad-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<?php $box = $this->beginWidget(
    'bootstrap.widgets.TbBox',
    array(
        'title' => 'Manage Me Medico Especialidads',
        'headerIcon' => 'icon- fa fa-tasks',
        'headerButtons' => array(
            array(
                'class' => 'bootstrap.widgets.TbButtonGroup',
                'type' => 'success',
                // '', 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
                'buttons' => $this->menu
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

<?php echo CHtml::beginForm(array('export')); ?>
<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'me-medico-especialidad-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'type' => 'striped hover', //bordered condensed
	'columns'=>array(			
			
			array(
		        'header' => 'Personal Medico',
		        'name'=> 'fk_medico',
		        'type'=>'raw',
		        'value' => '($data->pk_medico)',		        
	            'headerHtmlOptions' => array('style' => 'text-align:center'),				
		    ),
			
			array(
		        'header' => 'fk_especialidad',
		        'name'=> 'fk_especialidad',
		        'type'=>'raw',
		        'value' => '($data->pk_especialidad)',		        
	            'headerHtmlOptions' => array('style' => 'text-align:center'),				
		    ),
			
			array(
		        'header' => 'Fk_universidad',
		        'name'=> 'fk_universidad',
		        'type'=>'raw',
		        'value' => '($data->fk_universidad)',		        
	            'headerHtmlOptions' => array('style' => 'text-align:center'),				
		    ),
			
			array(
		        'header' => 'Fk_pais',
		        'name'=> 'fk_pais',
		        'type'=>'raw',
		        'value' => '($data->fk_pais)',		        
	            'headerHtmlOptions' => array('style' => 'text-align:center'),				
		    ),
			
			array(
		        'header' => 'Fk_ciudad',
		        'name'=> 'fk_ciudad',
		        'type'=>'raw',
		        'value' => '($data->fk_ciudad)',		        
	            'headerHtmlOptions' => array('style' => 'text-align:center'),				
		    ),
			
/*
			array(
		        'header' => 'Anio_obtencion',
		        'name'=> 'anio_obtencion',
		        'type'=>'raw',
		        'value' => '(date("d-M-Y",strtotime($data->anio_obtencion)))',
		        'class' => 'bootstrap.widgets.TbEditableColumn',
	            'headerHtmlOptions' => array('style' => 'width:100px;text-align:center;'),
	            'htmlOptions' => array('style' => 'text-align:center;'),
				'editable' => array(
					'type'          => 'date',
					'format'		=> 'yyyy-mm-dd', //sent to server
                  	'viewformat'    => 'dd-M-yyyy', //view user
					'url'     => $this->createUrl('editable'),
					'placement'     => 'right',
					'params' => array('YII_CSRF_TOKEN' => Yii::app()->request->csrfToken),
				)
		    ),
			
*/
/*
			array(
		        'header' => 'Detalle',
		        'name'=> 'detalle',
		        'type'=>'raw',
		        'value' => '($data->detalle)',
		        'class' => 'bootstrap.widgets.TbEditableColumn',
	            'headerHtmlOptions' => array('style' => 'text-align:center'),
				'editable' => array(
					'type'    => 'textarea',
					'url'     => $this->createUrl('editable'),
					'params' => array('YII_CSRF_TOKEN' => Yii::app()->request->csrfToken),
				)
		    ),
			
*/
/*
			array(
		        'header' => 'Fecha_creacion',
		        'name'=> 'fecha_creacion',
		        'type'=>'raw',
		        'value' => '($data->fecha_creacion)',
		        'class' => 'bootstrap.widgets.TbEditableColumn',
	            'headerHtmlOptions' => array('style' => 'text-align:center'),
				'editable' => array(
					'type'    => 'textarea',
					'url'     => $this->createUrl('editable'),
					'params' => array('YII_CSRF_TOKEN' => Yii::app()->request->csrfToken),
				)
		    ),
			
*/
/*
			array(
		        'header' => 'Fecha_modificacion',
		        'name'=> 'fecha_modificacion',
		        'type'=>'raw',
		        'value' => '($data->fecha_modificacion)',
		        'class' => 'bootstrap.widgets.TbEditableColumn',
	            'headerHtmlOptions' => array('style' => 'text-align:center'),
				'editable' => array(
					'type'    => 'textarea',
					'url'     => $this->createUrl('editable'),
					'params' => array('YII_CSRF_TOKEN' => Yii::app()->request->csrfToken),
				)
		    ),
			
*/
/*
			array(
		        'header' => 'Fk_usuario_creacion',
		        'name'=> 'fk_usuario_creacion',
		        'type'=>'raw',
		        'value' => '($data->fk_usuario_creacion)',
		        'class' => 'bootstrap.widgets.TbEditableColumn',
	            'headerHtmlOptions' => array('style' => 'text-align:center'),
				'editable' => array(
					'type'    => 'textarea',
					'url'     => $this->createUrl('editable'),
					'params' => array('YII_CSRF_TOKEN' => Yii::app()->request->csrfToken),
				)
		    ),
			
*/
/*
			array(
		        'header' => 'Fk_usuario_modificacion',
		        'name'=> 'fk_usuario_modificacion',
		        'type'=>'raw',
		        'value' => '($data->fk_usuario_modificacion)',
		        'class' => 'bootstrap.widgets.TbEditableColumn',
	            'headerHtmlOptions' => array('style' => 'text-align:center'),
				'editable' => array(
					'type'    => 'textarea',
					'url'     => $this->createUrl('editable'),
					'params' => array('YII_CSRF_TOKEN' => Yii::app()->request->csrfToken),
				)
		    ),
			
*/
		/*
		//Contoh
		array(
	        'header' => 'Level',
	        'name'=> 'ref_level_id',
	        'type'=>'raw',
	        'value' => '($data->Level->name)',
	        // 'value' => '($data->status)?"on":"off"',
	    ),
	    */
	    array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
                        'template'=>'{view} {update}',
			'buttons'=>array
            (
                'view' => array
                (    
                	'url' => '$data->pk_id_medico_especialidad."|".$data->pk_id_medico_especialidad',              
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
