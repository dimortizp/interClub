<?php
/* @var $this TorneoController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Torneos',
);

$this->menu=array(
	array('label'=>'Crear Torneo', 'url'=>array('create')),
	array('label'=>'Inscribirse en un torneo', 'url'=>array('index1')),
);
?>

<h1>Torneos</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
