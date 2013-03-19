<?php
Yii::app()->clientScript->registerScriptFile(
        Yii::app()->baseUrl . '/js/organictabs.jquery.js',
	CClientScript::POS_END
	);

Yii::app()->clientScript->registerScriptFile(
        Yii::app()->baseUrl . '/js/galleria/galleria-1.2.8.min.js',
	CClientScript::POS_END
	);

Yii::app()->clientScript->registerScriptFile(
        Yii::app()->baseUrl . '/js/galleria/themes/classic/galleria.classic.min.js',
	CClientScript::POS_END
	);

$array_galeria = $this->getItemsGaleria($model->idPaquete);



if(!empty ($array_galeria)){
    Yii::app()->clientScript->registerScript('media-galleria', "

            Galleria.run('#galleria_info',
             {
                lightbox: true,
                transition: 'fade',
                wait: true,

             }
            );"

            );
}



$array_tienda = $this->getItemsTienda();
//print_r($array_tienda);die();
//echo $reservo;

$ciudades = array(
    'Bogota'     => "Bogota",
    'Barranquilla' => "Barranquilla",
    'Bucaramanga'   => "Bucaramanga",
    'Cali'     => "Cali",
    'Medellin'   => "Medellin",
    'Pereira'     => "Pereira",
);

$numeros = array(
    '0'     => "Ninguno",
    '1'     => "1",
    '2' => "2",
    '3'   => "3",
    '4'     => "4",
    '5'   => "5",
    '6'     => "6 o más",
);

$numeros_adultos = array(
    '1'     => "1",
    '2' => "2",
    '3'   => "3",
    '4'     => "4",
    '5'   => "5",
    '6'     => "6 o más",
);




?>
<div id="fb-root"></div>
<script>(function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = "//connect.facebook.net/es_LA/all.js#xfbml=1";
    fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<script>
var actual=0;
    $(function() {

        $("#tabs").organicTabs({
            "speed": 0
        });
    });
    verConoceMas=function(){
        $('#formPlan').hide('slow', function() {
            $('#conMas').show('slow', function() {
                // Animation complete
            });
           
        });
    }
    verFormulario=function(){
        $('#conMas').hide('slow', function() {
            $('#formPlan').show('slow', function() {
                // Animation complete
            });
        });

    }

    reloadFormulario=function(){
        $('#conMas').hide('slow', function() {
            $('#formPlan').show('slow', function() {
                // Animation complete
            });

             $('.alert').show('slow', function() {
                // Animation complete
            });
        });

       


    }
    cierraMas=function(){
        $('#conMas').hide('slow', function() {});
    }
    cierraForm=function(){
        $('#formPlan').hide('slow', function() {});
    }
    
    $(function() {
        
        $('.ad-preloads').hide();
        
        $('div#tabs ul.nav li#nav2.nav-two').click(function(e) {
            
            setTimeout( function() {
                
                 
                
                google.maps.event.trigger(EGMapContainer1, 'resize');
                
                
             }, 100 );
        });

        
    });
muestraFoto = function(num){
    $('#foto'+actual).hide('slow', function() {
        $('#foto'+num).show('slow', function() {
            // Animation complete
            actual=num;
        });
    });
    $('#info'+actual).hide('slow', function() {
        $('#info'+num).show('slow', function() {
            // Animation complete
            actual=num;
        });
    });
    $('#fecha'+actual).hide('slow', function() {
        $('#fecha'+num).show('slow', function() {
            // Animation complete
            actual=num;
        });
    });
    $('#principal'+actual).hide('slow', function() {
        $('#principal'+num).show('slow', function() {
            // Animation complete
            actual=num;
        });
    });
}
</script>

<?php if($reservo==2) echo'<script> setTimeout( function() {reloadFormulario();}  , 1000 ); </script>';  ?>


<style type="text/css">
    #gallery {
        padding: 30px;
    }
</style>


<div class="content1">
    <img src="<?php if ($model->empresasIdEmpresa) echo ''.Yii::app()->request->baseUrl.'/images/empresas_images/thumbs/'.$model->empresasIdEmpresa->thumbnail ?>" width="114" height="26" style="height:26px;"/>
    <h3><?php echo $model->nombre; ?></h3>
    <span class="desde">desde</span>
    <span class="precio"><span class="moneda"><?php echo $moneda ?></span>$<?php echo $valor ?>*</span>
    <span class="noches"><?php echo $model->descripcion; ?></span> 
    <span class="impuestos">Todos los impuestos incluidos</span>
    <span class="cuotas">
        <span class="numero_cuotas"><?php echo $model->cant_cuotas; ?></span> cuotas CMR desde <span class="precio_cuotas"><?php echo $model->valor_cuotas; ?>*</span></span>
    <h4>Detalle del plan </h4>
    <?php echo str_replace(' ', '', $model->detalle_plan); ?>
    <div class="linea_punteada"></div>
    <a href="javascript:void(0)" onclick="verConoceMas()" id="conoce_mas"> <div class="flecha_conoce"></div>   </a>
    <div class="linea_punteada"></div>
    <a href="javascript:void(0)" onclick="verFormulario()" id="solicita_plan">  </a>   
    <div class="linea_punteada"></div>
    <div class="social">
        <a href="#" class="bot_recomendar"></a>
        <fb:like href="www.mwonline.com.co/falabella/_yii/site/plan2/2/?rand=123452342346789" send="false" layout="button_count" width="100" show_faces="true"></fb:like>
        <a href="https://twitter.com/share" class="twitter-share-button" data-url="www.mwonline.com.co/falabella/_yii/site/plan2/2/?rand=123452342346789" data-count="none" data-lang="en">Tweet</a>
        <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
    </div>
</div>
<div class="conoce_mas" id="conMas" style="display:none">



    <!--TABS-->
    <h2>     
        Conoce <span>más</span>
    </h2>
    <a href="javascript:void(0)" onclick="cierraMas();" class="bot_cerrar"></a>
    <div id="tabs">
        <ul class="nav">
            <li class="nav-one" id="nav1"><a href="#featured2" class="current">INFORMACiÓN GENERAL</a></li>
            <li class="nav-two" id="nav2"><a href="#core2">RECOMENDACIONES</a></li>
            <li class="nav-three" id="nav3"><a href="#jquerytuts2">IMÁGENES DE USUARIOS</a></li>
        </ul>

        <!--TAB 1-->
        <div class="list-wrap">
           
            <div id="featured2">
                       
<!--                        <div class="flech_left_carrusel"></div>-->
<?php

                if(!empty ($array_galeria)){
                             echo '<div class="galleria_info" id="galleria_info">';

                             foreach ($array_galeria as $key => $value) {
                                                        if($value[1]== 0)
                                                        echo '<a href="'.$value[0].'"><img src="'.$value[0].'" data-title="'.$value[2].'"></a>';
                                                        if($value[1]== 1)
                                                        echo '<a href="'.$value[0].'"><span class="video">'.$value[2].'</span></a>';
                             }
                             echo'</div>';
                }
?>
<!--                        <div class="flecha_right_carrusel"></div>-->

                <div class="content_conocemas">
                    <?php echo $model->info_general; ?>
                    <div class="iconos_informacion">
                        <?php
                        if($model->clima)
                                echo'<div class="icos_info"><a href="#" class="ico_clima">Clima: '.$model->clima.'</a></div>';
                        if($model->moneda)
                                echo'<div class="icos_info"><a href="#" class="ico_moneda">Moneda: '.$model->moneda.'</a></div>';
                        if($model->idioma)
                                echo'<div class="icos_info"><a href="#" class="ico_idioma">Idioma: '.$model->idioma.'</a></div>';
                       
                        ?>
                    </div>
                </div>
            </div>



            <!--TAB 2-->
            <div id="core2" class="hide">
                
                <?php 
                if($model->latitud != 0){
                    Yii::import('ext.EGmap.*');
                    $gMap = new EGMap();

                    $gMap->setWidth(490);
                    // it can also be called $gMap->height = 400;
                    $gMap->setHeight(248);
                    $gMap->zoom = 8; 
                    
                    // set center to inca
                    $gMap->setCenter($model->latitud, $model->longitud);
                    
                    $icon = new EGMapMarkerImage("http://google-maps-icons.googlecode.com/files/deptstore.png");
                    
                    $marker = new EGMapMarker($model->latitud, $model->longitud, array('title' => Yii::t('paquete', $model->nombre),
                     'icon'=>$icon, 'draggable'=>false), 'marker', array());
    
                    $gMap->addMarker($marker);
                    
                    $gMap->renderMap();
                
                }else echo'<img class="mapa" src="img/mapa.jpg" width="491" height="248" />';
                ?>
             
                <div class="content_conocemas">
                    <?php
                    if($model->que_hacer)
                                echo'<h4 class="quehacer">¿quÉ hacer?</h4>';
                    if($model->tips_viajero)
                                echo'<h4 class="tips">Tips para viajeros</h4>';
                    if($model->que_hacer)
                                echo'<ul style="margin-top:0px; margin-left:0px; background-image:none; float:none;">'.$model->que_hacer.'</ul>';
                    if($model->tips_viajero)
                                echo'<ul style="margin-top:0px; float:right; background-image:none;margin-right:25px;">'.$model->tips_viajero.'</ul>';
                    ?>
                   
                </div>
            </div>


            <!--TAB 3-->
            <div id="jquerytuts2" class="hide">  
                <?php // print_r( date('H:m:s', strtotime ($instag[0]->created_time)));?>
                <?php // print_r( date('d-m-Y', strtotime ($instag[0]->caption->created_time)));?>
                <?php // print_r( strtotime(date("Y-m-d H:i:s")-$instag[0]->caption->created_time));?>
                <?php foreach ($instag as $key => $photo) { ?>
                    <div class="img_sombra" style="<?php echo($key == 0) ? 'display:block' : 'display:none'; ?>" id="principal<?php echo $key; ?>"><img src="<?php echo $photo->images->standard_resolution->url; ?>" width="372" height="356" /></div>
                    <div class="usuario" style="<?php echo($key == 0) ? 'display:block' : 'display:none'; ?>" id="foto<?php echo $key; ?>"><img src="<?php print_r($photo->caption->from->profile_picture); ?>" alt="" width="72" height="72" /></div>
                    <span class="tit_ususario" style="<?php echo($key == 0) ? 'display:block' : 'display:none'; ?>" id="info<?php echo $key; ?>"><?php print_r($photo->caption->from->username); ?></span><span class="fecha_img" style="<?php echo($key == 0) ? 'display:block' : 'display:none'; ?>" id="fecha<?php echo $key; ?>">Tomada hace 2 horas</span>
                <?php } ?>
                <div class="content_conocemas">
                    <?php foreach ($instag as $key => $photo) { ?>
                        <a href="javascript:void(0)" onclick="muestraFoto(<?php echo $key ?>)"><div class="min_imagenes"><img src="<?php echo $photo->images->low_resolution->url; ?>" width="72" height="72" /></div></a>
                    <?php } ?>
                </div>
            </div>
        </div>

    </div>
</div>
<div class="formulario" id="formPlan" style="display:none">
    <a href="javascript:void(0)" onclick="cierraForm()" class="bot_cerrar"></a>

    <!--TABS-->
    <div id="dan" class="dan">
     

        <?php

        $form=$this->beginWidget('CActiveForm', array(
	'id'=>'reservas-form',
	'enableAjaxValidation'=>false,
        'htmlOptions'=>array('class'=>'fr_registro', 'id'=>'fr_registro'),
        )
        );

        ?>

<!--	<p class="note">Fields with <span class="required">*</span> are required.</p>-->

	
        
        <div id="contenedor_form" style="width:310px;">
             <div class="tit_form">
               SOLICITA TU PLAN <span>EN LÍNEA</span>
             </div>
             <div class="text_incluye style1" style="line-height:20px;">
               &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Los datos con asterisco (<span class="asterisco">*</span>) son obligatorios
             </div>
             <div class="alert alert-block alert-error text_incluye style2" style="display:none;">

                <?php 
                echo $form->errorSummary($reserva);
//                $this->widget('bootstrap.widgets.TbAlert');
//                echo CActiveForm::validate($reserva);

                ?>
             </div>
            <div style="height:50px;display:block;"></div>

             <div class="line2 Tit_1" style="line-height:30px;">
                    1. Datos personales
             </div>

             <div style="height:20px; display:block;"></div>
             <div id="row">
                 <div height="30" align="right" class="text_incluye style1" style="width:48%; float:left;">
                      <?php echo $form->label($reserva,'nombre',array('class'=>'text_incluye style1', 'align'=>'right', 'style'=>'line-height:30px; margin-right:10px;')); ?>
                 </div>
                 <div height="30" align="left" class="text_incluye style1" style="width:2%; float:right; display:inline-block;">
                      <span class="asterisco">*</span>
                 </div>
                 <div height="30" align="left" class="text_incluye style1" style="width:50%; float:right;">
                      <?php echo $form->textField($reserva,'nombre',array('size'=>60,'maxlength'=>100, 'class'=>'text_incluye style1', 'align'=>'right', 'style'=>'line-height:30px; height:30px; width:95%; margin-bottom:1px;')); ?>
                 </div>
                 
             </div>

             
             <div id="row">
                 <div height="30" align="right" class="text_incluye style1" style="width:48%; float:left;">
                      <?php echo $form->label($reserva,'apellidos',array('class'=>'text_incluye style1', 'align'=>'right', 'style'=>'line-height:30px; margin-right:10px;')); ?>
                 </div>
                 <div height="30" align="left" class="text_incluye style1" style="width:2%; float:right; display:inline-block;">
                      <span class="asterisco">*</span>
                 </div>
                 <div height="30" align="left" class="text_incluye style1" style="width:50%; float:right;">
                      <?php echo $form->textField($reserva,'apellidos',array('size'=>60,'maxlength'=>100, 'class'=>'text_incluye style1', 'align'=>'right', 'style'=>'line-height:30px; height:30px; width:95%; margin-bottom:1px;')); ?>
                 </div>

             </div>

             <div id="row">
                 <div height="30" align="right" class="text_incluye style1" style="width:48%; float:left;">
                      <?php echo $form->label($reserva,'documento',array('class'=>'text_incluye style1', 'align'=>'right', 'style'=>'line-height:30px; margin-right:10px;')); ?>
                 </div>
                 <div height="30" align="left" class="text_incluye style1" style="width:2%; float:right; display:inline-block;">
                      <span class="asterisco">*</span>
                 </div>
                 <div height="30" align="left" class="text_incluye style1" style="width:50%; float:right;">
                      <?php echo $form->textField($reserva,'documento',array('size'=>20,'maxlength'=>20, 'class'=>'text_incluye style1', 'align'=>'right', 'style'=>'line-height:30px; height:30px; width:95%; margin-bottom:1px;')); ?>
                 </div>

             </div>

             <div id="row">
                 <div height="30" align="right" class="text_incluye style1" style="width:48%; float:left;">
                      <?php echo $form->label($reserva,'email',array('class'=>'text_incluye style1', 'align'=>'right', 'style'=>'line-height:30px; margin-right:10px;')); ?>
                 </div>
                 <div height="30" align="left" class="text_incluye style1" style="width:2%; float:right; display:inline-block;">
                      <span class="asterisco">*</span>
                 </div>
                 <div height="30" align="left" class="text_incluye style1" style="width:50%; float:right;">
                      <?php echo $form->textField($reserva,'email',array('size'=>60,'maxlength'=>100, 'class'=>'text_incluye style1', 'align'=>'right', 'style'=>'line-height:30px; height:30px; width:95%; margin-bottom:1px;')); ?>
                 </div>

             </div>

             <div id="row">
                 <div height="30" align="right" class="text_incluye style1" style="width:48%; float:left;">
                      <?php echo $form->label($reserva,'direccion',array('class'=>'text_incluye style1', 'align'=>'right', 'style'=>'line-height:30px; margin-right:10px;')); ?>
                 </div>
                 <div height="30" align="left" class="text_incluye style1" style="width:2%; float:right; display:inline-block;">
                      <span class="asterisco">*</span>
                 </div>
                 <div height="30" align="left" class="text_incluye style1" style="width:50%; float:right;">
                      <?php echo $form->textField($reserva,'direccion',array('size'=>60,'maxlength'=>200, 'class'=>'text_incluye style1', 'align'=>'right', 'style'=>'line-height:30px; height:30px; width:95%; margin-bottom:1px;')); ?>
                 </div>

             </div>

             <div id="row">
                 <div height="30" align="right" class="text_incluye style1" style="width:48%; float:left;">
                      <?php echo $form->label($reserva,'telefono',array('class'=>'text_incluye style1', 'align'=>'right', 'style'=>'line-height:30px; margin-right:10px;')); ?>
                 </div>
                 <div height="30" align="left" class="text_incluye style1" style="width:2%; float:right; display:inline-block;">
                      <span class="asterisco">*</span>
                 </div>
                 <div height="30" align="left" class="text_incluye style1" style="width:50%; float:right;">
                      <?php echo $form->textField($reserva,'telefono',array('size'=>20,'maxlength'=>20, 'class'=>'text_incluye style1', 'align'=>'right', 'style'=>'line-height:30px; height:30px; width:95%; margin-bottom:1px;')); ?>
                 </div>

             </div>

             <div id="row">
                 <div height="30" align="right" class="text_incluye style1" style="width:48%; float:left;">
                      <?php echo $form->label($reserva,'ciudad',array('class'=>'text_incluye style1', 'align'=>'right', 'style'=>'line-height:30px; margin-right:10px;')); ?>
                 </div>
                 <div height="30" align="left" class="text_incluye style1" style="width:2%; float:right; display:inline-block;">
                      <span class="asterisco">*</span>
                 </div>
                 <div height="30" align="left" class="text_incluye style1" style="width:50%; float:right;">
                      <?php echo $form->dropDownList($reserva, 'ciudad', $ciudades,array('class'=>'text_incluye style1', 'align'=>'right', 'style'=>'line-height:30px; width:95%; margin-bottom:1px;')); ?>
                 </div>

             </div>

             <div style="height:30px; display:block;"></div>

             <div class="line2 Tit_1" style="line-height:30px;">
                    2. Datos del plan
             </div>

             <div style="height:20px; display:block;"></div>


              <div id="row">
                 <div height="30" align="right" class="text_incluye style1" style="width:48%; float:left;">
                      <?php echo $form->label($reserva,'paquetes_idPaquete',array('class'=>'text_incluye style1', 'align'=>'right', 'style'=>'line-height:30px; margin-right:10px;')); ?>
                 </div>
                 <div height="30" align="left" class="text_incluye style1" style="width:2%; float:right; display:inline-block;">
                      <span class="asterisco">*</span>
                 </div>
                 <div height="30" align="left" class="text_incluye style1" style="width:50%; float:right;">
                    <?php echo CHtml::label($model->nombre,'',array('class'=>'text_incluye style1', 'align'=>'right', 'style'=>'line-height:30px; margin-right:10px;width:95%; margin-bottom:1px;height:30px;')); ?>
             

                     <?php
//                        echo $form->textField($reserva,'paquetes_idPaquete',array('readonly'=>true, 'class'=>'text_incluye style1', 'align'=>'right', 'style'=>'line-height:30px; height:30px; width:95%; margin-bottom:1px;'));
                        ?>
                 </div>

             </div>

              <div id="row">
                 <div height="30" align="right" class="text_incluye style1" style="width:48%; float:left;">
                      <?php echo $form->label($reserva,'fecha_reserva',array('class'=>'text_incluye style1', 'align'=>'right', 'style'=>'line-height:30px; margin-right:10px;')); ?>
                 </div>
                 <div height="30" align="left" class="text_incluye style1" style="width:2%; float:right; display:inline-block;">
                      <span class="asterisco">*</span>
                 </div>
                 <div height="30" align="left" class="text_incluye style1" style="width:50%; float:right;">
                      <?php $this->widget('zii.widgets.jui.CJuiDatePicker',
                            array(
                                'name'=>'Reservas[fecha_reserva]',
                                'options' => array('dateFormat'=>Yii::app()->locale->getDateFormat('calendar_small')),
                                'language' => 'es',
                                'value' => $reserva->fecha_reserva,
                                    // additional javascript options for the date picker plugin
                                'options' => array(
                                        'showAnim' => 'fold',
                                        'dateFormat' => 'yy-mm-dd',
                                        'changeMonth' => 'true',
                                        'changeYear' => 'true',
                                        'constrainInput' => 'false',
                                ),
                                'htmlOptions' => array('readonly'=>"readonly", 'class'=>'text_incluye style1', 'style'=>'line-height:30px; height:30px; width:95%; margin-bottom:1px;cursor: pointer; font-size:0.7em;')
                            )
                        );

                      ?>

                 </div>

             </div>

             <div id="row">
                 <div height="30" align="right" class="text_incluye style1" style="width:48%; float:left;">
                    <label style="line-height:30px; margin-right:10px;" align="right" class="text_incluye style1">Numero de viajeros</label>
                </div>

                 <div height="30" align="left" class="text_incluye style1" style="width:52%; float:right;">
                     <label class="text_incluye style1" align="right" style="line-height:30px; margin-right:10px;width:95%; margin-bottom:1px;"> &nbsp; </label>
                 </div>

             </div>

             <div id="row">
                 <div height="30" align="right" class="text_incluye style1" style="width:48%; float:left;">
                      <?php echo $form->label($reserva,'num_adultos',array('class'=>'text_incluye style1', 'align'=>'right', 'style'=>'line-height:30px; margin-right:10px;')); ?>
                 </div>
                 <div height="30" align="left" class="text_incluye style1" style="width:2%; float:right; display:inline-block;">
                      <span class="asterisco">&nbsp;</span>
                 </div>
                 <div height="30" align="left" class="text_incluye style1" style="width:50%; float:right;">
                      <?php echo $form->dropDownList($reserva, 'num_adultos', $numeros_adultos,array('class'=>'text_incluye style1', 'align'=>'right', 'style'=>'line-height:30px; width:95%; margin-bottom:1px;')); ?>

                 </div>

             </div>

              <div id="row">
                 <div height="30" align="right" class="text_incluye style1" style="width:48%; float:left;">
                      <?php echo $form->label($reserva,'num_ninos',array('class'=>'text_incluye style1', 'align'=>'right', 'style'=>'line-height:30px; margin-right:10px;')); ?>
                 </div>
                 <div height="30" align="left" class="text_incluye style1" style="width:2%; float:right; display:inline-block;">
                      <span class="asterisco">&nbsp;</span>
                 </div>
                 <div height="30" align="left" class="text_incluye style1" style="width:50%; float:right;">
                        <?php echo $form->dropDownList($reserva, 'num_ninos', $numeros,array('class'=>'text_incluye style1', 'align'=>'right', 'style'=>'line-height:30px; width:95%; margin-bottom:1px;')); ?>
                </div>

             </div>

             <div id="row">
                 <div height="30" align="right" class="text_incluye style1" style="width:48%; float:left;">
                      <?php echo $form->label($reserva,'num_infantes',array('class'=>'text_incluye style1', 'align'=>'right', 'style'=>'line-height:30px; margin-right:10px;')); ?>
                 </div>
                 <div height="30" align="left" class="text_incluye style1" style="width:2%; float:right; display:inline-block;">
                     <span class="asterisco">&nbsp;</span>
                 </div>
                 <div height="30" align="left" class="text_incluye style1" style="width:50%; float:right;">
                        <?php echo $form->dropDownList($reserva, 'num_infantes', $numeros,array('class'=>'text_incluye style1', 'align'=>'right', 'style'=>'line-height:30px; width:95%; margin-bottom:1px;')); ?>
         </div>

             </div>

             <div style="height:30px; display:block;"></div>

             <div class="line2 Tit_1" style="line-height:30px;">
                    3. Forma de pago
             </div>

             <div style="height:20px; display:block;"></div>

              <div id="row">
                 <div height="30" align="left" class="text_incluye style1" style="width:58%; float:left;">
                      <?php echo $form->label($reserva,'donde_pago_idDondePago',array('class'=>'text_incluye style1', 'align'=>'left', 'style'=>'line-height:30px; margin-right:10px;')); ?>
                 </div>
                 <div height="30" align="left" class="text_incluye style1" style="width:2%; float:right; display:inline-block;">
                      <span class="asterisco">*</span>
                 </div>
                 <div height="30" align="left" class="text_incluye style1" style="width:40%; float:right;">
                      <?php echo $form->dropDownList($reserva, 'donde_pago_idDondePago', $array_tienda,array('class'=>'text_incluye style1', 'align'=>'right', 'style'=>'line-height:30px; width:95%; margin-bottom:1px;')); ?>
                   </div>

             </div>

             <div style="height:30px; display:block;"></div>

             <div class="line2 Tit_1" style="line-height:30px; margin-top:10px;">
                     4. T&#233;rminos y condiciones
             </div>

             <div style="height:20px; display:block;"></div>

               <div id="row">
                 <div height="30" align="right" class="text_incluye style1" style="width:6%; float:left;">
                     <input type="checkbox" name="terminos" id="terminos" value="1" />
                 </div>

                 <div height="30" align="left" class="text_incluye style1" style="width:94%; float:right;">
                    <label style="line-height:20px; margin-left:10px;" align="right" class="text_incluye style1">Acepto  t&#233;rminos y condiciones de Ofertas L&#237;mite Viajes Falabella</label>
                 </div>

             </div>
            
         </div>

<!--        <td><input style="width:98px;" class="bot_cancelar" type="submit" name="button2" id="button" value="&nbsp;" />
                                    <input style="width:98px;" class="bot_enviar" type="submit" name="button" id="bot_button" value="&nbsp; " /></td>
                                <td>&nbsp;</td>-->
        <div style="height:40px; display:block;"></div> 
	<div class="row buttons" style="margin-left:20px;">
                <?php echo CHtml::Button('', array('style'=>'width:98px;', 'class'=>'bot_cancelar', 'id'=>'button', 'onclick'=>'cierraForm()')); ?>
               

		<?php echo CHtml::submitButton('', array('style'=>'width:98px;', 'class'=>'bot_enviar', 'id'=>'bot_button')); ?>
                
	</div>
        

<?php $this->endWidget(); ?>

        <div class="telefonos">
            <span class="compra_ya">COMPRA YA</span><span class="llamando_al">Llamando al Teléfono</span><span class="telefono1">587 7772</span> <span class="bogota">bogotÁ</span> <span class="telefono2">01 800 0111 853</span><span class="bogota">Línea nacional</span> 
            <div class="linea3"></div>
            <span class="asesor">ASESOR VIRTUAL</span> 
            <p>Comunicate con un asesor virtual y solicita este paquete</p><a href="#"></a>
        </div>
        <noscript>
        <div style="display:inline;"></div>
        </noscript>
    </div>
</div>