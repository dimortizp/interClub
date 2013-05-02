<?php
/* @var $this UsuarioController */
/* @var $data Usuario */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('K_CEDULA')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->K_CEDULA), array('view', 'id'=>$data->K_CEDULA)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('N_CORREO')); ?>:</b>
	<?php echo CHtml::encode($data->N_CORREO); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('N_NOMBRES')); ?>:</b>
	<?php echo CHtml::encode($data->N_NOMBRES); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('N_APELLIDOS')); ?>:</b>
	<?php echo CHtml::encode($data->N_APELLIDOS); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('I_ROL')); ?>:</b>
	<?php echo CHtml::encode($data->I_ROL); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('O_PASSWORD')); ?>:</b>
	<?php echo CHtml::encode($data->O_PASSWORD); ?>
	<br />


</div>