<?php
/* @var $this SocioController */
/* @var $model Socio */

$this->breadcrumbs=array(
	'Socios'=>array('index'),
	$model->K_CEDULA=>array('view','id'=>$model->K_CEDULA),
	'Update',
);

$this->menu=array(
	array('label'=>'List Socio', 'url'=>array('index')),
	array('label'=>'Create Socio', 'url'=>array('create')),
	array('label'=>'View Socio', 'url'=>array('view', 'id'=>$model->K_CEDULA)),
	array('label'=>'Manage Socio', 'url'=>array('admin')),
);
?>

<h1>Update Socio <?php echo $model->K_CEDULA; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>