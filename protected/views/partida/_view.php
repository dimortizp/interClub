<?php
/* @var $this PartidaController */
/* @var $data Partida */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('K_IDPARTIDA')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->K_IDPARTIDA), array('view', 'id'=>$data->K_IDPARTIDA)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('I_ESTADOPARTIDA')); ?>:</b>
	<?php echo CHtml::encode($data->I_ESTADOPARTIDA); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('F_FECHAHORA')); ?>:</b>
	<?php echo CHtml::encode($data->F_FECHAHORA); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('K_IDLUGAR')); ?>:</b>
	<?php echo CHtml::encode($data->K_IDLUGAR); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('K_CEDULAGANADOR')); ?>:</b>
	<?php echo CHtml::encode($data->K_CEDULAGANADOR); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('K_IDRONDA')); ?>:</b>
	<?php echo CHtml::encode($data->K_IDRONDA); ?>
	<br />


</div>