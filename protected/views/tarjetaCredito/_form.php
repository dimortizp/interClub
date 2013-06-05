<?php
/* @var $this TarjetaCreditoController */
/* @var $model TarjetaCredito */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'tarjeta-credito-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Los campos con <span class="required">*</span> son requeridos.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'K_NUMEROTARJETA'); ?>
		<?php echo $form->textField($model,'K_NUMEROTARJETA'); ?>
		<?php echo $form->error($model,'K_NUMEROTARJETA'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'O_CODIGOVERIFICACION'); ?>
		<?php echo $form->textField($model,'O_CODIGOVERIFICACION'); ?>
		<?php echo $form->error($model,'O_CODIGOVERIFICACION'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'O_CLAVETARJETA'); ?>
		<?php echo $form->textField($model,'O_CLAVETARJETA',array('size'=>32,'maxlength'=>32)); ?>
		<?php echo $form->error($model,'O_CLAVETARJETA'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'N_NOMBRETARJETA'); ?>
		<?php echo $form->textField($model,'N_NOMBRETARJETA',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'N_NOMBRETARJETA'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'F_VENCIMIENTO'); ?>
		<?php echo $form->textField($model,'F_VENCIMIENTO'); ?>
                <?php                    
                    /*$this->widget('CJuiDateTimePicker',array(
                            'language'=>'',
                            'model'=>$model,                        // Model object
                            'attribute'=>'F_VENCIMIENTO',           // Attribute name
                            'mode'=>'datetime',                     // Use "time","date" or "datetime" (default)
                            'options'=>array(),                     // jquery plugin options
                            'htmlOptions'=>array('readonly'=>true)  // HTML options
                    ));*/ ?>  
		<?php echo $form->error($model,'F_VENCIMIENTO'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'I_TIPOTARJETA'); ?>
		<?php echo $form->textField($model,'I_TIPOTARJETA',array('size'=>1,'maxlength'=>1)); ?>
		<?php echo $form->error($model,'I_TIPOTARJETA'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'K_CEDULA'); ?>
		<?php echo $form->textField($model,'K_CEDULA'); ?>
		<?php echo $form->error($model,'K_CEDULA'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->