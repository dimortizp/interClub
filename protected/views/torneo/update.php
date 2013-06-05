<?php
/* @var $this TorneoController */
/* @var $model Torneo */

$this->breadcrumbs=array(
	'Torneos'=>array('index'),
	$model->K_IDTORNEO=>array('view','id'=>$model->K_IDTORNEO),
	'Update',
);

$this->menu=array(
	array('label'=>'List Torneo', 'url'=>array('index')),
	array('label'=>'Create Torneo', 'url'=>array('create')),
	array('label'=>'View Torneo', 'url'=>array('view','id'=>$model->K_IDTORNEO)),
	array('label'=>'Manage Torneo', 'url'=>array('admin')),
);
?>

<h1>Update Torneo <?php echo $model->K_IDTORNEO; ?></h1>

<?php 

if($model->I_ESTADOTORNEO=='A'){
echo $this->renderPartial('_form', array('model'=>$model)); }

else if($model->I_ESTADOTORNEO=='J'){
echo $this->renderPartial('_form1', array('model'=>$model)); }

if($model->I_ESTADOTORNEO=='F'){
echo $this->renderPartial('_form2', array('model'=>$model)); }

?>