<?php
/* @var $this CorteciaController */
/* @var $model Cortecia */

$this->breadcrumbs=array(
	'Cortecias'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Cortecia', 'url'=>array('index')),
	array('label'=>'Manage Cortecia', 'url'=>array('admin')),
);
?>

<h1>Create Cortecia</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>