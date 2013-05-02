<?php
/* @var $this CorteciaController */
/* @var $model Cortecia */

$this->breadcrumbs=array(
	'Cortecias'=>array('index'),
	$model->K_CEDULA=>array('view','id'=>$model->K_CEDULA),
	'Update',
);

$this->menu=array(
	array('label'=>'List Cortecia', 'url'=>array('index')),
	array('label'=>'Create Cortecia', 'url'=>array('create')),
	array('label'=>'View Cortecia', 'url'=>array('view', 'id'=>$model->K_CEDULA)),
	array('label'=>'Manage Cortecia', 'url'=>array('admin')),
);
?>

<h1>Update Cortecia <?php echo $model->K_CEDULA; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>