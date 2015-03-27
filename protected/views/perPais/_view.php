<div class="view">

		<b><?php echo CHtml::encode($data->getAttributeLabel('pk_id_pais')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->pk_id_pais),array('view','id'=>$data->pk_id_pais)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('pais')); ?>:</b>
	<?php echo CHtml::encode($data->pais); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('detalle')); ?>:</b>
	<?php echo CHtml::encode($data->detalle); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha')); ?>:</b>
	<?php echo CHtml::encode($data->fecha); ?>
	<br />


</div>