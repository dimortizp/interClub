<?php
/* @var $this PartidaController */
/* @var $model Partida */

$this->breadcrumbs=array(
	'Partidas'=>array('index'),
	$model->K_IDPARTIDA,
);

$this->menu=array(
	array('label'=>'List Partida', 'url'=>array('index')),
	array('label'=>'Create Partida', 'url'=>array('create')),
	array('label'=>'Update Partida', 'url'=>array('update', 'id'=>$model->K_IDPARTIDA)),
	array('label'=>'Delete Partida', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->K_IDPARTIDA),'confirm'=>'¿Esta seguro que desea eliminar este elemento?')),
	array('label'=>'Manage Partida', 'url'=>array('admin')),
);
?>

<h1>View Partida #<?php echo $model->K_IDPARTIDA; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'K_IDPARTIDA',
		'I_ESTADOPARTIDA',
		'F_FECHAHORA',
		'K_IDLUGAR',
		'K_CEDULAGANADOR',
		'K_IDRONDA',
	),
)); ?>
