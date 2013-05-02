<?php
/* @var $this RondaController */
/* @var $model Ronda */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'K_IDRONDA'); ?>
		<?php echo $form->textField($model,'K_IDRONDA'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Q_NUMERORONDA'); ?>
		<?php echo $form->textField($model,'Q_NUMERORONDA',array('size'=>4,'maxlength'=>4)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'I_ESTADORONDA'); ?>
		<?php echo $form->textField($model,'I_ESTADORONDA',array('size'=>60,'maxlength'=>3752)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'K_IDTORNEO'); ?>
		<?php echo $form->textField($model,'K_IDTORNEO'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->