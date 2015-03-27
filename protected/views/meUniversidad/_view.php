<div class="view">

		<b><?php echo CHtml::encode($data->getAttributeLabel('pk_id_universidad')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->pk_id_universidad),array('view','id'=>$data->pk_id_universidad)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('universidad')); ?>:</b>
	<?php echo CHtml::encode($data->universidad); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('detalle')); ?>:</b>
	<?php echo CHtml::encode($data->detalle); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha')); ?>:</b>
	<?php echo CHtml::encode($data->fecha); ?>
	<br />


</div>