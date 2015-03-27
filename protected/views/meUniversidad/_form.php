<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'me-universidad-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
	// 'htmlOptions'=>array('enctype'=>'multipart/form-data'),
)); ?>

	<p class="note">Los campos con <span class="required">*</span> se requieren.</p>

	<?php echo $form->errorSummary($model); ?>

<?php echo $form->textFieldRow($model,'universidad',array('class'=>'span5','maxlength'=>45)); ?>
<?php echo $form->textAreaRow($model,'detalle',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>
<?php echo $form->textFieldRow($model,'fecha',array('class'=>'span5','value'=> $fechaSer, 'readonly'=>'false')); ?>


<div class="form-actions">
	<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Registrar' : 'Actualizar',
		)); ?>
        <?php echo CHtml::link('Cancelar',array('admin'),array('class'=>'create-button btn btn-danger','title' => 'Cancelar Registro de Datos de Universidad', 'icon' => 'icon- fa fa-list-alt')); ?>
</div>

<?php $this->endWidget(); ?>
