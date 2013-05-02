<?php
/* @var $this UsuarioController */
/* @var $model Usuario */
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
		<?php echo $form->label($model,'N_CORREO'); ?>
		<?php echo $form->textField($model,'N_CORREO',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'N_NOMBRES'); ?>
		<?php echo $form->textField($model,'N_NOMBRES',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'N_APELLIDOS'); ?>
		<?php echo $form->textField($model,'N_APELLIDOS',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'I_ROL'); ?>
		<?php echo $form->textField($model,'I_ROL',array('size'=>1,'maxlength'=>1)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'O_PASSWORD'); ?>
		<?php echo $form->textField($model,'O_PASSWORD',array('size'=>32,'maxlength'=>32)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->