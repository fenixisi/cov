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

<br>
<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'se-sesion-usuario-form',	
	'enableAjaxValidation'=>false,
	// 'htmlOptions'=>array('enctype'=>'multipart/form-data'),
)); ?>
	<p class="note">Los campos con <span class="required">*</span> se requieren.</p>

	<?php echo $form->errorSummary($model); ?>
        
            <?php echo $form->radioButtonListRow($model,'fk_tipo_cuenta',$model->getListaTipo(),array('class'=>'span1','labelOptions'=>array('style'=>'text-align: left'))); ?>
            <?php echo $form->textFieldRow($model,'cuenta',array('class'=>'span5', 'value'=> strtolower($personal->apellido_paterno) ,'maxlength'=>20,'placeholder'=>'Ingrese la cuenta')); ?>
            <?php echo $form->passwordFieldRow($model,'contrasenia',array('class'=>'span5','maxlength'=>20,'placeholder'=>'*****************')); ?>
            <?php echo $form->textFieldRow($model,'fecha_creacion',array('class'=>'span5','value'=> $fechaSer, 'readonly'=>'false')); ?>        

<div class="form-actions">
	<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Registrar' : 'Actualizar',)); ?>
       <?php echo CHtml::link('Cancelar',array('admin'),array('class'=>'create-button btn btn-danger','title' => 'Cancelar Registro de Datos del Personal de acceso al Sistema', 'icon' => 'icon- fa fa-list-alt')); ?>
</div>

<?php $this->endWidget(); ?>
