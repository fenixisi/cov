<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'per-personal-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
	'htmlOptions'=>array('enctype'=>'multipart/form-data'),
)); ?>

	<p class="note">Los campos con <span class="required">*</span> se requieren.</p>

	<?php echo $form->errorSummary($model); ?>
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
<?php echo $form->dropDownListRow($model,'fk_profesion',$model->getListaProfesion(),array('class'=>'span5','prompt'=>'Seleccione Profesion Ocupacion')); ?>
<?php echo $form->textAreaRow($model,'direccion',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>
<?php echo $form->textFieldRow($model,'telefono',array('class'=>'span5')); ?>
<?php echo $form->textFieldRow($model,'celular',array('class'=>'span5')); ?>
<?php echo $form->radioButtonListRow($model,'fk_sexo',$model->getListaSexo(),array('class'=>'span1','labelOptions'=>array('style'=>'text-align: left'))); ?>        
<?php echo $form->radioButtonListRow($model,'fk_estado_civil',$model->getListaEstadoCivil(),array('class'=>'span1','labelOptions'=>array('style'=>'text-align: left'))); ?>                
<?php echo $form->fileFieldRow($model,'picture',array('class'=>'span5')); ?>  
<?php echo $form->radioButtonListRow($model,'fk_estado',$model->getListaEstado(),array('class'=>'span1','labelOptions'=>array('style'=>'text-align: left'))); ?>                
<?php echo $form->textFieldRow($model,'fecha_modificacion',array('class'=>'span5','value'=> $fechaSer, 'readonly'=>'false')); ?>
        
<div class="form-actions">
	<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Registrar' : 'Actualizar',
		)); ?>
    <?php echo CHtml::link('Cancelar',array('admin'),array('class'=>'create-button btn btn-danger','title' => 'Cancelar Actualizacion de Datos del Personal', 'icon' => 'icon- fa fa-list-alt')); ?>
</div>

<?php $this->endWidget(); ?>
