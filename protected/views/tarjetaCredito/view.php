<?php
/* @var $this TarjetaCreditoController */
/* @var $model TarjetaCredito */

$this->breadcrumbs=array(
	'Tarjeta Creditos'=>array('index'),
	$model->K_NUMEROTARJETA,
);

$this->menu=array(
	array('label'=>'Lista TarjetaCredito', 'url'=>array('index')),
	array('label'=>'Crear TarjetaCredito', 'url'=>array('create')),
	array('label'=>'Actualizar TarjetaCredito', 'url'=>array('update', 'id'=>$model->K_NUMEROTARJETA)),
	array('label'=>'Eliminar TarjetaCredito', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->K_NUMEROTARJETA),'confirm'=>'¿Esta seguro que desea eliminar este elemento?')),
	array('label'=>'Administrar TarjetaCredito', 'url'=>array('admin')),
);
?>

<h1>Tarjeta de credito # <?php echo $model->K_NUMEROTARJETA; ?></h1>

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
