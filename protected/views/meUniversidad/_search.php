<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

		<?php echo $form->textFieldRow($model,'pk_id_universidad',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'universidad',array('class'=>'span5','maxlength'=>45)); ?>

		<?php echo $form->textFieldRow($model,'detalle',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'fecha',array('class'=>'span5')); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType' => 'submit',
			'type'=>'primary',
			'label'=>'Search',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
