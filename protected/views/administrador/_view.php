<?php
/* @var $this AdministradorController */
/* @var $data Administrador */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('K_CEDULA')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->K_CEDULA), array('view', 'id'=>$data->K_CEDULA)); ?>
	<br />


</div>