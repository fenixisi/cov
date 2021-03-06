<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

		<?php echo $form->textFieldRow($model,'pk_id_medico',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'fk_personal',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'fk_titulo',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'fk_universidad',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'fk_pais',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'fk_ciudad',array('class'=>'span5')); ?>

		<?php echo $form->datepickerRow($model,'fecha_obtencion',
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

		<?php echo $form->textFieldRow($model,'n_atencion',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'n_atencion_nuevo',array('class'=>'span5')); ?>

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
