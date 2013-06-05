<?php
/* @var $this TarjetaCreditoController */
/* @var $model TarjetaCredito */

$this->breadcrumbs=array(
	'Tarjeta Creditos'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'Lista de Tarjetas de Credito', 'url'=>array('index')),
	array('label'=>'Administrar Tarjetas de Credito', 'url'=>array('admin')),
);
?>

<h1>Crear Tarjeta Credito</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>