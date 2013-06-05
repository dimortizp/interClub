<?php
/* @var $this TorneoController */
/* @var $model Torneo */

$this->breadcrumbs=array(
	'Torneos'=>array('index'),
	$model->K_IDTORNEO,
);

$this->menu=array(
	array('label'=>'Lista de Torneos', 'url'=>array('index')),
	array('label'=>'Crear Torneo', 'url'=>array('create')),
	array('label'=>'Actulizar Torneo', 'url'=>array('update', 'id'=>$model->K_IDTORNEO)),
	array('label'=>'Eliminar Torneo', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->K_IDTORNEO),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Administrar Torneo', 'url'=>array('admin')),
);
?>

<h1>Ver Torneo #<?php echo $model->K_IDTORNEO; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'K_IDTORNEO',
		'F_INICIO',
		'F_FINAL',
		'I_ESTADOTORNEO',
		'K_IDCATEGORIA',
            'Q_PARTICIPANTES',
	),
)); ?>
