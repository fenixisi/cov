<div class="view">

		<b><?php echo CHtml::encode($data->getAttributeLabel('pk_id_especialidad')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->pk_id_especialidad),array('view','id'=>$data->pk_id_especialidad)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('especialidad')); ?>:</b>
	<?php echo CHtml::encode($data->especialidad); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('detalle')); ?>:</b>
	<?php echo CHtml::encode($data->detalle); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha_creacion')); ?>:</b>
	<?php echo CHtml::encode($data->fecha_creacion); ?>
	<br />


</div>