<?php
/* @var $this RondaController */
/* @var $model Ronda */

$this->breadcrumbs=array(
	'Rondas'=>array('index'),
	$model->K_IDRONDA,
);

$this->menu=array(
	array('label'=>'List Ronda', 'url'=>array('index')),
	array('label'=>'Create Ronda', 'url'=>array('create')),
	array('label'=>'Update Ronda', 'url'=>array('update', 'id'=>$model->K_IDRONDA)),
	array('label'=>'Delete Ronda', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->K_IDRONDA),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Ronda', 'url'=>array('admin')),
);
?>

<h1>View Ronda #<?php echo $model->K_IDRONDA; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'K_IDRONDA',
		'Q_NUMERORONDA',
		'I_ESTADORONDA',
		'K_IDTORNEO',
	),
)); ?>
