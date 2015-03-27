<div class="view">

		<b><?php echo CHtml::encode($data->getAttributeLabel('pk_id_medico_especialidad')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->pk_id_medico_especialidad),array('view','id'=>$data->pk_id_medico_especialidad)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('pk_medico')); ?>:</b>
	<?php echo CHtml::encode($data->pk_medico); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('pk_especialidad')); ?>:</b>
	<?php echo CHtml::encode($data->pk_especialidad); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fk_universidad')); ?>:</b>
	<?php echo CHtml::encode($data->fk_universidad); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fk_pais')); ?>:</b>
	<?php echo CHtml::encode($data->fk_pais); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fk_ciudad')); ?>:</b>
	<?php echo CHtml::encode($data->fk_ciudad); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('anio_obtencion')); ?>:</b>
	<?php echo CHtml::encode($data->anio_obtencion); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('detalle')); ?>:</b>
	<?php echo CHtml::encode($data->detalle); ?>
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