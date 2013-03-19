<?php
$this->breadcrumbs = array(
    'PROMOCIÓN', Yii::t('ui',$promocion->titulo) => array('site/promocion', 'id'=>$promocion->idPromocional)
);
?>
<div class="content_descarga">
    <div class="descargar_imagen">
        <h2><?php echo $promocion->titulo?></h2>
        <div class="button_lines">
            <a class="button" href="<?php echo $promocion->url ?>"></a>
        </div>
        <?php
//create a link
        echo CHtml::link('Descargar imagen como fondo de pantalla', Yii::app()->createUrl('site/fancybox',array('id'=>$promocion->idPromocional)), array("id" => "fancy-link", "class" => "link_descargar fancybox"));

//put fancybox on page
        $this->widget('application.extensions.fancybox.EFancyBox', array(
            'target' => 'a#fancy-link',
            'config' => array(
                
                'overlayShow'=>'false',
                'overlayColor'=>'#FFF',
                'overlayOpacity'=>'0'

            ),
        ));
        ?> 

    </div>
</div>