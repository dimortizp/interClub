<?php
/* @var $this TarjetaCreditoController */
/* @var $model TarjetaCredito */

$this->breadcrumbs=array(
	'Tarjeta Creditos'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List TarjetaCredito', 'url'=>array('index')),
	array('label'=>'Manage TarjetaCredito', 'url'=>array('admin')),
);
?>

<h1>Create TarjetaCredito</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>