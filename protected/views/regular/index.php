<?php
/* @var $this RegularController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Regulars',
);

$this->menu=array(
	array('label'=>'Create Regular', 'url'=>array('create')),
	array('label'=>'Manage Regular', 'url'=>array('admin')),
);
?>

<h1>Regulars</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
