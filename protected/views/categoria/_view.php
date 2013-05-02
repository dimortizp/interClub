<?php
/* @var $this CategoriaController */
/* @var $data Categoria */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('K_IDCATEGORIA')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->K_IDCATEGORIA), array('view', 'id'=>$data->K_IDCATEGORIA)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('N_CATEGORIA')); ?>:</b>
	<?php echo CHtml::encode($data->N_CATEGORIA); ?>
	<br />


</div>