<?php
/* @var $this TarjetaCreditoController */
/* @var $data TarjetaCredito */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('K_NUMEROTARJETA')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->K_NUMEROTARJETA), array('view', 'id'=>$data->K_NUMEROTARJETA)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('O_CODIGOVERIFICACION')); ?>:</b>
	<?php echo CHtml::encode($data->O_CODIGOVERIFICACION); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('O_CLAVETARJETA')); ?>:</b>
	<?php echo CHtml::encode($data->O_CLAVETARJETA); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('N_NOMBRETARJETA')); ?>:</b>
	<?php echo CHtml::encode($data->N_NOMBRETARJETA); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('F_VENCIMIENTO')); ?>:</b>
	<?php echo CHtml::encode($data->F_VENCIMIENTO); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('I_TIPOTARJETA')); ?>:</b>
	<?php echo CHtml::encode($data->I_TIPOTARJETA); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('K_CEDULA')); ?>:</b>
	<?php echo CHtml::encode($data->K_CEDULA); ?>
	<br />


</div>