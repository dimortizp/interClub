<?php
/* @var $this SocioController */
/* @var $model Socio */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'socio-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'F_AFILIACION'); ?>
		<?php echo $form->textField($model,'F_AFILIACION'); ?>
		<?php echo $form->error($model,'F_AFILIACION'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'N_NACIONALIDAD'); ?>
		<?php echo $form->textField($model,'N_NACIONALIDAD',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'N_NACIONALIDAD'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'I_TIPOSOCIO'); ?>
		<?php echo $form->textField($model,'I_TIPOSOCIO',array('size'=>1,'maxlength'=>1)); ?>
		<?php echo $form->error($model,'I_TIPOSOCIO'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'K_CATEGORIA'); ?>
		<?php echo $form->textField($model,'K_CATEGORIA'); ?>
		<?php echo $form->error($model,'K_CATEGORIA'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->