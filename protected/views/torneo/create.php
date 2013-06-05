<?php
/* @var $this TorneoController */
/* @var $model Torneo */

$this->breadcrumbs=array(
	'Torneos'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'Lista de Torneos', 'url'=>array('index')),
	array('label'=>'Administrar Torneos', 'url'=>array('admin')),
);
?>

<h1>Crear Torneo</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>