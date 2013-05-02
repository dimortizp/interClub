<?php
/* @var $this AdministradorController */
/* @var $model Administrador */

$this->breadcrumbs=array(
	'Administradors'=>array('index'),
	$model->K_CEDULA=>array('view','id'=>$model->K_CEDULA),
	'Update',
);

$this->menu=array(
	array('label'=>'List Administrador', 'url'=>array('index')),
	array('label'=>'Create Administrador', 'url'=>array('create')),
	array('label'=>'View Administrador', 'url'=>array('view', 'id'=>$model->K_CEDULA)),
	array('label'=>'Manage Administrador', 'url'=>array('admin')),
);
?>

<h1>Update Administrador <?php echo $model->K_CEDULA; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>