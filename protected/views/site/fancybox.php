<div class="wrapper_descarga">
  <div class="img_1"><div style="width: 216px; height: 162px; overflow: hidden;"><img src="<?php if ($promocion->custom_thumbnail)
                                     echo Yii::app()->request->baseUrl.'/images/promocional_images/thumbs/'.$promocion->custom_thumbnail;
                                else
                                     echo Yii::app()->request->baseUrl.'/images/_sys/img_noDisponible.png'; ?>" width="216" height="162" /></div>
                     <span>800 x 600</span>
                     
                     <a href="<?php if ($promocion->zip_background)
                                     echo Yii::app()->request->baseUrl.'/images/promocional_images/'.$promocion->zip_background;
                                else
                                     echo Yii::app()->request->baseUrl.'/images/_sys/img_noDisponible.png'; ?>" class="bot_descargar2"></a></div>

  <div class="img_2"><div style="width: 250px; height: 188px; overflow: hidden;"><img src="<?php if ($promocion->custom_background)
                                     echo Yii::app()->request->baseUrl.'/images/promocional_images/'.$promocion->custom_background;
                                else
                                     echo Yii::app()->request->baseUrl.'/images/_sys/img_noDisponible.png'; ?>" alt="" width="250" height="188" /></div> <span>1024 x 768</span> 
                     <a href="<?php if ($promocion->zip_thumbnail)
                                     echo Yii::app()->request->baseUrl.'/images/promocional_images/'.$promocion->zip_thumbnail;
                                else
                                     echo Yii::app()->request->baseUrl.'/images/_sys/img_noDisponible.png'; ?>" class="bot_descargar2"></a> </div>
  <div class="img_3"><div style="width: 279px; height: 210px; overflow: hidden;"><img src="<?php if ($promocion->custom_tercera)
                                     echo Yii::app()->request->baseUrl.'/images/promocional_images/'.$promocion->custom_tercera;
                                else
                                     echo Yii::app()->request->baseUrl.'/images/_sys/img_noDisponible.png'; ?>" alt="" width="279" height="210" /></div> <span>1280 x 800</span>
                     <a href="<?php if ($promocion->zip_tercera)
                                     echo Yii::app()->request->baseUrl.'/images/promocional_images/'.$promocion->zip_tercera;
                                else
                                     echo Yii::app()->request->baseUrl.'/images/_sys/img_noDisponible.png'; ?> " class="bot_descargar2"></a></div>
</div>