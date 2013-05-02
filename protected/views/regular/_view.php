<?php
/* @var $this RegularController */
/* @var $data Regular */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('K_CEDULA')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->K_CEDULA), array('view', 'id'=>$data->K_CEDULA)); ?>
	<br />


</div>