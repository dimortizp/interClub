<?php
/* @var $this CategoriaController */
/* @var $model Categoria */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'categoria-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Los campos con <span class="required">*</span> son requeridos.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'K_IDCATEGORIA'); ?>
		<?php echo $form->textField($model,'K_IDCATEGORIA'); ?>
		<?php echo $form->error($model,'K_IDCATEGORIA'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'N_CATEGORIA'); ?>
		<?php echo $form->textField($model,'N_CATEGORIA',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'N_CATEGORIA'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->