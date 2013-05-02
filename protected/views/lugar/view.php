<?php
/* @var $this LugarController */
/* @var $model Lugar */

$this->breadcrumbs=array(
	'Lugars'=>array('index'),
	$model->K_IDLUGAR,
);

$this->menu=array(
	array('label'=>'List Lugar', 'url'=>array('index')),
	array('label'=>'Create Lugar', 'url'=>array('create')),
	array('label'=>'Update Lugar', 'url'=>array('update', 'id'=>$model->K_IDLUGAR)),
	array('label'=>'Delete Lugar', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->K_IDLUGAR),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Lugar', 'url'=>array('admin')),
);
?>

<h1>View Lugar #<?php echo $model->K_IDLUGAR; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'K_IDLUGAR',
		'O_DIRECCION',
		'N_SITIO',
	),
)); ?>
