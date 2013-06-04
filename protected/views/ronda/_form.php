<?php
/* @var $this RondaController */
/* @var $model Ronda */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'ronda-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

          <div class="row">
		<?php echo $form->labelEx($model,'K_IDRONDA'); ?>
		<?php echo $form->textField($model,'K_IDRONDA'); ?>
		<?php echo $form->error($model,'K_IDRONDA'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'Q_NUMERORONDA'); ?>
		<?php echo $form->textField($model,'Q_NUMERORONDA',array('size'=>4,'maxlength'=>4)); ?>
		<?php echo $form->error($model,'Q_NUMERORONDA'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'I_ESTADORONDA'); ?>
		<?php echo $form->textField($model,'I_ESTADORONDA',array('size'=>60,'maxlength'=>3752)); ?>
		<?php echo $form->error($model,'I_ESTADORONDA'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'K_IDTORNEO'); ?>
		<?php echo $form->textField($model,'K_IDTORNEO'); ?>
		<?php echo $form->error($model,'K_IDTORNEO'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->