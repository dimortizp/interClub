<?php
/* @var $this PromocionalController */
/* @var $model Promocional */
/* @var $form CActiveForm */
?>

<?php
if ($model->scenario == "update") {

    $this->beginWidget('bootstrap.widgets.TbCarousel', array(
        'items' => array(
            array('image' => ($model->custom_thumbnail) ? Yii::app()->request->baseUrl . '/images/promocional_images/thumbs/' . $model->custom_thumbnail : Yii::app()->request->baseUrl . '/images/_sys/img_noDisponible.png',
                'label' => 'Imagen PRINCIPAL 800 x 600',
                'caption' => 'Utilizada en el menu de seleccion.',
                'imageOptions' => array('style' => 'height:200px; margin-left: auto;   margin-right: auto;'),
            ),
            array('image' => ($model->custom_background) ? Yii::app()->request->baseUrl . '/images/promocional_images/' . $model->custom_background : Yii::app()->request->baseUrl . '/images/_sys/img_noDisponible.png',
                'imageOptions' => array('style' => 'height:200px; margin-left: auto;   margin-right: auto;'),
                'caption' => 'Personalizada. Utilizada en el fondo de la pantalla.',
                'label' => 'Imagen 1024 x 768',
            ),
            array('image' => ($model->custom_tercera) ? Yii::app()->request->baseUrl . '/images/promocional_images/' . $model->custom_tercera : Yii::app()->request->baseUrl . '/images/_sys/img_noDisponible.png',
                'label' => 'Imagen 1280 x 800',
                'caption' => 'Utilizada en el menu de seleccion.',
                'imageOptions' => array('style' => 'height:200px; margin-left: auto;   margin-right: auto;'),
            ),
        ),
        'htmlOptions' => array('style' => 'text-align:center;'),
    ));

    $this->endWidget();
}
?>

<?php
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id' => 'promocional-form',
    'enableAjaxValidation' => false,
    'htmlOptions' => array('enctype' => 'multipart/form-data'),
        ));
?>

<p class="help-block">Campos marcados con <span class="required">*</span> son requeridos.</p>

<?php echo $form->errorSummary($model); ?>

<?php echo $form->textFieldRow($model, 'titulo', array('class' => 'span5', 'maxlength' => 150)); ?>

<?php echo $form->textFieldRow($model, 'url', array('class' => 'span5', 'maxlength' => 150)); ?>

<?php echo $form->fileFieldRow($model, 'custom_background', array('class' => 'span5', 'maxlength' => 50)); ?>

<?php echo $form->fileFieldRow($model, 'custom_thumbnail', array('class' => 'span5', 'maxlength' => 50)); ?>

<?php echo $form->fileFieldRow($model, 'custom_tercera', array('class' => 'span5', 'maxlength' => 50)); ?>

<?php echo $form->fileFieldRow($model, 'zip_background', array('class' => 'span5', 'maxlength' => 50)); ?>

<?php echo $form->fileFieldRow($model, 'zip_thumbnail', array('class' => 'span5', 'maxlength' => 50)); ?>

<?php echo $form->fileFieldRow($model, 'zip_tercera', array('class' => 'span5', 'maxlength' => 50)); ?>



<?php
//              echo $form->dropDownListRow($model, 'paquetes_idPaquete', $model->getPaquetes(),array('prompt' => 'Seleccione Paquete', 'class'=>'span5'));
?>

<?php
//              echo $form->dropDownListRow($model, 'destinos_idDestino', $model->getDestinosPromocionales(),array('prompt' => 'Seleccione Categoria', 'class'=>'span5'));
?>
<div class="form-actions">
    <?php
    $this->widget('bootstrap.widgets.TbButton', array(
        'buttonType' => 'submit',
        'type' => 'primary',
        'label' => $model->isNewRecord ? 'Crear nueva promo' : 'Actualizar',
    ));
    ?>
</div>

<?php $this->endWidget(); ?>