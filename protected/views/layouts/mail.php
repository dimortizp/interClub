
<html xmlns:fb="http://ogp.me/ns/fb#" xml:lang="es" lang="es">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title><?php echo CHtml::encode($this->pageTitle); ?></title>
<meta http-equiv="content-language" content="es">
<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/styles.css" type="text/css" media="screen" />
<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/reset.css" type="text/css" media="screen" />	
</head>

<body id="home" onload="window._pulsarDocLoad=true">
<div id="main_wrapper">
  <div class="content">
      <?php echo $content ?>
 </div>
  <div class="footer">® 2012 Todos los derechos reservados a Falabella S.A.</div>
  <!--Thumbnail Navigation-->
  <div id="prevthumb"></div>
  <div id="nextthumb"></div>
  <!--Arrow Navigation-->

</body>
</html>