<?php
/* @var $this AdministradorController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Administradors',
);

$this->menu=array(
	array('label'=>'Crear Administrador', 'url'=>array('create')),
	array('label'=>'Administar Administrador', 'url'=>array('admin')),
);
?>

<h1>Administrador</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
