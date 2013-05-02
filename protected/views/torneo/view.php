<?php
/* @var $this TorneoController */
/* @var $model Torneo */

$this->breadcrumbs=array(
	'Torneos'=>array('index'),
	$model->K_IDTORNEO,
);

$this->menu=array(
	array('label'=>'List Torneo', 'url'=>array('index')),
	array('label'=>'Create Torneo', 'url'=>array('create')),
	array('label'=>'Update Torneo', 'url'=>array('update', 'id'=>$model->K_IDTORNEO)),
	array('label'=>'Delete Torneo', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->K_IDTORNEO),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Torneo', 'url'=>array('admin')),
);
?>

<h1>View Torneo #<?php echo $model->K_IDTORNEO; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'K_IDTORNEO',
		'F_INICIO',
		'F_FINAL',
		'I_ESTADOTORNEO',
		'K_IDCATEGORIA',
	),
)); ?>
