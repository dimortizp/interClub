<?php
/* @var $this TarjetaCreditoController */
/* @var $model TarjetaCredito */

$this->breadcrumbs=array(
	'Tarjeta Creditos'=>array('index'),
	$model->K_NUMEROTARJETA,
);

$this->menu=array(
	array('label'=>'List TarjetaCredito', 'url'=>array('index')),
	array('label'=>'Create TarjetaCredito', 'url'=>array('create')),
	array('label'=>'Update TarjetaCredito', 'url'=>array('update', 'id'=>$model->K_NUMEROTARJETA)),
	array('label'=>'Delete TarjetaCredito', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->K_NUMEROTARJETA),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage TarjetaCredito', 'url'=>array('admin')),
);
?>

<h1>View TarjetaCredito #<?php echo $model->K_NUMEROTARJETA; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'K_NUMEROTARJETA',
		'O_CODIGOVERIFICACION',
		'O_CLAVETARJETA',
		'N_NOMBRETARJETA',
		'F_VENCIMIENTO',
		'I_TIPOTARJETA',
		'K_CEDULA',
	),
)); ?>
