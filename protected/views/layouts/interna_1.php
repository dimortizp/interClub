<?php
Yii::app()->clientScript->registerScriptFile(
        Yii::app()->baseUrl . '/js/jquery.cycle.all.min.js', CClientScript::POS_END
);

Yii::app()->clientScript->registerScriptFile(
        Yii::app()->baseUrl . '/js/jquery.maximage.min.js', CClientScript::POS_END
);
?>
<html xmlns:fb="http://ogp.me/ns/fb#" xml:lang="es" lang="es">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title><?php echo CHtml::encode($this->pageTitle); ?></title>
<meta http-equiv="content-language" content="es">
<meta property="og:image" content="<?php echo $this->imagenfondo?>"/>
<link rel="image_src" href="<?php echo $this->imagenfondo?>"/>
<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/styles.css" type="text/css" media="screen" />
<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/reset.css" type="text/css" media="screen" />	
<!--[if IE 7]>    
<script>
    $(function() {
	var zIndexNumber = 100;
	$('div').each(function() {
		$(this).css('zIndex', zIndexNumber);
		zIndexNumber -= 1;
	});
});
</script>
<![endif]-->
</head>

<body id="home" onload="window._pulsarDocLoad=true">
<div id="main_wrapper">
  <div id="header">
    <div id="header_inner"> <a href="<?php echo Yii::app()->baseUrl ?>" id="logo"> </a>
      <div class="planes">TODOS LOS PLANES
        <div class="menu">
          <div class="flecha_menu"></div>
          <div>
          <?php

            $destinosxfila = 4;
            $cantidadfilas = $this->cantidadDestinos / $destinosxfila;
            $estilolinea = ' line1';
            $contadorPaquetes = 0;
            $filasmostradas = 0;
            
            for($i=0; $i<$this->cantidadDestinos;$i++){
                if(($i%$destinosxfila)==0&&$i!=0){
                    $filasmostradas++;
                    if($filasmostradas==($cantidadfilas-1))
                        $estilolinea='';
                }
                echo '<ul class="item_menu'.$estilolinea.'">';
                echo '<li class="tit_menu">'.$this->destinosMenus[$i]->nombre;
                echo '<ul>';
                while($contadorPaquetes<count($this->destinosMenus[$i]->paquetes)&&$this->destinosMenus[$i]->paquetes[$contadorPaquetes]->nombre!=''){
                    echo '<li class="item_submenu"><a href="'.$this->createUrl('site/plan',array('id'=>$this->destinosMenus[$i]->paquetes[$contadorPaquetes]->idPaquete)).'">'.$this->destinosMenus[$i]->paquetes[$contadorPaquetes]->nombre.'</a></li>';
                    $contadorPaquetes++;
                }
                $contadorPaquetes = 0;
                echo '</ul>';
                echo '</li>';
                echo '</ul>';
            }
          ?>
          </div>
        </div>
      </div>
     <!--a href="#">SURAMÉRICA </a><span class="miga_pan1"><a href="#">PERÚ EN JEANS</a></span-->
   <?php if(isset($this->breadcrumbs)):?>
            <?php $this->widget('zii.widgets.CBreadcrumbs', array(
                    'htmlOptions'=>array('class'=>'miga_pan'),
                    'links'=>$this->breadcrumbs,
                    'homeLink' => CHtml::link('', Yii::app()->homeUrl),
                    'separator' => ' > ',
            )); ?><!-- breadcrumbs -->
    <?php endif?>

    </div>
  </div>  
  <?php echo $content;?>
  <div class="footer">® 2012 Todos los derechos reservados a Falabella S.A.</div>
  <!--Thumbnail Navigation-->
  <div id="prevthumb"></div>
  <div id="nextthumb"></div>
  <!--Arrow Navigation-->
  <?php if($this->home==false){?><a href="<?php if($this->izq!='index')echo $this->createUrl($this->izq,array('id'=>$this->paramIzq));else echo Yii::app()->baseUrl;?>" id="prevslide" class="load-item"></a><?php }?><a href="<?php if($this->der!='index')echo $this->createUrl($this->der,array('id'=>$this->paramDer));else echo Yii::app()->baseUrl;?>" id="nextslide" class="load-item"></a> </div>
<div id="fullscreen">
    <div id="backgroundImage">
        <div id="homebg maximage" style="visibility: visible; opacity: 1; ">
            <table cellpadding="0" cellspacing="0">
            <tbody><tr>
              <td>
                <img src="<?php echo $this->imagenfondo?>"/>
              </td>
            </tr>
          </tbody></table>          
        </div>
  </div>
</div>
<script type="text/javascript" charset="utf-8">
$(function(){
	// Trigger maximage
	jQuery('#maximage').maximage({
		cssBackgroundSize: false,
		backgroundSize: function( $item ){
			// Contain Portrait
			if ($item.data('h') > $item.data('w')) {
				if ($.Window.data('w') / $.Window.data('h') < $item.data('ar')) {
					$item
						.height(($.Window.data('w') / $item.data('ar')).toFixed(0))
						.width($.Window.data('w'));
				} else {
					$item
						.height($.Window.data('h'))
						.width(($.Window.data('h') * $item.data('ar')).toFixed(0));
				}
			} else {
				if ($.Window.data('w') / $.Window.data('h') < $item.data('ar')) {
					$item
						.height($.Window.data('h'))
						.width(($.Window.data('h') * $item.data('ar')).toFixed(0));
				} else {
					$item
						.height(($.Window.data('w') / $item.data('ar')).toFixed(0))
						.width($.Window.data('w'));
				}
			}
		}
	});
});
</script>

</body>
</html>