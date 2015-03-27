<?php
if(!isset($_GET['asModal'])){

 $box = $this->beginWidget(
    'bootstrap.widgets.TbBox',
    array(
        'title' => 'Manage Me Medico Especialidads',
        'headerIcon' => 'icon- fa fa-tasks',        
    )
);
}?>		

<?php echo CHtml::beginForm(array('ExportEspecial')); ?>
<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'me-medico-especialidad-grid',
	'dataProvider'=>$especialidad,	
	'type' => 'striped hover', //bordered condensed
	'columns'=>array(			
			
			array(
		        'header' => 'Personal Medico',
		        'name'=> 'fk_medico',
		        'type'=>'raw',
		        'value' => '($data->fk_medico)',		        
	            'headerHtmlOptions' => array('style' => 'text-align:center'),				
		    ),
			
			array(
		        'header' => 'Especialidad',
		        'name'=> 'fk_especialidad',
		        'type'=>'raw',
		        'value' => '($data->especialidad->especialidad)',  
	            'headerHtmlOptions' => array('style' => 'text-align:center'),				
		    ),
			
			array(
		        'header' => 'Universidad',
		        'name'=> 'fk_universidad',
		        'type'=>'raw',
		        'value' => '($data->universidad->universidad)',		        
	            'headerHtmlOptions' => array('style' => 'text-align:center'),				
		    ),
			
			array(
		        'header' => 'Pais',
		        'name'=> 'fk_pais',
		        'type'=>'raw',
		        'value' => '($data->pais->pais)',		        
	            'headerHtmlOptions' => array('style' => 'text-align:center'),				
		    ),
			
			array(
		        'header' => 'Ciudad',
		        'name'=> 'fk_ciudad',
		        'type'=>'raw',
		        'value' => '($data->ciudad->ciudad)',		        
	            'headerHtmlOptions' => array('style' => 'text-align:center'),				
		    ),

			array(
		        'header' => 'Año Obtencion',
		        'name'=> 'anio_obtencion',
		        'type'=>'raw',
		        'value' => '(date("d-M-Y",strtotime($data->anio_obtencion)))',		    
	            'headerHtmlOptions' => array('style' => 'width:100px;text-align:center;'),
	            'htmlOptions' => array('style' => 'text-align:center;'),				
		    ),
			
			array(
		        'header' => 'Detalle',
		        'name'=> 'detalle',
		        'type'=>'raw',
		        'value' => '($data->detalle)',		        
	            'headerHtmlOptions' => array('style' => 'text-align:center'),				
		    ),
			
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
		
	    array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
                        'template'=>'{update}',
			'buttons'=>array
            (
                'view' => array
                (    
                	'url' => '$data->pk_id_medico_especialidad."|".$data->pk_id_medico_especialidad',              
                	'click' => 'function(){
                		data=$(this).attr("href").split("|")
                		$("#myModalHeader").html(data[1]);
	        			$("#myModalBody").load("'.$this->createUrl('meMedicoEspecialidad/view').'&id="+data[0]+"&asModal=true");
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
$this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'icon'=>'fa fa-print','label'=>'Export', 'type'=> 'primary'));?>

<?php echo CHtml::endForm(); ?>
<?php
if(!isset($_GET['asModal'])){
	$this->endWidget();}
?>