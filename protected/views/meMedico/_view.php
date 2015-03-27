<div class="view">

		<b><?php echo CHtml::encode($data->getAttributeLabel('pk_id_medico')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->pk_id_medico),array('view','id'=>$data->pk_id_medico)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fk_personal')); ?>:</b>
	<?php echo CHtml::encode($data->fk_personal); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fk_titulo')); ?>:</b>
	<?php echo CHtml::encode($data->fk_titulo); ?>
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

	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha_obtencion')); ?>:</b>
	<?php echo CHtml::encode($data->fecha_obtencion); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('n_atencion')); ?>:</b>
	<?php echo CHtml::encode($data->n_atencion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('n_atencion_nuevo')); ?>:</b>
	<?php echo CHtml::encode($data->n_atencion_nuevo); ?>
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