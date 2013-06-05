<?php
/* @var $this PartidaController */
/* @var $model Partida */

$this->breadcrumbs=array(
	'Partidas'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'Lista Partida', 'url'=>array('index')),
	array('label'=>'Administrar Partida', 'url'=>array('admin')),
);
?>

<h1>Crear Partida</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>