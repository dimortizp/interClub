<?php
/* @var $this CorteciaController */
/* @var $model Cortecia */

$this->breadcrumbs=array(
	'Cortecias'=>array('index'),
	$model->K_CEDULA,
);

$this->menu=array(
	array('label'=>'List Cortecia', 'url'=>array('index')),
	array('label'=>'Create Cortecia', 'url'=>array('create')),
	array('label'=>'Update Cortecia', 'url'=>array('update', 'id'=>$model->K_CEDULA)),
	array('label'=>'Delete Cortecia', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->K_CEDULA),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Cortecia', 'url'=>array('admin')),
);
?>

<h1>View Cortecia #<?php echo $model->K_CEDULA; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'K_CEDULA',
	),
)); ?>
