<?php
/* @var $this TorneoController */
/* @var $data Torneo */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('K_IDTORNEO')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->K_IDTORNEO), array('view', 'id'=>$data->K_IDTORNEO)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('F_INICIO')); ?>:</b>
	<?php echo CHtml::encode($data->F_INICIO); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('F_FINAL')); ?>:</b>
	<?php echo CHtml::encode($data->F_FINAL); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('I_ESTADOTORNEO')); ?>:</b>
	<?php echo CHtml::encode($data->I_ESTADOTORNEO); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('K_IDCATEGORIA')); ?>:</b>
	<?php echo CHtml::encode($data->K_IDCATEGORIA); ?>
	<br />


</div>