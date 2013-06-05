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

	<p class="note">Los Campos con  <span class="required">*</span> son requeridos.</p>

	<?php echo $form->errorSummary($model); ?>
        
        <div class="row">
		<?php echo $form->labelEx($model,'K_IDTORNEO'); ?>
		<?php echo $form->textField($model,'K_IDTORNEO'); ?>
		<?php echo $form->error($model,'K_IDTORNEO'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'F_INICIO'); ?>
		<?php echo $form->textField($model,'F_INICIO'); ?><p class="note">Formato DD/MM/AA</p>
		<?php echo $form->error($model,'F_INICIO'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'F_FINAL'); ?>
		<?php echo $form->textField($model,'F_FINAL'); ?><p class="note">Formato DD/MM/AA</p>
		<?php echo $form->error($model,'F_FINAL'); ?>
	</div>
<?php
                $list["A"]="Abierto";
                $list["J"]="Jugandose";
				$list["F"]="Finalizado";
        ?>
        <div class="row">
		<?php echo $form->labelEx($model,'I_ESTADOTORNEO'); ?>
	<?php echo CHtml::dropDownList('Torneo[I_ESTADOTORNEO]',$model->I_ESTADOTORNEO,$list);?>
	
	<?php echo $form->error($model,'I_ESTADOTORNEO'); ?>
	</div>	
        
	<div class="row">
		<?php echo $form->labelEx($model,'K_IDCATEGORIA'); ?>
		<?php echo $form->textField($model,'K_IDCATEGORIA'); ?>
		<?php echo $form->error($model,'K_IDCATEGORIA'); ?>
	</div>
        
        <div class="row">
		<?php echo $form->labelEx($model,'Q_PARTICIPANTES'); ?>
		<?php echo $form->textField($model,'Q_PARTICIPANTES'); ?>
		<?php echo $form->error($model,'Q_PARTICIPANTES'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->