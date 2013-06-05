<?php

class SocioController extends Controller
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
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('*'),
				'users'=>array('@'),
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
		$model=new Socio;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Socio']))
		{
			try{
			$datos=$_POST['Socio'];
                        $parametros=$datos['K_CEDULA'].", '".$datos['F_AFILIACION']."'".", '".$datos['N_NACIONALIDAD']."'".", '".$datos['I_TIPOSOCIO']."'".", ".$datos['K_CATEGORIA'];
			if(Yii::app()->db->createCommand("insert into SOCIO values(".$parametros.")")->query()){
				if($datos["I_TIPOSOCIO"]=="C"){
                                    if(Yii::app()->db->createCommand("insert into CORTECIA values(".$datos['K_CEDULA'].")")->query()){
                                        $this->redirect(array('view','id'=>$model->K_CEDULA));
                                    }
                                }else if($datos["I_TIPOSOCIO"]=="R"){
                                    if(Yii::app()->db->createCommand("insert into REGULAR values(".$datos['K_CEDULA'].")")->query()){
                                        $this->redirect(array('/TarjetaCredito/create','id'=>$model->K_CEDULA));
                                    }
                                }
                        }
                    }catch(Exception $ex){
                        echo($ex->getMessage());   
                    }
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

		if(isset($_POST['Socio']))
		{
			$model->attributes=$_POST['Socio'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->K_CEDULA));
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
		$dataProvider=new CActiveDataProvider('Socio');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Socio('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Socio']))
			$model->attributes=$_GET['Socio'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Socio the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Socio::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Socio $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='socio-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
