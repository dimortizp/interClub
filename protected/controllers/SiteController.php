<?php

Yii::import('application.vendors.*');
Yii::import('ext.yii-mail.YiiMailMessage');
require_once 'instagram/Instagram.php';

class SiteController extends Controller {

    /**
     * Declares class-based actions.
     */

            public $destinos, $paquetes;
    public $destinosMenus, $cantidadDestinos, $paquetesMenus, $cantidadPaquetes, $img;
    public $imagenfondo;
    public $izq, $der, $paramIzq, $paramDer, $home = false;

    public function actions() {

        return array(
            // captcha action renders the CAPTCHA image displayed on the contact page
            'captcha' => array(
                'class' => 'CCaptchaAction',
                'backColor' => 0xFFFFFF,
            ),
            // page action renders "static" pages stored under 'protected/views/site/pages'
            // They can be accessed via: index.php?r=site/page&view=FileName
            'page' => array(
                'class' => 'CViewAction',
            ),
        );
    }

    /**
     * This is the default 'index' action that is invoked
     * when an action is not explicitly requested by users.
     */
    public function actionIndex() {
        // renders the view file 'protected/views/site/index.php'
        // using the default layout 'protected/views/layouts/main.php'
        $this->home = true;
        $this->iniciarMenu();
        $fondo = new ImagenPaquete;
        $fondo = $fondo->getFondoHome();
        $this->cargarImagen('images/paquetes_images/media/' . $fondo[0]->archivo);
        $promociones = Promocional::model()->findAll();
        if ($promociones[0]->titulo != '')
            $this->definirNavegacion('index', 'site/promocion', null, $promociones[0]->idPromocional);
        else
            $this->definirNavegacion('index', 'site/plan', null, $this->destinosMenus[0]->paquetes[0]->idPaquete);
        $this->layout = 'interna';
        $this->render('index', array('menu' => $this->destinosMenus, 'promocion' => $promociones));
    }

    public function actionPlan($id = 0, $enviado = false) {
        if ($id != 0) {
            $model = new Promocional;
            $promo = $model->findAll();
            $model = new Paquetes();
            $plan = $model->findByPk($id);
            $moneda = explode('$', $plan->valor);
            $monedas = $moneda[0];
            $valor = $moneda[1];
            //REQUERIDOS PARA FORMULARIOS
            $reservo = 0;
            $confirmation = '';

            $this->iniciarMenu();
            $this->cargarImagen('images/paquetes_images/' . $plan->background);
            $posDestino = 0;
            $posPaquete = 0;
            for ($i = 0; $i < $this->cantidadDestinos; $i++) {
                if ($this->destinosMenus[$i]->idDestino == $plan->destinos_idDestino) {
                    $posDestino = $i;
                    for ($j = 0; $j < count($this->destinosMenus[$i]->paquetes); $j++) {
                        if ($this->destinosMenus[$i]->paquetes[$j]->idPaquete == $id) {
                            $posPaquete = $j;
                        }
                    }
                }
            }
            $posPaqueteDer = $posPaquete + 1;
            $posDestinoDer = $posDestino;
            if ($posPaqueteDer >= count($this->destinosMenus[$posDestinoDer]->paquetes)) {
                $posPaqueteDer = 0;
                $posDestinoDer = $posDestino + 1;
                if ($posDestinoDer >= count($this->destinosMenus)) {
                    $derRuta = 'index';
                    $derValor = null;
                } else {
                    $derRuta = 'site/plan';
                    while ($this->destinosMenus[$posDestinoDer]->paquetes[$posPaqueteDer]->nombre == ''&&$posDestinoDer < count($this->destinosMenus))
                        $posDestinoDer++;
                    if($posDestinoDer < count($this->destinosMenus))
                        $derValor = $this->destinosMenus[$posDestinoDer]->paquetes[$posPaqueteDer]->idPaquete;
                    else{
                        $derRuta = 'index';
                        $derValor = null;
                    }
                }
            } else {
                $derRuta = 'site/plan';
                $derValor = $this->destinosMenus[$posDestinoDer]->paquetes[$posPaqueteDer]->idPaquete;
            }

            $posPaqueteIzq = $posPaquete - 1;
            $posDestinoIzq = $posDestino;
            if ($posPaqueteIzq < 0) {
                $posDestinoIzq = $posDestino - 1;
                if ($posDestinoIzq < 0) {
                    $izqRuta = 'site/promocion';
                    $izqValor = $promo[count($promo) - 1]->idPromocional;
                } else {
                    $izqRuta = 'site/plan';
                    while ($this->destinosMenus[$posDestinoIzq]->paquetes[count($this->destinosMenus[$posDestinoIzq]->paquetes) - 1]->nombre == ''&&$posDestinoIzq>=0)
                        $posDestinoIzq--;
                    if($posDestinoIzq >= 0)
                        $izqValor = $this->destinosMenus[$posDestinoIzq]->paquetes[$posPaqueteIzq]->idPaquete;
                    else{
                        $izqRuta = 'site/promocion';
                        $izqValor = $promo[count($promo) - 1]->idPromocional;
                    }
                    $izqValor = $this->destinosMenus[$posDestinoIzq]->paquetes[count($this->destinosMenus[$posDestinoIzq]->paquetes) - 1]->idPaquete;
                }
            } else {
                $izqRuta = 'site/plan';
                $izqValor = $this->destinosMenus[$posDestinoIzq]->paquetes[$posPaqueteIzq]->idPaquete;
            }

            $this->definirNavegacion($izqRuta, $derRuta, $izqValor, $derValor);

            $reserva = new Reservas;


            if (isset($_POST['Reservas'])) {
                $reserva->attributes = $_POST['Reservas'];

                $reserva->paquetes_idPaquete = $plan->idPaquete;
                $reserva->fecha_formulario = Yii::app()->dateFormatter->formatDateTime(time(), 'short');

                if ($reserva->validate()) {
                    $reservo = 3;

                    if ($this->sendFormulario($reserva)) {
                        $reserva->save();
                        $confirmation = '<span>Gracias por tu interés en Viajar es muy Facil. Ya estamos procesando tu solicitud, nuestros asesores te contactarán para hacer efectiva tu reserva o comunícate en Bogotá al
    <br>
    587 77 72 y a nivel nacional al
    <br>
    01 8000 111 853.
    <br>
    Revisa el correo electrónico registrado ' . $reserva->email . '
    <br>
    para verificar la información de tu solicitud
    </span>'
                        ;

                        $reserva = new Reservas;
                    } else {
                        $confirmation = "_ERROR. No se ha podido enviar el formulario. Intentelo de nuevo.";
                    }
//               $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('plan','id'=>$plan->idPaquete, 'mail'=>$reserva->email));
                } else {
                    $reservo = 2;
                    $reserva->forma_pago = null;
                    $reserva->ciudad = null;
                }
            }
            $intag = $this->getInstagramImages(trim($plan->hashtag));
            if ($intag == "")
                $intag = array();
            $this->layout = 'interna';
            if ($enviado) {
                $reservo = 3;
                $confirmation = "El correo se ha enviado correctamente";
            }
//        print_r($this->destinosMenus);die();
            $this->render('plan', array('menu' => $this->destinosMenus, 'model' => $plan, 'moneda' => $monedas, 'valor' => $valor, 'reserva' => $reserva, 'reservo' => $reservo, 'confirmation' => $confirmation, 'instag' => $intag, 'idPlan' => $id));
        } else {
            $this->redirect($this->createUrl('site/index'));
        }
    }

    public function actionPromocion($id) {
        $this->iniciarMenu();
        $model = new Promocional;
        $promo = $model->findAll();
        $aux = 0;
        for ($i = 0; $i < count($promo); $i++) {
            if ($promo[$i]->idPromocional == $id) {
                if ($i == 0 && count($promo) - $i == 1)
                    $this->definirNavegacion('index', 'site/plan', null, $this->destinosMenus[0]->paquetes[0]->idPaquete);
                else if ($i == 0)
                    $this->definirNavegacion('index', 'site/promocion', null, $promo[($i + 1)]->idPromocional);
                else if ($i == (count($promo) - 1))
                    $this->definirNavegacion('site/promocion', 'site/plan', $promo[$i - 1]->idPromocional, $this->destinosMenus[0]->paquetes[0]->idPaquete);
                else
                    $this->definirNavegacion('site/promocion', 'site/promocion', $promo[$i - 1]->idPromocional, $promo[$i + 1]->idPromocional);
                $aux = $i;
            }
        }
        $this->cargarImagen('images/promocional_images/' . $promo[$aux]->custom_background);
        $this->layout = 'interna';
        $this->render('promocion', array('promocion' => $promo[$aux]));
    }

    public function actionRecomendar($id) {
        if ($_POST['Recomendar']) {
            $Recomendar = $_POST['Recomendar'];
            $msg='<div style="padding:20px;width:460px;float:left"><p><span style="font-size:14px;font-weight:bold">¡'.$Recomendar['nombreD'].'!</span></p><p>&nbsp;</p><p>'.$Recomendar['nombreS'].' te recomienda <span style="font-size:14px;font-weight:bold;color:#666"> <a href="'.$this->createAbsoluteUrl('site/plan',array('id'=>$id)).'" style="color:#666" target="_blank">'.$this->createAbsoluteUrl('site/plan',array('id'=>$id)).'</a></span></p><p>'.$Recomendar['msg'].'</p><div class="yj6qo"></div><div class="adL"></div></div>';
            $message = new YiiMailMessage;
            $message->setBody($msg, 'text/html');
            $message->subject = "Recomendacion Viajes Falabella ";
            $message->addTo($Recomendar['mailD']);
            $message->from = $Recomendar['mailS'];
            if (Yii::app()->mail->send($message))
                $this->redirect($this->createUrl('site/plan', array('id' => $id, 'enviado' => true)));
        }
        $this->layout = 'blank';
        $this->render('recomendar', array('id' => $id));
    }

    public function actionFancybox($id) {
        $this->layout = 'fancy';
        $datos = Promocional::model()->findByPk($id);

        $this->render('fancybox', array('promocion'=>$datos));
    }
    
     public function actionTerminos() {
//        $this->layout = 'blank';
         
        $datos = Terminos::model()->findAll();
        $datos = $datos[0];
        
        $this->renderPartial('terminos', array('terminos'=>$datos));
    }


    public function definirNavegacion($izq, $der, $paramIzq, $paramDer) {
        $this->izq = $izq;
        $this->der = $der;
        $this->paramIzq = $paramIzq;
        $this->paramDer = $paramDer;
    }

    /**
     * This is the action to handle external exceptions.
     */
    public function actionError() {
        if ($error = Yii::app()->errorHandler->error) {
            if (Yii::app()->request->isAjaxRequest)
                echo $error['message'];
            else
                $this->render('error', $error);
        }
    }

    /**
     * Displays the contact page
     */
    public function actionContact() {
        $model = new ContactForm;
        if (isset($_POST['ContactForm'])) {
            $model->attributes = $_POST['ContactForm'];
            if ($model->validate()) {
                $name = '=?UTF-8?B?' . base64_encode($model->name) . '?=';
                $subject = '=?UTF-8?B?' . base64_encode($model->subject) . '?=';
                $headers = "From: $name <{$model->email}>\r\n" .
                        "Reply-To: {$model->email}\r\n" .
                        "MIME-Version: 1.0\r\n" .
                        "Content-type: text/plain; charset=UTF-8";

                mail(Yii::app()->params['adminEmail'], $subject, $model->body, $headers);
                Yii::app()->user->setFlash('contact', 'Thank you for contacting us. We will respond to you as soon as possible.');
                $this->refresh();
            }
        }
        $this->render('contact', array('model' => $model));
    }

    /**
     * Displays the login page
     */
    public function actionLogin() {
        $model = new LoginForm;

        // if it is ajax validation request
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'login-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }

        // collect user input data
        if (isset($_POST['LoginForm'])) {
            $model->attributes = $_POST['LoginForm'];
            // validate user input and redirect to the previous page if valid
            if ($model->validate() && $model->login())
                $this->redirect(Yii::app()->user->returnUrl);
        }
        // display the login form
        $this->render('login', array('model' => $model));
    }

    /**
     * Logs out the current user and redirect to homepage.
     */
    public function actionLogout() {
        Yii::app()->user->logout();
        $this->redirect(Yii::app()->homeUrl);
    }

    /**
     * IniciarMenu.
     */
    public function iniciarMenu() {
        $this->destinos = new Destinos;
        $this->destinosMenus = $this->destinos->getDestinos();
        $this->cantidadDestinos = count($this->destinosMenus);
    }

    /**
     * Carga imagen del fondo.
     */
    public function cargarImagen($imagen) {
        $this->imagenfondo = Yii::app()->request->baseUrl . '/' . $imagen;
        $this->img=$imagen;
    }

    public function getInstagramImages($tag) {
        $config = array(
            'client_id' => '8713acccc15a4caf89847bb809e1c14c',
            'client_secret' => 'c477ccdacf7c4414a73f7ea758bbc21d',
            'grant_type' => 'authorization_code',
            'redirect_uri' => 'http://www.mwonline.com.co/falabella/_yii/fotos.php',
        );
        $instagram = new Instagram($config);
        $instagram->setAccessToken("195997246.8713acc.b564f3a01299489cb1528658c5f837b4");
        $infoFotos = $instagram->getRecentTags($tag);
        $jsonFotos = json_decode($infoFotos);
        $arrayFotosJson = $jsonFotos->data;
        return $arrayFotosJson;
    }

    public function getItemsGaleria($id) {


        $qProvider = Yii::app()->db->createCommand('SELECT * FROM imagen_paquete WHERE paquetes_idPaquete =' . $id)->queryAll();
//      print_r($qProvider);

        $array_galeria = array();

        if (!empty($qProvider)) {

            foreach ($qProvider as $key => $value) {

                if ($value['image_type'] == 0) {
                    $array_galeria[$key] = array(Yii::app()->request->baseUrl . '/images/paquetes_images/media/' . $value['archivo'] . '', $value['image_type'], $value['descripcion']);
                } elseif ($value['image_type'] == 1) {
                    $array_galeria[$key] = array($value['url'], $value['image_type'], $value['descripcion']);
                }
            }
            return $array_galeria;
        }else
            return null;
    }

    public function actionItemsTienda() {

            $data = DondePago::model()->findAll('ciudad=:ciudad', array(':ciudad'=> $_POST['ciudad']));
            $data = CHtml::listData($data,'idDondePago','nombre');
            $dropDownTiendas = "<option value=''>Seleccione Tienda</option>"; 
            foreach($data as $value=>$name)
                $dropDownTiendas .= CHtml::tag('option', array('value'=>$value),CHtml::encode($name),true);
 
            // return data (JSON formatted)
            echo CJSON::encode(array(
              'dropDownTiendas'=>$dropDownTiendas,
             
            ));

    }

    public function sendFormulario(Reservas $datos) {

        $message = new YiiMailMessage;

        $message->view = 'envioFormulario';

      
        $message->setBody(array('datos'=>$datos), 'text/html');
        $message->subject = "Viajes Falabella - CONFIRMACION RESERVA PLAN: " . $datos->paquetesIdPaquete->nombre;
        $message->addTo($datos->email);

        if(!empty ($datos->dondePagoIdDondePago->email)){
        $email_tienda = $this->parseTextForEmail($datos->dondePagoIdDondePago->email);
        $email_tienda = $email_tienda[valid_email];

            foreach($email_tienda as $key => $email){
                $message->addCc($email);

            }

        }

        $message->from = Yii::app()->params['adminEmail'];

        if (Yii::app()->mail->send($message))
            return true; else
            return false;
    }


    public function parseTextForEmail($text) {
            $email = array();
            $invalid_email = array();

            $text = ereg_replace("[^A-Za-z._0-9@ ]"," ",$text);

            $token = trim(strtok($text, " "));

            while($token !== "") {

                    if(strpos($token, "@") !== false) {

                            $token = ereg_replace("[^A-Za-z._0-9@]","", $token);

                            //checking to see if this is a valid email address
                            if($this->is_valid_email($email) !== true) {
                                    $email[] = strtolower($token);
                            }
                            else {
                                    $invalid_email[] = strtolower($token);
                            }
                    }

                    $token = trim(strtok(" "));
            }

            $email = array_unique($email);
            $invalid_email = array_unique($invalid_email);

            return array("valid_email"=>$email, "invalid_email" => $invalid_email);

    }

    public function is_valid_email($email) {
            if (eregi("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.([a-z]){2,4})$",$email)) return true;
            else return false;
    }



}