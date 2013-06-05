<?php
/* @var $this CategoriaController */
/* @var $model Categoria */

$this->breadcrumbs=array(
	'Categorias'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'Lista Categoria', 'url'=>array('index')),
	array('label'=>'Administrar Categoria', 'url'=>array('admin')),
);
?>

<h1>Crear Categoria</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>