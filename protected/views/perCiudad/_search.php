<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

		<?php echo $form->textFieldRow($model,'pk_id_ciudad',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'fk_pais',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'ciudad',array('class'=>'span5','maxlength'=>20)); ?>

		<?php echo $form->textAreaRow($model,'detalle',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

		<?php echo $form->textFieldRow($model,'fecha_creacion',array('class'=>'span5')); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType' => 'submit',
			'type'=>'primary',
			'label'=>'Search',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
