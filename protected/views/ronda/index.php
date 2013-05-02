<?php
/* @var $this RondaController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Rondas',
);

$this->menu=array(
	array('label'=>'Create Ronda', 'url'=>array('create')),
	array('label'=>'Manage Ronda', 'url'=>array('admin')),
);
?>

<h1>Rondas</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
