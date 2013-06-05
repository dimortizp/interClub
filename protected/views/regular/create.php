<?php
/* @var $this RegularController */
/* @var $model Regular */

$this->breadcrumbs=array(
	'Regulars'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Regular', 'url'=>array('index')),
	array('label'=>'Manage Regular', 'url'=>array('admin')),
);
?>

<h1>Crear Regular</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>