<?php
/* @var $this TorneoController */
/* @var $model Torneo */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'K_IDTORNEO'); ?>
		<?php echo $form->textField($model,'K_IDTORNEO'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'F_INICIO'); ?>
		<?php echo $form->textField($model,'F_INICIO'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'F_FINAL'); ?>
		<?php echo $form->textField($model,'F_FINAL'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'I_ESTADOTORNEO'); ?>
		<?php echo $form->textField($model,'I_ESTADOTORNEO',array('size'=>1,'maxlength'=>1)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'K_IDCATEGORIA'); ?>
		<?php echo $form->textField($model,'K_IDCATEGORIA'); ?>
	</div>
    
    <div class="row">
		<?php echo $form->label($model,'Q_PARTICIPANTES'); ?>
		<?php echo $form->textField($model,'Q_PARTICIPANTES'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->