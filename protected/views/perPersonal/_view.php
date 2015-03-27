<div class="view">

		<b><?php echo CHtml::encode($data->getAttributeLabel('pk_id_personal')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->pk_id_personal),array('view','id'=>$data->pk_id_personal)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fk_tipo_identidad')); ?>:</b>
	<?php echo CHtml::encode($data->fk_tipo_identidad); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fk_expedido_pais')); ?>:</b>
	<?php echo CHtml::encode($data->fk_expedido_pais); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fk_expedido_ciudad')); ?>:</b>
	<?php echo CHtml::encode($data->fk_expedido_ciudad); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('identidad')); ?>:</b>
	<?php echo CHtml::encode($data->identidad); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nombre_completo')); ?>:</b>
	<?php echo CHtml::encode($data->nombre_completo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('apellido_paterno')); ?>:</b>
	<?php echo CHtml::encode($data->apellido_paterno); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('apellido_materno')); ?>:</b>
	<?php echo CHtml::encode($data->apellido_materno); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha_nacimiento')); ?>:</b>
	<?php echo CHtml::encode($data->fecha_nacimiento); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fk_profesion')); ?>:</b>
	<?php echo CHtml::encode($data->fk_profesion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('direccion')); ?>:</b>
	<?php echo CHtml::encode($data->direccion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('telefono')); ?>:</b>
	<?php echo CHtml::encode($data->telefono); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('celular')); ?>:</b>
	<?php echo CHtml::encode($data->celular); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fk_sexo')); ?>:</b>
	<?php echo CHtml::encode($data->fk_sexo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fk_estado_civil')); ?>:</b>
	<?php echo CHtml::encode($data->fk_estado_civil); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('foto')); ?>:</b>
	<?php echo CHtml::encode($data->foto); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fk_estado')); ?>:</b>
	<?php echo CHtml::encode($data->fk_estado); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha_creacion')); ?>:</b>
	<?php echo CHtml::encode($data->fecha_creacion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha_modificacion')); ?>:</b>
	<?php echo CHtml::encode($data->fecha_modificacion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fk_usuario_creacion')); ?>:</b>
	<?php echo CHtml::encode($data->fk_usuario_creacion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fk_usuario_modificacion')); ?>:</b>
	<?php echo CHtml::encode($data->fk_usuario_modificacion); ?>
	<br />

	*/ ?>

</div>