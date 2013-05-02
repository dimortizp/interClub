<?php
/* @var $this RondaController */
/* @var $model Ronda */

$this->breadcrumbs=array(
	'Rondas'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Ronda', 'url'=>array('index')),
	array('label'=>'Manage Ronda', 'url'=>array('admin')),
);
?>

<h1>Create Ronda</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>