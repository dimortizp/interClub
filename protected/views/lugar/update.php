<?php
/* @var $this LugarController */
/* @var $model Lugar */

$this->breadcrumbs=array(
	'Lugars'=>array('index'),
	$model->K_IDLUGAR=>array('view','id'=>$model->K_IDLUGAR),
	'Update',
);

$this->menu=array(
	array('label'=>'List Lugar', 'url'=>array('index')),
	array('label'=>'Create Lugar', 'url'=>array('create')),
	array('label'=>'View Lugar', 'url'=>array('view', 'id'=>$model->K_IDLUGAR)),
	array('label'=>'Manage Lugar', 'url'=>array('admin')),
);
?>

<h1>Actulizar Lugares <?php echo $model->K_IDLUGAR; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>