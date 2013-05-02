<?php
/* @var $this PartidaController */
/* @var $model Partida */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'K_IDPARTIDA'); ?>
		<?php echo $form->textField($model,'K_IDPARTIDA'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'I_ESTADOPARTIDA'); ?>
		<?php echo $form->textField($model,'I_ESTADOPARTIDA',array('size'=>1,'maxlength'=>1)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'F_FECHAHORA'); ?>
		<?php echo $form->textField($model,'F_FECHAHORA'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'K_IDLUGAR'); ?>
		<?php echo $form->textField($model,'K_IDLUGAR'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'K_CEDULAGANADOR'); ?>
		<?php echo $form->textField($model,'K_CEDULAGANADOR'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'K_IDRONDA'); ?>
		<?php echo $form->textField($model,'K_IDRONDA'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->