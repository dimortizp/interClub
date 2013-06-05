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
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
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
          if($datos['F_INICIO']<=$datos['F_FINAL']){
		 $date = time();
		 $fecha = date("d m Y",$date) ;
		 if($datos['F_FINAL']>=$fecha){
                      if($datos['F_INICIO']>$fecha){
                        //$parametros=$datos['K_IDTORNEO'].",'".$datos['F_INICIO']."', '".$datos['F_FINAL']."', 'A' ,".$datos['K_IDCATEGORIA'].",".$datos['Q_PARTICIPANTES'];   // en mi modelo no tengo participantes  modificado por Rafael
                        $parametros=$datos['K_IDTORNEO'].",'".$datos['F_INICIO']."', '".$datos['F_FINAL']."', 'A' ,".$datos['K_IDCATEGORIA'];
                            if(Yii::app()->db->createCommand("insert into torneo values(".$parametros.")")->query());  
                            $this->redirect(array('view','id'=>$model->K_IDTORNEO));
                      }
                      else{
                        //$parametros=$datos['K_IDTORNEO'].",'".$datos['F_INICIO']."', '".$datos['F_FINAL']."', 'J' ,".$datos['K_IDCATEGORIA'].",".$datos['Q_PARTICIPANTES'];    // en mi modelo no tengo participantes modificado por Rafael 
                        $parametros=$datos['K_IDTORNEO'].",'".$datos['F_INICIO']."', '".$datos['F_FINAL']."', 'J' ,".$datos['K_IDCATEGORIA'];
                            if(Yii::app()->db->createCommand("insert into torneo values(".$parametros.")")->query());  
                            $this->redirect(array('view','id'=>$model->K_IDTORNEO));
                      } 

		} 
		else {
                    $parametros=$datos['K_IDTORNEO'].",'".$datos['F_INICIO']."', '".$datos['F_FINAL']."','F',".$datos['K_IDCATEGORIA'].",".$datos['Q_PARTICIPANTES'];
                    if(Yii::app()->db->createCommand("insert into torneo values(".$parametros.")")->query());
                } 
				}					  
                        else {
                      echo '<script>alert("La fecha final debe ser despues a la inicial")</script>';  }        
                }
		$this->render('create',array(
			'model'=>$model,
		));
	
        }

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Torneo']))
		{  
                       $model->attributes=$_POST['Torneo'];
            if($model->attributes['F_INICIO']<=$model->attributes['F_FINAL']){
			if($model->save())
				$this->redirect(array('view','id'=>$model->K_IDTORNEO));
            }
             else {
                      echo '<script>alert("La fecha final debe ser menor a la inicial")</script>';  }        
		
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

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Torneo');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
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
