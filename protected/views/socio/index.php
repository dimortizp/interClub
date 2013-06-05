<?php
/* @var $this SocioController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Socios',
);

$this->menu=array(
	array('label'=>'Crear Socio', 'url'=>array('create')),
	array('label'=>'Administrar Socio', 'url'=>array('admin')),
);
?>

<h1>Socios</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
