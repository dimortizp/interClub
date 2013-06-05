<?php
/* @var $this PartidaController */
/* @var $model Partida */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'partida-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Los campos con <span class="required">*</span> son requeridos.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'K_IDPARTIDA'); ?>
		<?php echo $form->textField($model,'K_IDPARTIDA'); ?>
		<?php echo $form->error($model,'K_IDPARTIDA'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'I_ESTADOPARTIDA'); ?>
		<?php echo $form->textField($model,'I_ESTADOPARTIDA',array('size'=>1,'maxlength'=>1)); ?>
		<?php echo $form->error($model,'I_ESTADOPARTIDA'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'F_FECHAHORA'); ?>
		<?php echo $form->textField($model,'F_FECHAHORA'); ?>
		<?php echo $form->error($model,'F_FECHAHORA'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'K_IDLUGAR'); ?>
		<?php echo $form->textField($model,'K_IDLUGAR'); ?>
		<?php echo $form->error($model,'K_IDLUGAR'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'K_CEDULAGANADOR'); ?>
		<?php echo $form->textField($model,'K_CEDULAGANADOR'); ?>
		<?php echo $form->error($model,'K_CEDULAGANADOR'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'K_IDRONDA'); ?>
		<?php echo $form->textField($model,'K_IDRONDA'); ?>
		<?php echo $form->error($model,'K_IDRONDA'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->