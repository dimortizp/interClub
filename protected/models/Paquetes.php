<?php

/**
 * This is the model class for table "paquetes".
 *
 * The followings are the available columns in table 'paquetes':
 * @property integer $idPaquete
 * @property string $nombre
 * @property string $background
 * @property string $thumbnail
 * @property string $valor
 * @property string $descripcion
 * @property integer $cant_cuotas
 * @property string $valor_cuotas
 * @property string $detalle_plan
 * @property string $info_general
 * @property string $clima
 * @property string $moneda
 * @property string $idioma
 * @property string $longitud
 * @property string $latitud
 * @property string $que_hacer
 * @property string $tips_viajero
 * @property string $hashtag
 * @property integer $weight_order
 * @property string $is_activa
 * @property integer $destinos_idDestino
 * @property integer $empresas_idEmpresa
 *
 * The followings are the available model relations:
 * @property ImagenPaquete[] $imagenPaquetes
 * @property Destinos $destinosIdDestino
 * @property Empresas $empresasIdEmpresa
 * @property Promocional[] $promocionals
 * @property Reservas[] $reservases
 */
class Paquetes extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Paquetes the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'paquetes';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
                        array('nombre, destinos_idDestino, empresas_idEmpresa', 'required', 'on'=> 'update,insert'),
			array('cant_cuotas, weight_order, destinos_idDestino, empresas_idEmpresa', 'numerical', 'integerOnly'=>true),
			array('nombre', 'length', 'max'=>150),
			array('background, thumbnail, valor, descripcion, valor_cuotas, moneda', 'length', 'max'=>50),
			array('clima, idioma', 'length', 'max'=>20),
			array('longitud, latitud', 'length', 'max'=>25),
			array('hashtag', 'length', 'max'=>40),
			array('is_activa', 'length', 'max'=>1),
			array('detalle_plan, info_general, que_hacer, tips_viajero', 'safe'),
			
                        array('background, thumbnail', 'file', 'types' => 'jpg, gif, png, jpeg', 'maxSize' => 1024 * 1024 * 0.5, 'tooLarge' => 'El archivo es de mas 500 KB. Por favor, subir uno mas ligero.', 'allowEmpty' => true, 'on' => 'update, insert'),
                        // The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idPaquete, nombre, background, thumbnail, valor, descripcion, cant_cuotas, valor_cuotas, detalle_plan, info_general, clima, moneda, idioma, longitud, latitud, que_hacer, tips_viajero, hashtag, weight_order, is_activa, destinos_idDestino, empresas_idEmpresa', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'imagenPaquetes' => array(self::HAS_MANY, 'ImagenPaquete', 'paquetes_idPaquete'),
			'destinosIdDestino' => array(self::BELONGS_TO, 'Destinos', 'destinos_idDestino'),
			'empresasIdEmpresa' => array(self::BELONGS_TO, 'Empresas', 'empresas_idEmpresa'),
			'promocionals' => array(self::HAS_MANY, 'Promocional', 'paquetes_idPaquete'),
			'reservases' => array(self::HAS_MANY, 'Reservas', 'paquetes_idPaquete')
			
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idPaquete' => 'Id Paquete',
			'nombre' => 'Nombre',
			'background' => 'Imagen de Fondo',
			'thumbnail' => 'Imagen miniatura',
			'valor' => 'Valor Total',
			'descripcion' => 'Descripcion',
			'cant_cuotas' => 'Cantidad de Cuotas',
			'valor_cuotas' => 'Valor X Cuota',
			'detalle_plan' => 'Detalles',
			'info_general' => 'Información General',
			'clima' => 'Clima',
			'moneda' => 'Moneda',
			'idioma' => 'Idioma',
			'longitud' => 'Longitud',
			'latitud' => 'Latitud',
			'que_hacer' => 'Que Hacer?',
			'tips_viajero' => 'Tips par el Viajero',
			'hashtag' => 'Hashtag',
			'weight_order' => 'orden',
			'is_activa' => 'Publicado',
			'destinos_idDestino' => 'Destino relacionado',
			'empresas_idEmpresa' => 'Empresa',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('idPaquete',$this->idPaquete);
		$criteria->compare('nombre',$this->nombre,true);
		$criteria->compare('background',$this->background,true);
		$criteria->compare('thumbnail',$this->thumbnail,true);
		$criteria->compare('valor',$this->valor,true);
		$criteria->compare('descripcion',$this->descripcion,true);
		$criteria->compare('cant_cuotas',$this->cant_cuotas);
		$criteria->compare('valor_cuotas',$this->valor_cuotas,true);
		$criteria->compare('detalle_plan',$this->detalle_plan,true);
		$criteria->compare('info_general',$this->info_general,true);
		$criteria->compare('clima',$this->clima,true);
		$criteria->compare('moneda',$this->moneda,true);
		$criteria->compare('idioma',$this->idioma,true);
		$criteria->compare('longitud',$this->longitud,true);
		$criteria->compare('latitud',$this->latitud,true);
		$criteria->compare('que_hacer',$this->que_hacer,true);
		$criteria->compare('tips_viajero',$this->tips_viajero,true);
		$criteria->compare('hashtag',$this->hashtag,true);
		$criteria->compare('weight_order',$this->weight_order);
		$criteria->compare('is_activa',$this->is_activa,true);
		$criteria->compare('destinos_idDestino',$this->destinos_idDestino);
		$criteria->compare('empresas_idEmpresa',$this->empresas_idEmpresa);

		return new CActiveDataProvider($this, array(
			'criteria' => $criteria,
                        'sort' => array(
                            'defaultOrder' => 'weight_order ASC, nombre ASC',
                        ),
                        'pagination' => array(
                            'pageSize' => 10
                        ),
		));
	}

        public function saveModelonUpdate($data = array(), $old_model_image, $old_model_background) {

        $this->attributes = $data;

        $myfile = CUploadedFile::getInstance($this, 'thumbnail');
        if (is_object($myfile) && get_class($myfile) === 'CUploadedFile') {
            $this->thumbnail = CUploadedFile::getInstance($this, 'thumbnail');
        } else {
            $this->thumbnail = $old_model_image;
}

        $myfile2 = CUploadedFile::getInstance($this, 'background');
        if (is_object($myfile2) && get_class($myfile2) === 'CUploadedFile') {
            $this->background = CUploadedFile::getInstance($this, 'background');
        } else {
            $this->background = $old_model_background;
        }


        if (!$this->save()) {
            //return CHtml::errorSummary($this);
            return false;
        } else {

            if ($this->thumbnail && is_object($myfile) && get_class($myfile) === 'CUploadedFile') {
                $rnd = dechex(rand() % 999999999);
                $ext = $this->thumbnail->getExtensionName();
                if (!$this->thumbnail->saveAs('images/paquetes_images/thumbs/img_' . $rnd . '.' . $ext)) {
                    $this->thumbnail = $old_model_image;
                    $this->save();
                } else {
                    $this->thumbnail = 'img_' . $rnd . '.' . $ext;
                    $this->save();
                    if ($old_model_image)
                        unlink('images/paquetes_images/thumbs/' . $old_model_image);
                }
            }

            if ($this->background && is_object($myfile2) && get_class($myfile2) === 'CUploadedFile') {
                $rnd = dechex(rand() % 999999999);
                $ext = $this->background->getExtensionName();
                if (!$this->background->saveAs('images/paquetes_images/img_' . $rnd . '.' . $ext)) {
                    $this->background = $old_model_background;
                    $this->save();
                } else {
                    $this->background = 'img_' . $rnd . '.' . $ext;
                    $this->save();
                    if ($old_model_background)
                        unlink('images/paquetes_images/' . $old_model_background);
                }
            }


        }

        return true;
    }

    public function saveModel($data = array()) {

        $myfile = CUploadedFile::getInstance($this, 'thumbnail');
        $myfile2 = CUploadedFile::getInstance($this, 'background');

        if (is_object($myfile) && get_class($myfile) === 'CUploadedFile')
            $data['thumbnail'] = CUploadedFile::getInstance($this, 'thumbnail');

        if (is_object($myfile2) && get_class($myfile2) === 'CUploadedFile')
            $data['background'] = CUploadedFile::getInstance($this, 'background');

        $model_count = Paquetes::model()->count();

        $this->attributes = $data;
        $this->weight_order = $model_count;

        if (!$this->save()) {
            //return CHtml::errorSummary($this);
            return false;
        } else {

            if ($this->thumbnail && is_object($myfile) && get_class($myfile) === 'CUploadedFile') {
                $rnd = dechex(rand() % 999999999);
                $ext = $this->thumbnail->getExtensionName();
                if (!$this->thumbnail->saveAs('images/paquetes_images/thumbs/img_' . $rnd . '.' . $ext)) {
                    $this->thumbnail = NULL;
                    $this->save();
                } else {
                    $this->thumbnail = 'img_' . $rnd . '.' . $ext;
                    $this->save();
                }
            }

            if ($this->background && is_object($myfile2) && get_class($myfile2) === 'CUploadedFile') {
                $rnd = dechex(rand() % 999999999);
                $ext = $this->background->getExtensionName();
                if (!$this->background->saveAs('images/paquetes_images/img_' . $rnd . '.' . $ext)) {
                    $this->background = NULL;
                    $this->save();
                } else {
                    $this->background = 'img_' . $rnd . '.' . $ext;
                    $this->save();
                }
            }

            return true;
        }
    }
    
     public function getDestinosNoPromocionales() {      
        return CHtml::listData(Destinos::model()->findAllByAttributes(array('is_promocional' => 0, 'is_activa' => 1), array('order'=>'nombre ASC')), 'idDestino', 'nombre');
    }
    
    public function getEmpresas() {     
        return CHtml::listData(Empresas::model()->findAll(array('order'=>'nombre ASC')), 'idEmpresa', 'nombre');
    }
    public function getListaPaquetes() {     
        return Paquetes::model()->findAll(array('order'=>'destinos_idDestino'));
    }
   
}