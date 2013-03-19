<?php /* @var $this Controller */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />

	<!-- blueprint CSS framework -->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print" />
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection" />
	<![endif]-->

	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>

<div class="container" id="page">
        <?php $this->widget('bootstrap.widgets.TbNavbar', array(
    'type'=>'null', // null or 'inverse'
    'brand'=>'Viajes Falabella',
    'brandUrl'=>Yii::app()->request->baseUrl,
    'collapse'=>true, // requires bootstrap-responsive.css
    'items'=>array(
       
       array(
            'class'=>'bootstrap.widgets.TbMenu',
            'htmlOptions'=>array('class'=>'pull-right'),
            'items'=>array(
                array('label'=>'Manual', 'url'=>'#'),
                '---',
                array('label'=>'Bienvenido '.Yii::app()->user->name, 'url'=>'#', 'items'=>array(
                    array('url'=>Yii::app()->getModule('user')->profileUrl,'icon'=>'user', 'label'=>Yii::app()->getModule('user')->t("Profile"), 'visible'=>!Yii::app()->user->isGuest),
                    array('url'=>Yii::app()->getModule('user')->logoutUrl, 'label'=>Yii::app()->getModule('user')->t("Logout").' ('.Yii::app()->user->name.')', 'visible'=>!Yii::app()->user->isGuest),
                   
                )),
            ),
        ),
    ),
     
)); 
        ?>

	<div style="height: 35px;">

	</div><!-- mainmenu -->
	 <?php if(isset($this->breadcrumbs)):?>
		<?php $this->widget('bootstrap.widgets.TbBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
		)); ?><!-- breadcrumbs -->
	<?php endif?>
        <div class="clear"></div>

	<div id="content" style="text-align:center; margin-left:30%; margin-right:30%;">
	<?php echo $content; ?>
</div>

        <div class="clear"></div>
	<div id="footer">
		Copyright &copy; <?php echo date('Y'); ?> by MC Activa.<br/>
		All Rights Reserved. Todos los derechos reservados.<br/>
		
	</div><!-- footer -->

</div><!-- page -->

</body>
</html>