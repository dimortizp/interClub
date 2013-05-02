<?php
/* @var $this LugarController */
/* @var $data Lugar */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('K_IDLUGAR')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->K_IDLUGAR), array('view', 'id'=>$data->K_IDLUGAR)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('O_DIRECCION')); ?>:</b>
	<?php echo CHtml::encode($data->O_DIRECCION); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('N_SITIO')); ?>:</b>
	<?php echo CHtml::encode($data->N_SITIO); ?>
	<br />


</div>