<?php
/* @var $this RegularController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Regulars',
);

$this->menu=array(
	array('label'=>'Crear Regular', 'url'=>array('create')),
	array('label'=>'Administrar Regular', 'url'=>array('admin')),
);
?>

<h1>Regulars</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
