<?php
/* @var $this SocioController */
/* @var $model Socio */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'K_CEDULA'); ?>
		<?php echo $form->textField($model,'K_CEDULA'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'F_AFILIACION'); ?>
		<?php echo $form->textField($model,'F_AFILIACION'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'N_NACIONALIDAD'); ?>
		<?php echo $form->textField($model,'N_NACIONALIDAD',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'I_TIPOSOCIO'); ?>
		<?php echo $form->textField($model,'I_TIPOSOCIO',array('size'=>1,'maxlength'=>1)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'K_CATEGORIA'); ?>
		<?php echo $form->textField($model,'K_CATEGORIA'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->