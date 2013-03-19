<div class="content">
    <div class="texto_home1">Grandes<br />
    descuentos <span class="tit_catalogo">Catálogo <span class="tit_virtual">Virtual</span></span></div>
    <a href="http://www.viajesfalabella.com" target="_blank" class="texto_home2"></a>
    <div class="content1">
      <h1>NUESTROS <span>DESTINOS</span></h1>
      <?php
          $contadorOpciones = 0;
          $cantPromociones = count($promocion);
          $cantOpciones = count($menu);
          $total = $cantPromociones+$cantOpciones;
          for($i=0;$i<$cantPromociones;$i=$i+2){
              echo '<div class="tit_plan_home">';
              echo '<a href="'.$this->createUrl('site/promocion',array('id'=>$promocion[$i]->idPromocional)).'" class="destino_home">'.$promocion[$i]->titulo.'</a>';
              if($cantPromociones-$i!=1)  
                echo '<a href="'.$this->createUrl('site/promocion',array('id'=>$promocion[$i+1]->idPromocional)).'" class="destino_home">'.$promocion[$i+1]->titulo.'</a>';
              else
                echo '<a href="'.$this->createUrl('site/plan',array('id'=>$menu[$contadorOpciones]->idDestino)).'" class="destino_home">'.$menu[$contadorOpciones]->nombre.'</a>';
              echo '</div>';
              echo '<div class="imgs_plan_home">';
              echo '<img src="'.Yii::app()->baseUrl.'/images/promocional_images/thumbs/'.$promocion[$i]->custom_thumbnail.'" width="148" height="99" />';
              if($cantPromociones-$i!=1) 
                echo '<img src="'.Yii::app()->baseUrl.'/images/promocional_images/thumbs/'.$promocion[$i+1]->custom_thumbnail.'" width="148" height="99" />';
              else{
                echo '<img src="'.Yii::app()->baseUrl.'/images/destinos_images/thumbs/'.$menu[$contadorOpciones]->thumbnail.'" width="148" height="99" />';
                $contadorOpciones++;  
              }
              echo '</div>';
          }
          for($contadorOpciones;$contadorOpciones<$cantOpciones;$contadorOpciones=$contadorOpciones+2){
              echo '<div class="tit_plan_home">';
              echo '<a href="'.$this->createUrl('site/plan',array('id'=>$menu[$contadorOpciones]->paquetes[0]->idPaquete)).'" class="destino_home">'.$menu[$contadorOpciones]->nombre.'</a>';
              if($cantOpciones-$contadorOpciones!=1)  
                echo '<a href="'.$this->createUrl('site/plan',array('id'=>$menu[$contadorOpciones+1]->paquetes[0]->idPaquete)).'" class="destino_home">'.$menu[$contadorOpciones+1]->nombre.'</a>';
              echo '</div>';
              echo '<div class="imgs_plan_home">';
              echo '<img src="'.Yii::app()->baseUrl.'/images/destinos_images/thumbs/'.$menu[$contadorOpciones]->thumbnail.'" width="148" height="99" />';
              if($cantOpciones-$contadorOpciones!=1)  
                echo '<img src="'.Yii::app()->baseUrl.'/images/destinos_images/thumbs/'.$menu[$contadorOpciones+1]->thumbnail.'" width="148" height="99" />';
              echo '</div>';
          }
      ?>
    </div>
</div>


