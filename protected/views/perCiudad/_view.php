<div class="view">

		<b><?php echo CHtml::encode($data->getAttributeLabel('pk_id_ciudad')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->pk_id_ciudad),array('view','id'=>$data->pk_id_ciudad)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fk_pais')); ?>:</b>
	<?php echo CHtml::encode($data->fk_pais); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ciudad')); ?>:</b>
	<?php echo CHtml::encode($data->ciudad); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('detalle')); ?>:</b>
	<?php echo CHtml::encode($data->detalle); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha_creacion')); ?>:</b>
	<?php echo CHtml::encode($data->fecha_creacion); ?>
	<br />


</div>