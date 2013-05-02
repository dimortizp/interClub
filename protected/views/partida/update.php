<?php
/* @var $this PartidaController */
/* @var $model Partida */

$this->breadcrumbs=array(
	'Partidas'=>array('index'),
	$model->K_IDPARTIDA=>array('view','id'=>$model->K_IDPARTIDA),
	'Update',
);

$this->menu=array(
	array('label'=>'List Partida', 'url'=>array('index')),
	array('label'=>'Create Partida', 'url'=>array('create')),
	array('label'=>'View Partida', 'url'=>array('view', 'id'=>$model->K_IDPARTIDA)),
	array('label'=>'Manage Partida', 'url'=>array('admin')),
);
?>

<h1>Update Partida <?php echo $model->K_IDPARTIDA; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>