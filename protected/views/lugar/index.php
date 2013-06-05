<?php
/* @var $this LugarController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Lugars',
);

$this->menu=array(
	array('label'=>'Crear Lugar', 'url'=>array('create')),
	array('label'=>'Administar Lugares', 'url'=>array('admin')),
);
?>

<h1>Lugar</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
