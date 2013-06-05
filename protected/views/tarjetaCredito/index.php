<?php
/* @var $this TarjetaCreditoController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Tarjeta Credito',
);

$this->menu=array(
	array('label'=>'Crear Tarjeta Credito', 'url'=>array('create')),
	array('label'=>'ADministrar Tarjeta Credito', 'url'=>array('admin')),
);
?>

<h1>Tarjeta Credito</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
