<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'se-sesion-usuario-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
	// 'htmlOptions'=>array('enctype'=>'multipart/form-data'),
)); ?>

	<p class="note">Los campos con <span class="required">*</span> se requieren.</p>

	<?php echo $form->errorSummary($model); ?>

<?php echo $form->radioButtonListRow($model,'fk_tipo_cuenta',$model->getListaTipo(),array('class'=>'span1','labelOptions'=>array('style'=>'text-align: left'))); ?>
<?php echo $form->passwordFieldRow($model,'contrasenia',array('class'=>'span5','maxlength'=>20)); ?>
<?php echo $form->radioButtonListRow($model,'fk_estado',$model->getListaEstado(),array('class'=>'span1','labelOptions'=>array('style'=>'text-align: left'))); ?>        


<div class="form-actions">
	<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Registrar' : 'Actualizar',
		)); ?>
        <?php echo CHtml::link('Cancelar',array('admin'),array('class'=>'create-button btn btn-danger','title' => 'Cancelar Actualizacion de Datos del Personal de acceso al Sistema', 'icon' => 'icon- fa fa-list-alt')); ?>
</div>

<?php $this->endWidget(); ?>
