<?php
/* @var $this SocioController */
/* @var $model Socio */

$this->breadcrumbs=array(
	'Socios'=>array('index'),
	$model->K_CEDULA,
);

$this->menu=array(
	array('label'=>'List Socio', 'url'=>array('index')),
	array('label'=>'Create Socio', 'url'=>array('create')),
	array('label'=>'Update Socio', 'url'=>array('update', 'id'=>$model->K_CEDULA)),
	array('label'=>'Delete Socio', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->K_CEDULA),'confirm'=>'¿Esta seguro que desea eliminar este elemento?')),
	array('label'=>'Manage Socio', 'url'=>array('admin')),
);
?>

<h1>View Socio #<?php echo $model->K_CEDULA; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'K_CEDULA',
		'F_AFILIACION',
		'N_NACIONALIDAD',
		'I_TIPOSOCIO',
		'K_CATEGORIA',
	),
)); ?>
