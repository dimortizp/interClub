<?php
/* @var $this CorteciaController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Cortecias',
);

$this->menu=array(
	array('label'=>'Create Cortecia', 'url'=>array('create')),
	array('label'=>'Manage Cortecia', 'url'=>array('admin')),
);
?>

<h1>Cortecias</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
