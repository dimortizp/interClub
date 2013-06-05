<?php
/* @var $this TorneoController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Torneos',
);

$this->menu=array(
	array('label'=>'Create Torneo', 'url'=>array('create')),
	array('label'=>'Manage Torneo', 'url'=>array('admin')),
);
?>

<h1>Torneos</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
