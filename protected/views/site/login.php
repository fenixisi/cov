<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/bootstrap.min.css" />
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/style.css" />


<div id="loginModal" class="modal show" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">                    
                    <h4 class="text-center"><?php echo Yii::app()->name ?></4>                    
                </div>                                  
                <div class="modal-body">
<!--<div class="form">-->                     
<table ALIGN=center>
	<tr>
	<td>
	<div>
	<?php echo CHtml::image(Yii::app()->baseUrl."/images/sesion.png"); ?>
	</div>
	</td>
	<td>
<div class="form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'login-form',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
)); ?>

	<div class=" col-md-4 "> <p class="note">Los campos con <span class="required">*</span> son obligatorios.</p></div> <br/>	
	
	<div class=" col-md-4">			
		<?php echo $form->labelEx($model,'username'); ?>
		<?php echo $form->textField($model,'username',array('placeholder'=>'Ingrese Usuario')); ?>
		<?php echo $form->error($model,'username'); ?>		
	</div>
	
	<div class=" col-md-4">
		<?php echo $form->labelEx($model,'password'); ?>
		<?php echo $form->passwordField($model,'password',array('placeholder'=>'*****************')); ?>
		<?php echo $form->error($model,'password'); ?>
	</div>

	<div class=" col-md-4 rememberMe ">
		<?php echo $form->checkBox($model,'rememberMe'); ?>
		<?php echo $form->label($model,'rememberMe'); ?>
		<?php echo $form->error($model,'rememberMe'); ?>		
	</div>

	<div class="col-md-4	buttons">
		<?php echo CHtml::submitButton('Ingrese'); ?>
	</div>

<?php $this->endWidget(); ?>
</div><!-- form -->
</td>
	
	</tr>
</table>
<!--</div> form -->
</div>
                </div>
            </div>
         </div>
                <script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/scripts.js"></script>