<?php

class RondaController extends Controller
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
		//set_time_limit(0);
		$model=new Ronda;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Ronda']))
		{                    
		
		
                    $datos=$_POST['Ronda']; 
					$aux1 = (string)$datos['K_IDTORNEO'];	
					$aux2 = (string)$datos['Q_NUMERORONDA'];						
                    $id=$aux1.$aux2;
					$res=(int)$id;
						
					$modelo=Torneo::model()->findByPk($datos['K_IDTORNEO']);
				
					$control=0;	
					$cont=($modelo->Q_PARTICIPANTES);
					while($cont>1){
						$cont=($cont/2);
					$control++;
					}
				if($datos['Q_NUMERORONDA']!=0){
					if($datos['Q_NUMERORONDA']<=$control){
			$parametros=$res.",".$datos['Q_NUMERORONDA'].",'".$datos['I_ESTADORONDA']."',".$datos['K_IDTORNEO'];
          if(Yii::app()->db->createCommand("insert into ronda values(".$parametros.")")->query());
				$this->redirect(array('view','id'=>$model->K_IDRONDA));}
				else {
				if($control==0){
		 Yii::app()->clientScript->registerScript(1, 'alert("Solo hay un participante")');
				}
				else{
				 Yii::app()->clientScript->registerScript(1, 'alert("Hay un numero maximo de rondas para el torneo seleccionado")');	
				}
				}}
				else{
				 Yii::app()->clientScript->registerScript(1, 'alert("El numero de la ronda debe ser mayor a cero")');	
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

		if(isset($_POST['Ronda']))
		{
			$model->attributes=$_POST['Ronda'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->K_IDRONDA));
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
		$dataProvider=new CActiveDataProvider('Ronda');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Ronda('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Ronda']))
			$model->attributes=$_GET['Ronda'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Ronda the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Ronda::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Ronda $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='ronda-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
