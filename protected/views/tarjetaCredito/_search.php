<?php
/* @var $this TarjetaCreditoController */
/* @var $model TarjetaCredito */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'K_NUMEROTARJETA'); ?>
		<?php echo $form->textField($model,'K_NUMEROTARJETA'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'O_CODIGOVERIFICACION'); ?>
		<?php echo $form->textField($model,'O_CODIGOVERIFICACION'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'O_CLAVETARJETA'); ?>
		<?php echo $form->textField($model,'O_CLAVETARJETA',array('size'=>32,'maxlength'=>32)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'N_NOMBRETARJETA'); ?>
		<?php echo $form->textField($model,'N_NOMBRETARJETA',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'F_VENCIMIENTO'); ?>
		<?php echo $form->textField($model,'F_VENCIMIENTO'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'I_TIPOTARJETA'); ?>
		<?php echo $form->textField($model,'I_TIPOTARJETA',array('size'=>1,'maxlength'=>1)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'K_CEDULA'); ?>
		<?php echo $form->textField($model,'K_CEDULA'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->