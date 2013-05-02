<?php
/* @var $this RondaController */
/* @var $data Ronda */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('K_IDRONDA')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->K_IDRONDA), array('view', 'id'=>$data->K_IDRONDA)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Q_NUMERORONDA')); ?>:</b>
	<?php echo CHtml::encode($data->Q_NUMERORONDA); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('I_ESTADORONDA')); ?>:</b>
	<?php echo CHtml::encode($data->I_ESTADORONDA); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('K_IDTORNEO')); ?>:</b>
	<?php echo CHtml::encode($data->K_IDTORNEO); ?>
	<br />


</div>