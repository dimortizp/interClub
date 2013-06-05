<?php
/* @var $this LugarController */
/* @var $model Lugar */

$this->breadcrumbs=array(
	'Lugars'=>array('index'),
	$model->K_IDLUGAR,
);

$this->menu=array(
	array('label'=>'Lista Lugar', 'url'=>array('index')),
	array('label'=>'Crear Lugar', 'url'=>array('create')),
	array('label'=>'Actulizar Lugar', 'url'=>array('update', 'id'=>$model->K_IDLUGAR)),
	array('label'=>'Eliminar Lugar', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->K_IDLUGAR),'confirm'=>'¿Esta seguro que desea eliminar este elemento?')),
	array('label'=>'Administrar Lugar', 'url'=>array('admin')),
);
?>

<h1>Lugar # <?php echo $model->K_IDLUGAR; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'K_IDLUGAR',
		'O_DIRECCION',
		'N_SITIO',
	),
)); ?>
