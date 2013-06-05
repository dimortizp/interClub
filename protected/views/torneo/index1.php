<?php
/* @var $this TorneoController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Torneos',
);

$this->menu=array(
	array('label'=>'Crear Torneo', 'url'=>array('create')),
);
?>

<h1>Torneos</h1>
<h1><?php echo Torneo::model()->I_ESTADOTORNEO ;?></h1>

<?php $this->widget('zii.widgets.grid.CGridView', array(
      'dataProvider'=>$model->searchA(),
        'filter'=>$model,
      'columns'=>array(
        'Fecha inicio'=>'F_INICIO',          
        'Fecha final'=>'F_FINAL',          
        'Estado'=>'I_ESTADOTORNEO',          
        'Categoria'=>'K_IDCATEGORIA',          
        'Numero de participantes'=>'Q_PARTICIPANTES',  
        array(    
            'name'=>'I_ESTADOTORNEO',
            'type'=>'raw',
            'value'=>'CHtml::link("Jugar", "http://" . $_SERVER["SERVER_NAME"] . Yii::app()->request->baseUrl . "/ListaEspera")',
        ),
        
          
      ),
)); ?>
