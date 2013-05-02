<?php
/* @var $this TarjetaCreditoController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Tarjeta Creditos',
);

$this->menu=array(
	array('label'=>'Create TarjetaCredito', 'url'=>array('create')),
	array('label'=>'Manage TarjetaCredito', 'url'=>array('admin')),
);
?>

<h1>Tarjeta Creditos</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
