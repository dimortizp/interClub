<?php 


$form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'imagen-paquete-form',
	'enableAjaxValidation'=>false,
        'htmlOptions' => array('enctype' => 'multipart/form-data'),
)); 

?>

<?php

 $this->beginWidget('bootstrap.widgets.TbCarousel', array(
                'items'=>array(
                    array('image'=>($imagen->archivo)?Yii::app()->request->baseUrl.'/images/paquetes_images/media/'.$imagen->archivo:Yii::app()->request->baseUrl.'/images/_sys/img_noDisponible.png',
                          'imageOptions'=>array('style'=>'height:200px; margin-left: auto;   margin-right: auto;'),
                          'caption'=>'Utilizada en el fondo de la pantalla.',
                          'label'=>'Imagen de fondo actual',


                          ),
                   ),
                 'htmlOptions'=>array('style'=>'text-align:center;'),

            ));

        $this->endWidget();

?>




	<p class="help-block">Campos marcados con <span class="required">*</span> son requeridos.</p>

	<?php echo $form->errorSummary($imagen); ?>

	<?php 
        

        echo $form->fileFieldRow($imagen,'archivo',array('class'=>'span5','maxlength'=>50)); 
        

	echo $form->textAreaRow($imagen,'descripcion',array('rows'=>3, 'cols'=>50, 'class'=>'span5')); ?>
        
        <?php 
//        echo $form->dropDownListRow($imagen, 'image_type', $tipo); 
        ?>
	

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$imagen->isNewRecord ? 'Agregar' : 'Actualizar',
		)); ?>
	</div>

<?php $this->endWidget(); ?>