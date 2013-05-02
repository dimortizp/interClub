<?php
/* @var $this RondaController */
/* @var $model Ronda */

$this->breadcrumbs=array(
	'Rondas'=>array('index'),
	$model->K_IDRONDA=>array('view','id'=>$model->K_IDRONDA),
	'Update',
);

$this->menu=array(
	array('label'=>'List Ronda', 'url'=>array('index')),
	array('label'=>'Create Ronda', 'url'=>array('create')),
	array('label'=>'View Ronda', 'url'=>array('view', 'id'=>$model->K_IDRONDA)),
	array('label'=>'Manage Ronda', 'url'=>array('admin')),
);
?>

<h1>Update Ronda <?php echo $model->K_IDRONDA; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>