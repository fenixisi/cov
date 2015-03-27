<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'me-especialidad-form',	
	'enableAjaxValidation'=>false,
	// 'htmlOptions'=>array('enctype'=>'multipart/form-data'),
)); ?>

	<p class="note">Los campos con <span class="required">*</span> se requieren.</p>

	<?php echo $form->errorSummary($model); ?>

<?php echo $form->textFieldRow($model,'especialidad',array('class'=>'span5','maxlength'=>45, 'readonly'=>'false')); ?>
<?php echo $form->textAreaRow($model,'detalle',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>
<?php echo $form->textFieldRow($model,'fecha_creacion',array('class'=>'span5','value'=> $fechaSer, 'readonly'=>'false')); ?>


<div class="form-actions">
	<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Registrar' : 'Actualizar',
		)); ?>
    
    <?php $this->widget('bootstrap.widgets.TbButton',
            array(
            'label' => 'Cancelar',
            'url' => array('admin'),
            'type'=> 'danger',
            'icon'=>'fa fa-remove',
             'htmlOptions' => array(
                'title' => 'Cancelar Registro de Datos del Especialidad ',
                ),
            )
        ); ?>
</div>

<?php $this->endWidget(); ?>
