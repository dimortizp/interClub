<?php
/* @var $this PaquetesController */
/* @var $model Paquetes */
/* @var $form CActiveForm */
?>



<?php
        if($model->scenario=="update"){
        
        $this->beginWidget('bootstrap.widgets.TbCarousel', array(
                'items'=>array(
                    array('image'=>($model->background)?Yii::app()->request->baseUrl.'/images/paquetes_images/'.$model->background:Yii::app()->request->baseUrl.'/images/_sys/img_noDisponible.png',
                          'imageOptions'=>array('style'=>'height:200px; margin-left: auto;   margin-right: auto;'),
                          'caption'=>'Utilizada en el fondo de la pantalla.',
                          'label'=>'Imagen de fondo actual',
                     

                          ),
                    array('image'=>($model->thumbnail)?Yii::app()->request->baseUrl.'/images/paquetes_images/thumbs/'.$model->thumbnail:Yii::app()->request->baseUrl.'/images/_sys/img_noDisponible.png',
                          'label'=>'Imagen miniatura actual',
                          'caption'=>'Utilizada en el menu de seleccion.',
                          'imageOptions'=>array('style'=>'height:200px; margin-left: auto;   margin-right: auto;'),
                            
                          ),
                    ),
                 'htmlOptions'=>array('style'=>'text-align:center;'),

            ));

        $this->endWidget();
        
       

        
       
        
        }

 ?>

<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'paquetes-form',
	'enableAjaxValidation'=>true,
        'htmlOptions' => array('enctype' => 'multipart/form-data'),
)); ?>
       
        <div class="form-actions">
            <div class="btn-toolbar">
    
                <?php $this->widget('bootstrap.widgets.TbButtonGroup', array(
                    'type'=>'info', // '', 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
                    'size'=>'mini',
                    'buttons'=>array(
                        array('label'=>'Datos y ubicacion', 
                              'url'=>'#',
                              'htmlOptions'=>array('class'=>'datos-button btn'),
                              ),
                        array('label'=>'Precio y cuotas ', 
                              'url'=>'#',
                              'htmlOptions'=>array('class'=>'precio-button btn'),
                             ),
                        array('label'=>'Detalles', 
                              'url'=>'#',
                              'htmlOptions'=>array('class'=>'detalles-button btn'),
                             ),
                        array('label'=>'Imagenes y HASHTAG', 
                              'url'=>'#',
                              'type'=>'warning',
                              'htmlOptions'=>array('class'=>'imagenes-button btn'),
                             ),
                        array('label'=>'Galeria', 
                              'url'=>array('galeria','id'=>$model->idPaquete),
                              'type'=>'warning',
                              'htmlOptions'=>($model->scenario=="update")?'':array('style'=>'display:none;'),
                             ),
                        
                    ),
                    'htmlOptions'=>array('style'=>'float:left;'),
                )); ?>
            </div>
            
            <?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'danger',
			'label'=>$model->isNewRecord ? 'Crear' : 'Guardar cambios',
                        'htmlOptions'=>array('style'=>'float:right;'),
                        
		)); ?>
	</div>
        
	<p class="help-block">Campos marcados con <span class="required">*</span> son requeridos.</p>

	<?php echo $form->errorSummary($model); ?>

	<?php echo $form->textFieldRow($model,'nombre',array('class'=>'span5 formulario1','maxlength'=>150,'labelOptions'=>array('class'=>'formulario1'))); ?>
        <?php echo $form->textFieldRow($model,'descripcion',array('class'=>'span5 formulario1','maxlength'=>50, 'labelOptions'=>array('class'=>'formulario1'))); ?>
        
        	    
        <?php echo $form->dropDownListRow($model,'destinos_idDestino', $model->getDestinosNoPromocionales(),array('prompt' => 'Seleccione Categoria', 'class'=>'span5 formulario1', 'labelOptions'=>array('class'=>'formulario1'))); ?>
	<?php echo $form->dropDownListRow($model,'empresas_idEmpresa', $model->getEmpresas(),array('prompt' => 'Seleccione Categoria', 'class'=>'span5 formulario1', 'labelOptions'=>array('class'=>'formulario1'))); ?>

        <?php echo $form->textFieldRow($model,'valor',array('class'=>'span5 formulario2','maxlength'=>50,'labelOptions'=>array('class'=>'formulario2'))); ?>
	<?php echo $form->textFieldRow($model,'cant_cuotas',array('class'=>'span5 formulario2', 'labelOptions'=>array('class'=>'formulario2'))); ?>
	<?php echo $form->textFieldRow($model,'valor_cuotas',array('class'=>'span5 formulario2','maxlength'=>50, 'labelOptions'=>array('class'=>'formulario2'))); ?>

        <?php
        ?>
        	<div class="formulario3">
        <?php
//      echo $form->textAreaRow($model,'detalle_plan',array('rows'=>6, 'cols'=>50, 'class'=>'span8 formulario3', 'labelOptions'=>array('class'=>'formulario3')));

        echo $form->labelEx($model,'detalle_plan'); 

        $this->widget('ext.editMe.widgets.ExtEditMe', array(
            'model'=>$model,
            'attribute'=>'detalle_plan',
            'htmlOptions'=>array('option'=>'value'),
            'toolbar'=>array( 
                array(
                    'Cut', 'Copy', 'Paste', 'PasteText', 'PasteFromWord', '-', 'Undo', 'Redo', 
                ), 
                array(
                    'Bold', 'Italic', 'Underline', 'Strike', '-', 'RemoveFormat', 
                ), 
                array(
                    'NumberedList', 'BulletedList', '-', 'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock', 
                ), 
                array(
                    'Link', 'Unlink', 'Anchor', 
                ), 
//                array(
//                    'Image', 'Flash', 'Table', 'HorizontalRule', 'Smiley', 'SpecialChar', 'PageBreak', 'Iframe'
//                ), 
                '/',
                array(
                    'Styles', 'Format', 'Font', 'FontSize', 
                ), 
                array(
                    'TextColor', 'BGColor', 
                ), 
                array(
                    'Maximize', 'ShowBlocks', '-',
                ), 
            )
            
        )); 

        echo $form->textAreaRow($model,'info_general',array('rows'=>6, 'cols'=>50, 'class'=>'span8 formulario3', 'labelOptions'=>array('class'=>'formulario3')));

//        echo $form->labelEx($model,'info_general');
//
//        $this->widget('ext.editMe.widgets.ExtEditMe', array(
//            'model'=>$model,
//            'attribute'=>'info_general',
//            'htmlOptions'=>array('option'=>'value'),
//            'toolbar'=>array(
//                array(
//                    'Cut', 'Copy', 'Paste', 'PasteText', 'PasteFromWord', '-', 'Undo', 'Redo',
//                ),
//                array(
//                    'Bold', 'Italic', 'Underline', 'Strike', '-', 'RemoveFormat',
//                ),
//                array(
//                    'NumberedList', 'BulletedList', '-', 'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock',
//                ),
//                array(
//                    'Link', 'Unlink', 'Anchor',
//                ),
//
//                '/',
//                array(
//                    'Styles', 'Format', 'Font', 'FontSize',
//                ),
//                array(
//                    'TextColor', 'BGColor',
//                ),
//                array(
//                    'Maximize', 'ShowBlocks', '-',
//                ),
//            )
//
//        ));
        
        
       ?>
        	</div>

	<?php echo $form->textFieldRow($model,'clima',array('class'=>'span5 formulario3','maxlength'=>20, 'labelOptions'=>array('class'=>'formulario3'))); ?>
	<?php echo $form->textFieldRow($model,'moneda',array('class'=>'span5 formulario3','maxlength'=>50, 'labelOptions'=>array('class'=>'formulario3'))); ?>
	<?php echo $form->textFieldRow($model,'idioma',array('class'=>'span5 formulario3','maxlength'=>20, 'labelOptions'=>array('class'=>'formulario3'))); ?>
	
        <div class="formulario3">
        <?php

        echo $form->labelEx($model,'que_hacer'); 

        $this->widget('ext.editMe.widgets.ExtEditMe', array(
            'model'=>$model,
            'attribute'=>'que_hacer',
            'htmlOptions'=>array('option'=>'value'),
            'toolbar'=>array( 
              array(
                    'Cut', 'Copy', 'Paste', 'PasteText', 'PasteFromWord', '-', 'Undo', 'Redo', 
                ), 
                array(
                    'Bold', 'Italic', 'Underline', 'Strike', '-', 'RemoveFormat', 
                ), 
                array(
                    'NumberedList', 'BulletedList', '-', 'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock', 
                ), 
                array(
                    'Link', 'Unlink', 'Anchor', 
                ), 
                '/',
                array(
                    'Styles', 'Format', 'Font', 'FontSize', 
                ), 
                array(
                    'TextColor', 'BGColor', 
                ), 
                array(
                    'Maximize', 'ShowBlocks', '-',
                ), 
            )
            
        )); 
        
        echo $form->labelEx($model,'tips_viajero'); 

        $this->widget('ext.editMe.widgets.ExtEditMe', array(
            'model'=>$model,
            'attribute'=>'tips_viajero',
            'htmlOptions'=>array('option'=>'value'),
            'toolbar'=>array( 
                array(
                    'Cut', 'Copy', 'Paste', 'PasteText', 'PasteFromWord', '-', 'Undo', 'Redo', 
                ), 
                array(
                    'Bold', 'Italic', 'Underline', 'Strike', '-', 'RemoveFormat', 
                ), 
                array(
                    'NumberedList', 'BulletedList', '-', 'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock', 
                ), 
                array(
                    'Link', 'Unlink', 'Anchor', 
                ), 
                '/',
                array(
                    'Styles', 'Format', 'Font', 'FontSize', 
                ), 
                array(
                    'TextColor', 'BGColor', 
                ), 
                array(
                    'Maximize', 'ShowBlocks', '-',
                ), 
            )
            
        )); 
        
        
       ?>
       </div>

        <?php echo $form->fileFieldRow($model,'background',array('class'=>'span5 formulario4','maxlength'=>50, 'labelOptions'=>array('class'=>'formulario4'))); ?>
	<?php echo $form->fileFieldRow($model,'thumbnail',array('class'=>'span5 formulario4','maxlength'=>50, 'labelOptions'=>array('class'=>'formulario4'))); ?>
	<?php echo $form->textFieldRow($model,'hashtag',array('class'=>'span5 formulario4','maxlength'=>40, 'labelOptions'=>array('class'=>'formulario4'))); ?>
        
         <p class="well formulario1" style="width: 340px; display:block;">
                Ubique el destino en el mapa inferior. <a href="#" rel="tooltip" title="Clic y arrastre">Asi:</a>
         </p>
        
        
         <div class="formulario1">
  <?php     
        Yii::import('ext.EGmap.*');
        
        $gMap = new EGMap();
        
        $gMap->setWidth(380);
        $gMap->setHeight(300);
        $gMap->zoom = 6;
        $mapTypeControlOptions = array(
          'position' => EGMapControlPosition::RIGHT_TOP,
          'style' => EGMap::MAPTYPECONTROL_STYLE_HORIZONTAL_BAR
        );

        $gMap->mapTypeId = EGMap::TYPE_ROADMAP;
        $gMap->mapTypeControlOptions = $mapTypeControlOptions;

        // Preparing InfoWindow with information about our marker.
        $info_window_a = new EGMapInfoWindow("<div class='gmaps-label' style='color: #000;'>Hi! I'm your marker!</div>");

        // Setting up an icon for marker.
        $icon = new EGMapMarkerImage("http://google-maps-icons.googlecode.com/files/deptstore.png");

        $icon->setSize(32, 37);
        $icon->setAnchor(16, 16.5);
        $icon->setOrigin(0, 0);

        // Saving coordinates after user dragged our marker.
        $dragevent = new EGMapEvent('dragend', "function (event) { 
                                                    
                                                    document.getElementById('Paquetes_longitud').value = event.latLng.lat();
                                                    document.getElementById('Paquetes_latitud').value = event.latLng.lng();
                                                    
                                                    
                                                }", false, EGMapEvent::TYPE_EVENT_DEFAULT);

        // If we have already created marker - show it
        if ($model->latitud != 0) {
//            $gMap->setCenter(39.721089311812094, 2.91165944519042);
            $marker = new EGMapMarker($model->latitud, $model->longitud, array('title' => Yii::t('paquete', $model->nombre),
                    'icon'=>$icon, 'draggable'=>true), 'marker', array('dragevent'=>$dragevent));
            $marker->addHtmlInfoWindow($info_window_a);
            $gMap->addMarker($marker);
            $gMap->setCenter($model->latitud, $model->longitud);
            $gMap->zoom = 6;

        // If we don't have marker in database - make sure user can create one
        } else {
            $gMap->setCenter(4.59182811429604, -74.21620426904292);

            // Setting up new event for user click on map, so marker will be created on place and respectful event added.
            $gMap->addEvent(new EGMapEvent('click',
                    'function (event) {
                        
                    var marker = new google.maps.Marker({
                                                        position: event.latLng, 
                                                        map: '.$gMap->getJsName().', 
                                                        draggable: true, 
                                                        icon: '.$icon->toJs().'
                                                         }
                                                        );
                                                        
                    '.$gMap->getJsName().'.setCenter(event.latLng); 
                    
                    var dragevent = '.$dragevent->toJs('marker').'; 
                    
                    document.getElementById("Paquetes_longitud").value = event.latLng.lat();
                    document.getElementById("Paquetes_latitud").value = event.latLng.lng();

                    }', false, EGMapEvent::TYPE_EVENT_DEFAULT_ONCE));
        }
        $gMap->renderMap(array(), Yii::app()->language);

?>        
        </div>
        
        <?php echo $form->textFieldRow($model,'longitud',array('class'=>'span5 formulario1','maxlength'=>25, 'labelOptions'=>array('class'=>'formulario1'))); ?>
	<?php echo $form->textFieldRow($model,'latitud',array('class'=>'span5 formulario1','maxlength'=>25, 'labelOptions'=>array('class'=>'formulario1'))); ?>
	     
      
        
<?php $this->endWidget(); ?>

<?php
Yii::app()->clientScript->registerScript('form_pages', "
$('.datos-button').click(function(){
	$('.formulario1').show('slow');
        $('.formulario2').hide('slow');
        $('.formulario3').hide('slow');
        $('.formulario4').hide('slow');
        $('.help-block').hide('slow');
	return false;
});

$('.precio-button').click(function(){
	$('.formulario2').show('slow');
        $('.formulario1').hide('slow');
        $('.formulario3').hide('slow');
        $('.formulario4').hide('slow');
        $('.help-block').hide('slow');
	return false;
});

$('.detalles-button').click(function(){
	$('.formulario3').show('slow');
        $('.formulario1').hide('slow');
        $('.formulario2').hide('slow');
        $('.formulario4').hide('slow');
        $('.help-block').hide('slow');
	return false;
});

$('.imagenes-button').click(function(){
	$('.formulario4').show('slow');
        $('.carousel').show('slow');
        $('.formulario1').hide('slow');
        $('.formulario2').hide('slow');
        $('.formulario3').hide('slow');
        $('.help-block').hide('slow');
	return false;
});

 $('.formulario2').hide();
 $('.formulario3').hide();
 $('.formulario4').hide();
 $('.carousel').hide();


");
?>