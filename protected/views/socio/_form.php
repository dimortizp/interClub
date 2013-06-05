<?php
/* @var $this SocioController */
/* @var $model Socio */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'socio-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Los campos con <span class="required">*</span> son requeridos.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'K_CEDULA'); ?>
		<?php echo $form->textField($model,'K_CEDULA'); ?>
		<?php echo $form->error($model,'K_CEDULA'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'F_AFILIACION'); ?>
		<?php echo $form->textField($model,'F_AFILIACION'); ?>
		<?php echo $form->error($model,'F_AFILIACION'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'N_NACIONALIDAD'); ?>
		<?php echo $form->textField($model,'N_NACIONALIDAD',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'N_NACIONALIDAD'); ?>
	</div>
        <?php
                $list["R"]="Regular";
                $list["C"]="Cortecia";
        ?>
	<div class="row">
		<?php echo $form->labelEx($model,'I_TIPOSOCIO'); ?>
      		<?php echo CHtml::dropDownList('Socio[I_TIPOSOCIO]',$model->I_TIPOSOCIO,$list); ?>
		<?php echo $form->error($model,'I_TIPOSOCIO'); ?>
	</div>
        <?php
        $models = Categoria::model()->findAll(array('order' => 'K_IDCATEGORIA'));
        // format models as $key=>$value with listData
        $list = CHtml::listData($models, 'K_IDCATEGORIA', 'N_CATEGORIA');
        ?>
	<div class="row">
		<?php echo $form->labelEx($model,'K_CATEGORIA'); ?>
		<?php echo CHtml::dropDownList('Socio[K_CATEGORIA]', $model->K_CATEGORIA, $list); ?>
		<?php echo $form->error($model,'K_CATEGORIA'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->