<?php
/* @var $this LugarController */
/* @var $model Lugar */

$this->breadcrumbs=array(
	'Lugars'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'Ver Lugares', 'url'=>array('index')),
	array('label'=>'Administrar Lugares', 'url'=>array('admin')),
);
?>

<h1>Crear Lugar</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>