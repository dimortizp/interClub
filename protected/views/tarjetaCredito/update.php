<?php
/* @var $this TarjetaCreditoController */
/* @var $model TarjetaCredito */

$this->breadcrumbs=array(
	'Tarjeta Creditos'=>array('index'),
	$model->K_NUMEROTARJETA=>array('view','id'=>$model->K_NUMEROTARJETA),
	'Update',
);

$this->menu=array(
	array('label'=>'List TarjetaCredito', 'url'=>array('index')),
	array('label'=>'Create TarjetaCredito', 'url'=>array('create')),
	array('label'=>'View TarjetaCredito', 'url'=>array('view', 'id'=>$model->K_NUMEROTARJETA)),
	array('label'=>'Manage TarjetaCredito', 'url'=>array('admin')),
);
?>

<h1>Update TarjetaCredito <?php echo $model->K_NUMEROTARJETA; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>