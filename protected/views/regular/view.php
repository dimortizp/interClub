<?php
/* @var $this RegularController */
/* @var $model Regular */

$this->breadcrumbs=array(
	'Regulars'=>array('index'),
	$model->K_CEDULA,
);

$this->menu=array(
	array('label'=>'List Regular', 'url'=>array('index')),
	array('label'=>'Create Regular', 'url'=>array('create')),
	array('label'=>'Update Regular', 'url'=>array('update', 'id'=>$model->K_CEDULA)),
	array('label'=>'Delete Regular', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->K_CEDULA),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Regular', 'url'=>array('admin')),
);
?>

<h1>View Regular #<?php echo $model->K_CEDULA; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'K_CEDULA',
	),
)); ?>
