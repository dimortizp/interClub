<?php
/* @var $this SocioController */
/* @var $model Socio */

$this->breadcrumbs=array(
	'Socios'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'Lista de Socios', 'url'=>array('index')),
	array('label'=>'Administrar Socio', 'url'=>array('admin')),
);
?>

<h1>Crear Socio</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>