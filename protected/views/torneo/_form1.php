<?php
/* @var $this TorneoController */
/* @var $model Torneo */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'torneo-form',
	'enableAjaxValidation'=>false,
)); ?>
	<p class="note">Podra alargar la fecha final o podra modificar el estado a torneo finalizado (F).</p>
	

	<?php echo $form->errorSummary($model); ?>
        
        <div class="row">
		<?php echo $form->labelEx($model,'F_FINAL'); ?>
		<?php echo $form->textField($model,'F_FINAL'); ?><p class="note">Formato DD/MM/AAAA</p>
		<?php echo $form->error($model,'F_FINAL'); ?>
	</div>
     
        <div class="row">
		<?php echo $form->labelEx($model,'I_ESTADOTORNEO'); ?>
		<?php echo $form->textField($model,'I_ESTADOTORNEO',array('size'=>1,'maxlength'=>1)); ?>
		<?php echo $form->error($model,'I_ESTADOTORNEO'); ?>
	</div>
        
	
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->