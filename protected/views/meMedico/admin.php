<?php
/* @var $this MeMedicoController */
/* @var $model MeMedico */

$this->breadcrumbs=array(
	'Medico'=>array('index'),
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
	$('#me-medico-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<?php $box = $this->beginWidget(
    'bootstrap.widgets.TbBox',
    array(
        'title' => 'Administrar Medicos',
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
            'label' => 'Registrar Medico',
            'url' => array('create'),
            'type'=> 'primary',
            'icon'=>'fa fa-plus',
             'htmlOptions' => array(
                'title' => 'Registrar Personal Medico ',
                ),
            )
        ); ?>

<?php echo CHtml::beginForm(array('export')); ?>
<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'me-medico-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'type' => 'striped hover', //bordered condensed
	'columns'=>array(									
			
			array(
		        'header' => 'Titulo',
		        'name'=> 'fk_titulo',
		        'type'=>'raw',
		        'value' => '($data->titulo->titulo)',	
                        'filter' => CHtml::listData(MeTitulo::model()->findAll(), "pk_id_titulo","titulo"), // Colocamos un combo en el filtro
	            'headerHtmlOptions' => array('style' => 'text-align:center','width'=>'250'),				
		    ),						
                    
                    array(
		        'header' => 'Cadula Identidad',
		        'name'=> 'fk_personal',
		        'type'=>'raw',
		        'value' => '($data->personal->identidad)',
                        'headerHtmlOptions' => array('style' => 'text-align:center','width'=>'150'),				
                        ),
                        
                        array(
		        'header' => 'Nombre Medico',
		        'name'=> 'fk_personal',
		        'type'=>'raw',
                        'filter'=>FALSE,
		        'value' => '($data->persona->nombre_completo."\n".$data->persona->apellido_paterno."\n".$data->persona->apellido_materno)', 
                        'headerHtmlOptions' => array('style' => 'text-align:center','width'=>'250'),			
                        ),						
            
/*
			array(
		        'header' => 'N_atencion',
		        'name'=> 'n_atencion',
		        'type'=>'raw',
		        'value' => '($data->n_atencion)',
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
		        'header' => 'N_atencion_nuevo',
		        'name'=> 'n_atencion_nuevo',
		        'type'=>'raw',
		        'value' => '($data->n_atencion_nuevo)',
		        'class' => 'bootstrap.widgets.TbEditableColumn',
	            'headerHtmlOptions' => array('style' => 'text-align:center'),
				'editable' => array(
					'type'    => 'textarea',
					'url'     => $this->createUrl('editable'),
					'params' => array('YII_CSRF_TOKEN' => Yii::app()->request->csrfToken),
				)
		    ),
			
*/

//			array(
//		        'header' => 'Estado',
//		        'name'=> 'fk_estado',
//		        'type'=>'raw',
//                        'filter'=>FALSE,
//		        'value' => '($data->estado->valor)',
//	            'headerHtmlOptions' => array('style' => 'text-align:center'),				
//		    ),
			
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
	    array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
                        'template'=>'{view} {update} {especialidad} {verespecialidad} {horario} {verhorario} {ver}',                        
                        'headerHtmlOptions' => array('style' => 'text-align:center','width'=>'200'),
			'buttons'=>array
                            (
                                'view' => array
                                (    
                                        'url' => '$data->pk_id_medico."|".$data->pk_id_medico',              
                                        'click' => 'function(){
                                                data=$(this).attr("href").split("|")
                                                $("#myModalHeader").html(data[1]);
                                                        $("#myModalBody").load("'.$this->createUrl('view').'&id="+data[0]+"&asModal=true");
                                                $("#myModal").modal();
                                                return false;
                                        }', 
                                ),
                                'ver' => array
                                (    
                                        'url' => '$data->pk_id_medico."|".$data->pk_id_medico',              
                                        'click' => 'function(){
                                                data=$(this).attr("href").split("|")
                                                $("#myModalHeader").html(data[1]);
                                                        $("#myModalBody").load("'.$this->createUrl('especialidad').'&id="+data[0]+"&asModal=true");
                                                $("#myModal").modal();
                                                return false;
                                        }', 
                                    'icon'=> ' fa fa-list-alt',
                                ),
                                'especialidad' => array(
                                'label'=>'Registro Especialidad de Medico ', 
                                'url'=>"CHtml::normalizeUrl(array('/MeMedicoEspecialidad/create', 'id'=>\$data->pk_id_medico))",
                                'icon'=> ' fa fa-star',
                                ),
                            
                                'verespecialidad' => array(
                                'label'=>'Administrar Especialidades de Medico ', 
                                'url'=>"CHtml::normalizeUrl(array('especialidad', 'id'=>\$data->pk_id_medico))",
                                'icon'=> ' fa fa-list-alt',
                                ),
                            
                                'horario' => array(
                                'label'=>'Registro de Horarios de Medico ', 
                                'url'=>"CHtml::normalizeUrl(array('/MeMedico/create', 'id'=>\$data->pk_id_medico))",
                                'icon'=> ' fa fa-calendar',
                                ),
                                
                                'verhorario' => array(
                                'label'=>'Ver Horario de Medico ', 
                                'url'=>"CHtml::normalizeUrl(array('/MeMedico/create', 'id'=>\$data->pk_id_medico))",
                                'icon'=> ' fa fa-list',
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
