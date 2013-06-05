<?php

class TorneoController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view','index1'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update','index1'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Torneo;
 		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Torneo']))
		{   
                    $datos=$_POST['Torneo'];  
                    $fecha_inicio=$this->actionFecha($datos['F_INICIO']);
                    $fecha_final=$this->actionFecha($datos['F_FINAL']);
             
                if($fecha_inicio<=$fecha_final){
		
                  $date = time();
                $fecha = date("d m Y",$date) ;
                $fecha_auxiliar=str_replace(' ','-',$fecha);
                $fecha_dia=strtotime($fecha_auxiliar);
                 $estado =$datos['I_ESTADOTORNEO'];
 		 if($fecha_final>=$fecha_dia){
                      if($fecha_inicio>$fecha_dia){
                          if($estado=='A'){
                        $parametros=$datos['K_IDTORNEO'].",'".$datos['F_INICIO']."', '".$datos['F_FINAL']."','".$datos['I_ESTADOTORNEO']."',".$datos['K_IDCATEGORIA'].",".$datos['Q_PARTICIPANTES'];
                          Yii::app()->db->createCommand("insert into torneo values(".$parametros.")")->query(); 
                            $this->redirect(array('view','id'=>$model->K_IDTORNEO));}
                        else{
      Yii::app()->clientScript->registerScript(1, 'alert("El estado Abierto(A) no corresponde al intervalo de la fecha")');                          
                            }
                      }
                      else{
                            if($estado=='J'){
                           $parametros=$datos['K_IDTORNEO'].",'".$datos['F_INICIO']."', '".$datos['F_FINAL']."', 'J' ,".$datos['K_IDCATEGORIA'].",".$datos['Q_PARTICIPANTES'];
 Yii::app()->db->createCommand("insert into torneo values(".$parametros.")")->query(); 
            $this->redirect(array('view','id'=>$model->K_IDTORNEO));
                            }
                            else{
      Yii::app()->clientScript->registerScript(1, 'alert("El estado en Juego(J) no corresponde al intervalo de la fecha")');                          
                            }
                      } 

		} 
		else {
                     if($estado=='F'){
        $parametros=$datos['K_IDTORNEO'].",'".$datos['F_INICIO']."', '".$datos['F_FINAL']."','F',".$datos['K_IDCATEGORIA'].",".$datos['Q_PARTICIPANTES'];
 Yii::app()->db->createCommand("insert into torneo values(".$parametros.")")->query();
  $this->redirect(array('view','id'=>$model->K_IDTORNEO));
 	  }
             else{
      Yii::app()->clientScript->registerScript(1, 'alert("El estado torneo Finalizado(F) no corresponde al intervalo de la fecha")');                          
                            }
                }
				}					  
                        else {
	Yii::app()->clientScript->registerScript(1, 'alert("La fecha final debe ser mayor a la inicial")');
                    }        
                }
		$this->render('create',array(
			'model'=>$model,
		));
	
        }

	/*
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
        
        public function actionFecha($fecha){
            $valoresfecha = explode ("/",$fecha);  
                $diafecha   = $valoresfecha[0];  
                $mesfecha  = $valoresfecha[1];  
                $anyofecha   = "20".$valoresfecha[2]; 
                  $listofecha=$diafecha."-".$mesfecha."-".$anyofecha;
                 $fecha_final=strtotime($listofecha);
                 return $fecha_final;
        }
        
	public function actionUpdate($id)
	{
	
		$model=$this->loadModel($id);
                $estado=$model->I_ESTADOTORNEO;
                $fechai=$model->F_INICIO;
                $fechaf=$model->F_FINAL;
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		   
		if(isset($_POST['Torneo']))
		{  
                    $model->attributes=$_POST['Torneo'];
                 $fecha_inicio=$this->actionFecha($model->attributes['F_INICIO']);
                $fecha_final=$this->actionFecha($model->attributes['F_FINAL']);
                $date = time();
                $fecha = date("d m Y",$date) ;
                $fecha_auxiliar=str_replace(' ','-',$fecha);
                $fecha_dia=strtotime($fecha_auxiliar);
                     if($estado=='A'){ 
                     if($model->attributes['I_ESTADOTORNEO']=='A'){
                        if($fecha_inicio>$fecha_dia){
                    
  Yii::app()->clientScript->registerScript(1, 'alert("si entrol")');
                     
	    if($fecha_inicio<=$fecha_final){
			if($model->save())
				$this->redirect(array('view','id'=>$model->K_IDTORNEO));
            }
                     }
                     else {
                          $model->I_ESTADOTORNEO='A';
	 Yii::app()->clientScript->registerScript(1, 'alert("La fecha inicial debe ser mayor a la actual")');
                } 
                 }
              
                 else if($model->attributes['I_ESTADOTORNEO']=='J'){
                        if($fechai==$model->attributes['F_INICIO']){
                     if($fecha_inicio<$fecha_dia){
                 if($fecha_inicio<=$fecha_final){
			if($model->save())
				$this->redirect(array('view','id'=>$model->K_IDTORNEO));
                        }
                  }
                  else{
                       $model->I_ESTADOTORNEO='A';
          Yii::app()->clientScript->registerScript(1, 'alert("El torneo todavia no puede estar en juego(j) la fecha de inicio es mayor a la fecha actual")');
                  }
                     }
                     
                     else {
                          $model->I_ESTADOTORNEO='A';
	 Yii::app()->clientScript->registerScript(1, 'alert("La fecha inicial no puede cambiar ")');
                } 
                 }
                 
                 else if($model->attributes['I_ESTADOTORNEO']=='F'){
                      if(($fechai==$model->attributes['F_INICIO'])&&($fechaf==$model->attributes['F_FINAL'])){
                          if($fecha_final<$fecha_dia){
               
			if($model->save())
				$this->redirect(array('view','id'=>$model->K_IDTORNEO));
                        
                  }
                  else{
                       $model->I_ESTADOTORNEO='A';
          Yii::app()->clientScript->registerScript(1, 'alert("El torneo todavia no puede estar finalizado(F) la fecha final es mayor a la fecha actual")');
                  } 
               }     
                 }
                  else{
                       $model->I_ESTADOTORNEO='A';
                      Yii::app()->clientScript->registerScript(1, 'alert("Solo hay 3 estados disponibles (F),(A)y (J)")');   
                 }
                    }   
        
                                
                 else if($estado=='J'){                   
             if($model->attributes['I_ESTADOTORNEO']!='F'){
                 
                   if($model->attributes['I_ESTADOTORNEO']=='J'){
                      if(($fecha_final>$fecha_dia)&&($fecha_final>$fecha_inicio)){
                             if($model->save())
				$this->redirect(array('view','id'=>$model->K_IDTORNEO));
                      }
                       
                   }
                     else{
                           $model->I_ESTADOTORNEO='J';
                     Yii::app()->clientScript->registerScript(1, 'alert("Este torneo solo se puede actualizar a finalizado")');
                     } 
                     
             }
                 else{
                       if($fechaf==$fecha_final){
                          if($fecha_final<$fecha_dia){
                                 if($model->save())
				$this->redirect(array('view','id'=>$model->K_IDTORNEO));
                                     }
                     else{
                  $model->I_ESTADOTORNEO='J';
                        Yii::app()->clientScript->registerScript(1, 'alert("El torneo no a terminado la fecha final es mayor a la actual")');
                       }
                       }
                       else{
               $model->I_ESTADOTORNEO='J';
          Yii::app()->clientScript->registerScript(1, 'alert("Si va seleccionar estado finalizado la fecha no puede ser modificada")');       
                       }
                            
                 }                
                        
                 }         
                
                }
                $this->render('update',array(
			'model'=>$model,
		));

		
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Torneo');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	
        public function actionIndex1()
	{
            $model=new Torneo('searchj');
            $model->unsetAttributes();
            if(isset($_GET['Torneo'])){
                $model->attributes=$_GET['Torneo'];
            }
                
		//$dataProvider=new CActiveDataProvider('Torneo');
		$this->render('index1',array(
			//'dataProvider'=>$dataProvider,
                    'model'=>$model,
		));
	}
        /**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Torneo('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Torneo']))
			$model->attributes=$_GET['Torneo'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Torneo the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Torneo::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Torneo $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='torneo-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
