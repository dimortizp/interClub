<?php
/* @var $this LugarController */
/* @var $model Lugar */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'K_IDLUGAR'); ?>
		<?php echo $form->textField($model,'K_IDLUGAR'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'O_DIRECCION'); ?>
		<?php echo $form->textField($model,'O_DIRECCION',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'N_SITIO'); ?>
		<?php echo $form->textField($model,'N_SITIO',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->