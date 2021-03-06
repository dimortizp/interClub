<?php
/* @var $this UsuarioController */
/* @var $model Usuario */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'usuario-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'K_CEDULA'); ?>
		<?php echo $form->textField($model,'K_CEDULA',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'K_CEDULA'); ?>
	</div>
        
        <div class="row">
		<?php echo $form->labelEx($model,'N_CORREO'); ?>
		<?php echo $form->textField($model,'N_CORREO',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'N_CORREO'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'N_NOMBRES'); ?>
		<?php echo $form->textField($model,'N_NOMBRES',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'N_NOMBRES'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'N_APELLIDOS'); ?>
		<?php echo $form->textField($model,'N_APELLIDOS',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'N_APELLIDOS'); ?>
	</div>

        <?php
                $list["A"]="Administrador";
                $list["S"]="Socio";
        ?>
	<div class="row">
		<?php echo $form->labelEx($model,'I_ROL'); ?>
		<?php echo CHtml::dropDownList('Usuario[I_ROL]',$model->I_ROL,$list); ?>
		<?php echo $form->error($model,'I_ROL'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'O_PASSWORD'); ?>
		<?php echo $form->textField($model,'O_PASSWORD',array('size'=>32,'maxlength'=>32)); ?>
		<?php echo $form->error($model,'O_PASSWORD'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->