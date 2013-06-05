<?php
/* @var $this AdministradorController */
/* @var $model Administrador */

$this->breadcrumbs=array(
	'Administradors'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'Lista de Administradores', 'url'=>array('index')),
	array('label'=>'Administrar Administradores', 'url'=>array('admin')),
);
?>

<h1>Crear Administrador</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>