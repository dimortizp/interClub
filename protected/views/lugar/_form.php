<?php
/* @var $this LugarController */
/* @var $model Lugar */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'lugar-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Campos con <span class="required">*</span> son requeridos.</p>

	<?php echo $form->errorSummary($model); ?>

        
        <div class="row">
		<?php echo $form->labelEx($model,'K_IDLUGAR'); ?>
		<?php echo $form->textField($model,'K_IDLUGAR'); ?>
		<?php echo $form->error($model,'K_IDLUGAR'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'O_DIRECCION'); ?>
		<?php echo $form->textField($model,'O_DIRECCION',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'O_DIRECCION'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'N_SITIO'); ?>
		<?php echo $form->textField($model,'N_SITIO',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'N_SITIO'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->