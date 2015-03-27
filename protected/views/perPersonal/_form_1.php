<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'per-personal-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
	// 'htmlOptions'=>array('enctype'=>'multipart/form-data'),
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

<?php echo $form->textFieldRow($model,'fk_tipo_identidad',array('class'=>'span5')); ?>
<?php echo $form->textFieldRow($model,'fk_expedido_pais',array('class'=>'span5')); ?>
<?php echo $form->textFieldRow($model,'fk_expedido_ciudad',array('class'=>'span5')); ?>
<?php echo $form->textFieldRow($model,'identidad',array('class'=>'span5')); ?>
<?php echo $form->textFieldRow($model,'nombre_completo',array('class'=>'span5','maxlength'=>40)); ?>
<?php echo $form->textFieldRow($model,'apellido_paterno',array('class'=>'span5','maxlength'=>20)); ?>
<?php echo $form->textFieldRow($model,'apellido_materno',array('class'=>'span5','maxlength'=>20)); ?>
<?php echo $form->datepickerRow($model,'fecha_nacimiento',
								array(
					                'options' => array(
					                    'language' => 'id',
					                    'format' => 'yyyy-mm-dd', 
					                    'weekStart'=> 1,
					                    'autoclose'=>'true',
					                    'keyboardNavigation'=>true,
					                ), 
					            ),
					            array(
					                'prepend' => '<i class="icon-calendar"></i>'
					            )
			);; ?>
<?php echo $form->textFieldRow($model,'fk_profesion',array('class'=>'span5')); ?>
<?php echo $form->textAreaRow($model,'direccion',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>
<?php echo $form->textFieldRow($model,'telefono',array('class'=>'span5')); ?>
<?php echo $form->textFieldRow($model,'celular',array('class'=>'span5')); ?>
<?php echo $form->textFieldRow($model,'fk_sexo',array('class'=>'span5')); ?>
<?php echo $form->textFieldRow($model,'fk_estado_civil',array('class'=>'span5')); ?>
<?php echo $form->textAreaRow($model,'foto',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>
<?php echo $form->textFieldRow($model,'fk_estado',array('class'=>'span5')); ?>
<?php echo $form->textFieldRow($model,'fecha_creacion',array('class'=>'span5')); ?>
<?php echo $form->textFieldRow($model,'fecha_modificacion',array('class'=>'span5')); ?>
<?php echo $form->textFieldRow($model,'fk_usuario_creacion',array('class'=>'span5')); ?>
<?php echo $form->textFieldRow($model,'fk_usuario_modificacion',array('class'=>'span5')); ?>


<div class="form-actions">
	<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Create' : 'Save',
		)); ?>
</div>

<?php $this->endWidget(); ?>
