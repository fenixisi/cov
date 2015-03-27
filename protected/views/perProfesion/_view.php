<div class="view">

		<b><?php echo CHtml::encode($data->getAttributeLabel('pk_id_profesion')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->pk_id_profesion),array('view','id'=>$data->pk_id_profesion)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('profesion_ocupacion')); ?>:</b>
	<?php echo CHtml::encode($data->profesion_ocupacion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('detalle')); ?>:</b>
	<?php echo CHtml::encode($data->detalle); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha')); ?>:</b>
	<?php echo CHtml::encode($data->fecha); ?>
	<br />


</div>