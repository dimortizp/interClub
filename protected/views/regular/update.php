<?php
/* @var $this RegularController */
/* @var $model Regular */

$this->breadcrumbs=array(
	'Regulars'=>array('index'),
	$model->K_CEDULA=>array('view','id'=>$model->K_CEDULA),
	'Update',
);

$this->menu=array(
	array('label'=>'List Regular', 'url'=>array('index')),
	array('label'=>'Create Regular', 'url'=>array('create')),
	array('label'=>'View Regular', 'url'=>array('view', 'id'=>$model->K_CEDULA)),
	array('label'=>'Manage Regular', 'url'=>array('admin')),
);
?>

<h1>Update Regular <?php echo $model->K_CEDULA; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>