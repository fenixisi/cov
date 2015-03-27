<div class="view">

		<b><?php echo CHtml::encode($data->getAttributeLabel('pk_id_titulo')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->pk_id_titulo),array('view','id'=>$data->pk_id_titulo)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('titulo')); ?>:</b>
	<?php echo CHtml::encode($data->titulo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('detalle')); ?>:</b>
	<?php echo CHtml::encode($data->detalle); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha')); ?>:</b>
	<?php echo CHtml::encode($data->fecha); ?>
	<br />


</div>