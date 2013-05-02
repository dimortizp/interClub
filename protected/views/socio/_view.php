<?php
/* @var $this SocioController */
/* @var $data Socio */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('K_CEDULA')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->K_CEDULA), array('view', 'id'=>$data->K_CEDULA)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('F_AFILIACION')); ?>:</b>
	<?php echo CHtml::encode($data->F_AFILIACION); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('N_NACIONALIDAD')); ?>:</b>
	<?php echo CHtml::encode($data->N_NACIONALIDAD); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('I_TIPOSOCIO')); ?>:</b>
	<?php echo CHtml::encode($data->I_TIPOSOCIO); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('K_CATEGORIA')); ?>:</b>
	<?php echo CHtml::encode($data->K_CATEGORIA); ?>
	<br />


</div>