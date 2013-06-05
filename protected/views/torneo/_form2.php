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
	<p class="note">Este torneo ya ha finalizado (F) no se puede modificar .</p>
	
	
<?php $this->endWidget(); ?>

</div><!-- form -->
