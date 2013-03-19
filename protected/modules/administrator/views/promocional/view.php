<?php
/* @var $this PromocionalController */
/* @var $model Promocional */

$this->breadcrumbs=array(
	'Promociones'=>array('index'),
	$model->titulo,
);

$this->menu=array(
	array('label'=>'OPERACIONES'),
	array('label'=>'Crear Promocional', 'icon'=>'plus','url'=>array('create')),
	array('label'=>'Administración', 'icon'=>'book','url'=>array('index')),
        array('label'=>'Editar', 'icon'=>'pencil','url'=>array('update','id'=>$model->idPromocional)),
);
?>

<h1>Promoción: <?php echo $model->titulo; ?></h1>

<?php

 $this->beginWidget('bootstrap.widgets.TbCarousel', array(
                'items'=>array(
                      array('image'=>($model->custom_thumbnail)?Yii::app()->request->baseUrl.'/images/promocional_images/thumbs/'.$model->custom_thumbnail:Yii::app()->request->baseUrl.'/images/_sys/img_noDisponible.png',
                          'label'=>'Imagen PRINCIPAL 800 x 600',
                          'caption'=>'Utilizada en el menu de seleccion.',
                          'imageOptions'=>array('style'=>'height:200px; margin-left: auto;   margin-right: auto;'),

                          ),
                    array('image'=>($model->custom_background)?Yii::app()->request->baseUrl.'/images/promocional_images/'.$model->custom_background:Yii::app()->request->baseUrl.'/images/_sys/img_noDisponible.png',
                          'imageOptions'=>array('style'=>'height:200px; margin-left: auto;   margin-right: auto;'),
                          'caption'=>'Personalizada. Utilizada en el fondo de la pantalla.',
                          'label'=>'Imagen 1024 x 768',


                          ),
                  
                    array('image'=>($model->custom_tercera)?Yii::app()->request->baseUrl.'/images/promocional_images/'.$model->custom_tercera:Yii::app()->request->baseUrl.'/images/_sys/img_noDisponible.png',
                          'label'=>'Imagen 1280 x 800',
                          'caption'=>'Utilizada en el menu de seleccion.',
                          'imageOptions'=>array('style'=>'height:200px; margin-left: auto;   margin-right: auto;'),

                          ),
                    ),
                 'htmlOptions'=>array('style'=>'text-align:center;'),

            ));

        $this->endWidget();
?>


<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
//		'idPromocional',
		'titulo',
//		'custom_background',
//		'custom_thumbnail',
//		'paquetes_idPaquete',
//                'paquetes_idPaquete'=>array(
//                    'label'=>'Paquete relacionado con la promocion',
//
//                    'value'=>($model->paquetesIdPaquete)?$model->paquetesIdPaquete->nombre:'No asignado',
//                    ),
                 'url',
//		'destinos_idDestino',
//                'destinos_idDestino'=>array(
//                    'label'=>'Enlazado a',
//
//                    'value'=>($model->destinosIdDestino)?$model->destinosIdDestino->nombre:'No asignado',
//                    ),
	),
)); ?>
