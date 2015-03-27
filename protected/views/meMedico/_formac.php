<div class="row-fluid">
    
    <form class="form-inline">
    <div class="span10">
        <div class="container-fluid"> 
            <div class="span3">
            <div class="col-xs-4">                           
                 <img src="<?php echo Yii::app()->request->baseUrl; ?>/personal_foto/<?php echo $personal->foto;?>" class="img-rounded"/>                                                
           </div>       
           </div>
            
            <div class="span4 alert alert-info"> <label class="col-xs-4  label label-warning">Cedula de Indetodad: </label><?php echo $personal->identidad;?> </div>
            <div class="span4 alert alert-info"> <label class="col-xs-4  label label-warning">Profesion: </label> <?php echo $personal->profesion->profesion_ocupacion;?></div>
            
            <div class="span4 alert alert-info"> <label class="col-xs-4  label label-warning">Nombre: </label> <?php echo $personal->nombre_completo?> </div>            
            <div class="span4 alert alert-info"> <label class="col-xs-4  label label-warning">Apelldio: </label> <?php echo " $personal->apellido_paterno  $personal->apellido_materno";?> </div>                                
    </div>
   </div>
</form> 
</div>


<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'me-medico-form',	
	'enableAjaxValidation'=>false,
	// 'htmlOptions'=>array('enctype'=>'multipart/form-data'),
)); ?>

	<p class="note">Los campos con <span class="required">*</span> se requieren.</p>

	<?php echo $form->errorSummary($model); ?>

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
			);; ?>
<?php echo $form->textFieldRow($model,'fecha_modificacion',array('class'=>'span5','value'=> $fechaSer, 'readonly'=>'false')); ?>

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
                'title' => 'Cancelar Registro de Datos del Personal Medico ',
                ),
            )
        ); ?>
</div>

<?php $this->endWidget(); ?>
