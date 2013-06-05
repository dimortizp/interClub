<?php
/* @var $this CategoriaController */
/* @var $model Categoria */

$this->breadcrumbs=array(
	'Categorias'=>array('index'),
	$model->K_IDCATEGORIA,
);

$this->menu=array(
	array('label'=>'Lista Categoria', 'url'=>array('index')),
	array('label'=>'Crear Categoria', 'url'=>array('create')),
	array('label'=>'Actualizar Categoria', 'url'=>array('update', 'id'=>$model->K_IDCATEGORIA)),
	array('label'=>'Eliminar Categoria', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->K_IDCATEGORIA),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Administrar Categoria', 'url'=>array('admin')),
);
?>

<h1> Categoria #<?php echo $model->K_IDCATEGORIA; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'K_IDCATEGORIA',
		'N_CATEGORIA',
	),
)); ?>
