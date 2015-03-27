<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

		<?php echo $form->textFieldRow($model,'pk_id_usuario',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'fk_tipo_cuenta',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'fk_personal',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'cuenta',array('class'=>'span5','maxlength'=>20)); ?>

		<?php echo $form->textFieldRow($model,'contrasenia',array('class'=>'span5','maxlength'=>20)); ?>

		<?php echo $form->textFieldRow($model,'fk_estado',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'fecha_creacion',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'fecha_modificacion',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'fk_usuario_creacion',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'fk_usuario_modificacion',array('class'=>'span5')); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType' => 'submit',
			'type'=>'primary',
			'label'=>'Search',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
