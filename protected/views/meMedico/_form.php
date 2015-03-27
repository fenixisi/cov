

<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'me-medico-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
	'htmlOptions'=>array('enctype'=>'multipart/form-data'),
)); ?>

	<p class="note">Los campos con <span class="required">*</span> se requieren.</p>

	<?php echo $form->errorSummary($model); ?>
        
   <?php echo $form->labelEx($model,'fk_personal'); ?>     
   <?php   $this->widget('bootstrap.widgets.TbSelect2',
    array(
        'model'     => $model,  // INSTANCE OF MODEL 'User'
        'attribute' => 'fk_personal',   
        'data' => CHtml::listData(PerPersonal::model()->findAll(array('order'=>'nombre_completo ASC')),'pk_id_personal','NombreCompleto'),
        'options' => array(
            'placeholder' => 'Seleccione Personal Medico',
            'width' => '40%',
            )));
 ?> 
        
<?php echo $form->dropDownListRow($model,'fk_titulo',$model->getListaTitulo(),array('class'=>'span5','prompt'=>'Seleccione El Titulo')); ?>		
<?php echo $form->dropDownListRow($model,'fk_universidad',$model->getListaUniversidad(),array('class'=>'span5','prompt'=>'Seleccione la Universidad')); ?>		
        
        <!-- inicio de combobox PAIS por niveles -->	 
        <?php echo $form->dropDownListRow($model,'fk_pais',$model->getListaPais(),
                        array('class'=>'span5',
                            'ajax'=>array(
                              'type'=>'POST',
                              'url'=>CController::createUrl('MeMedico/selecpais'),
                              'update'=>'#'.CHtml::activeId($model,'fk_ciudad'),
                              'beforeSend' => 'function(){
                               $("#MeMedico_fk_ciudad").find("option").remove();                               
                               }',  
                            ),'prompt'=>'Seleccione el Pais'
                        )); ?>		
	<!-- Fin de combobox PAIS por niveles -->	

	<!-- inicio de combobox CIUDAD por niveles -->			
		<?php 
                $lista_tres = array();
                if(isset($model->fk_ciudad)){
                $id_dos = intval($model->fk_pais); 
                $lista_tres = CHtml::listData(PerCiudad::model()->findAll("fk_pais = '$id_dos'"),'pk_id_ciudad','ciudad');
                }
                echo $form->dropDownListRow($model,'fk_ciudad',$lista_tres,array('class'=>'span5','prompt'=>'Seleccione la Ciudad')); ?>		
	<!-- Fin de combobox Ciudad por niveles --> 
        
        
<?php echo $form->datepickerRow($model,'fecha_obtencion',
								array(
					                'options' => array(
					                    'language' => 'es',
					                    'format' => 'yyyy-mm-dd', 
					                    'weekStart'=> 1,
					                    'autoclose'=>'true',
					                    'keyboardNavigation'=>true,
					                ), 
					            ),
					            array(
					                'prepend' => '<i class="icon-calendar"></i>'
					            )
			); ?>
<?php echo $form->textFieldRow($model,'fecha_creacion',array('class'=>'span5','value'=> $fechaSer, 'readonly'=>'false')); ?>


<div class="form-actions">
	<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
                        'icon'=>'fa fa-ok-o',
			'label'=>$model->isNewRecord ? 'Registrar' : 'Actualizar',
		)); ?>
    
<?php $this->widget('bootstrap.widgets.TbButton',
            array(
            'label' => 'Cancelar',
            'url' => array('admin'),
            'type'=> 'danger',
            'icon'=>'fa fa-remove',
             'htmlOptions' => array(
                'title' => 'Cancelar Registro de Datos del Personal Medico ',
                ),
            )
        ); ?>
</div>

<?php $this->endWidget(); ?>
