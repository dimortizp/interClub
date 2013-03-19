<?php

/**
 * This is the model class for table "promocional".
 *
 * The followings are the available columns in table 'promocional':
 * @property integer $idPromocional
 * @property string $titulo
 * @property string $url
 * @property string $custom_background
 * @property string $custom_thumbnail
 * @property string $custom_tercera
 * @property integer $paquetes_idPaquete
 * @property integer $destinos_idDestino
 *
 * The followings are the available model relations:
 * @property Destinos $destinosIdDestino
 * @property Paquetes $paquetesIdPaquete
 */
class Promocional extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Promocional the static model class
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
		return 'promocional';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
                        array('titulo, url', 'required'),
                        array('url', 'url', 'defaultScheme' => 'http'),
			array('paquetes_idPaquete, destinos_idDestino', 'numerical', 'integerOnly'=>true),
			array('titulo, url', 'length', 'max'=>150),
			array('custom_background, custom_thumbnail, custom_tercera, zip_background, zip_thumbnail,zip_tercera', 'length', 'max'=>50),
			array('custom_background, custom_thumbnail, custom_tercera', 'file', 'types' => 'jpg, gif, png, jpeg', 'maxSize' => 1024 * 1024 * 0.8, 'tooLarge' => 'El archivo es de mas 500 KB. Por favor, subir uno mas ligero.', 'allowEmpty' => true, 'on' => 'update, insert'),
			array('zip_background, zip_thumbnail,zip_tercera', 'file', 'types' => 'zip, rar', 'maxSize' => 1024 * 1024 * 0.8, 'tooLarge' => 'El archivo es de mas 500 KB. Por favor, subir uno mas ligero.', 'allowEmpty' => true, 'on' => 'update, insert'),

                        // The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idPromocional, titulo, custom_background, custom_thumbnail, url, paquetes_idPaquete, destinos_idDestino', 'safe', 'on'=>'search'),
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
			'destinosIdDestino' => array(self::BELONGS_TO, 'Destinos', 'destinos_idDestino'),
			'paquetesIdPaquete' => array(self::BELONGS_TO, 'Paquetes', 'paquetes_idPaquete'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idPromocional' => 'Id Promocional',
			'titulo' => 'Descripcion',
                        'url' => 'Url',
			'custom_background' => 'Imagen 1024 X 768 miniatura',
			'custom_thumbnail' => 'Imagen Principal 800X600 miniatura',
                        'custom_tercera' => 'Imagen 1280 x 800 miniatura',
                        'zip_background' => 'Imagen 1024 X 768 comprimida',
                        'zip_thumbnail' => 'Imagen 1280 x 800 comprimida',
                        'zip_tercera' => 'Imagen Principal 800X600 comprimida',
			'paquetes_idPaquete' => 'Paquete relacionado',
			'destinos_idDestino' => 'Destino relacionado',
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

		$criteria->compare('idPromocional',$this->idPromocional);
		$criteria->compare('titulo',$this->titulo,true);
                $criteria->compare('url',$this->url,true);
                $criteria->compare('custom_tercera',$this->custom_background,true);
		$criteria->compare('custom_background',$this->custom_background,true);
		$criteria->compare('custom_thumbnail',$this->custom_thumbnail,true);
		$criteria->compare('zip_background',$this->zip_background,true);
		$criteria->compare('zip_thumbnail',$this->zip_thumbnail,true);
		$criteria->compare('zip_tercera',$this->zip_tercera,true);
		$criteria->compare('paquetes_idPaquete',$this->paquetes_idPaquete);
		$criteria->compare('destinos_idDestino',$this->destinos_idDestino);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
                        'sort' => array(
                            'defaultOrder' => 'titulo ASC',
                        ),
                        'pagination' => array(
                            'pageSize' => 10
                        ),
		));
	}

        public function saveModelonUpdate($data = array(), $old_model_image, $old_model_background, $old_model_tercera,$old_model_zip_background, $old_model_zip_thumbnail,$old_model_zip_tercera) {

        $this->attributes = $data;

        $myfile = CUploadedFile::getInstance($this, 'custom_thumbnail');
        if (is_object($myfile) && get_class($myfile) === 'CUploadedFile') {
            $this->custom_thumbnail = CUploadedFile::getInstance($this, 'custom_thumbnail');
        } else {
            $this->custom_thumbnail = $old_model_image;
        }

        $myfile2 = CUploadedFile::getInstance($this, 'custom_background');
        if (is_object($myfile2) && get_class($myfile2) === 'CUploadedFile') {
            $this->custom_background = CUploadedFile::getInstance($this, 'custom_background');
        } else {
            $this->custom_background = $old_model_background;
        }

         $myfile3 = CUploadedFile::getInstance($this, 'custom_tercera');
        if (is_object($myfile3) && get_class($myfile3) === 'CUploadedFile') {
            $this->custom_tercera = CUploadedFile::getInstance($this, 'custom_tercera');
        } else {
            $this->custom_tercera = $old_model_tercera;
        }
         $myfile4 = CUploadedFile::getInstance($this, 'zip_background');
        if (is_object($myfile4) && get_class($myfile4) === 'CUploadedFile') {
            $this->zip_background = CUploadedFile::getInstance($this, 'zip_background');
        } else {
            $this->zip_background = $old_model_tercera;
        }
         $myfile5 = CUploadedFile::getInstance($this, 'zip_thumbnail');
        if (is_object($myfile5) && get_class($myfile5) === 'CUploadedFile') {
            $this->zip_thumbnail = CUploadedFile::getInstance($this, 'zip_thumbnail');
        } else {
            $this->zip_thumbnail = $old_model_zip_thumbnail;
        }
         $myfile6 = CUploadedFile::getInstance($this, 'zip_tercera');
        if (is_object($myfile6) && get_class($myfile6) === 'CUploadedFile') {
            $this->zip_tercera = CUploadedFile::getInstance($this, 'zip_tercera');
        } else {
            $this->zip_tercera = $old_model_zip_tercera;
        }

        $this->paquetes_idPaquete = null;
        $this->destinos_idDestino = null;

        if (!$this->save()) {
            //return CHtml::errorSummary($this);
            return false;
        } else {

            if ($this->custom_thumbnail && is_object($myfile) && get_class($myfile) === 'CUploadedFile') {
                $rnd = dechex(rand() % 999999999);
                $ext = $this->custom_thumbnail->getExtensionName();
                if (!$this->custom_thumbnail->saveAs('images/promocional_images/thumbs/img_' . $rnd . '.' . $ext)) {
                    $this->custom_thumbnail = $old_model_image;
                    $this->save();
                } else {
                    $this->custom_thumbnail = 'img_' . $rnd . '.' . $ext;
                    $this->save();
                    if ($old_model_image)
                        unlink('images/promocional_images/thumbs/' . $old_model_image);
                }
            }

            if ($this->custom_background && is_object($myfile2) && get_class($myfile2) === 'CUploadedFile') {
                $rnd = dechex(rand() % 999999999);
                $ext = $this->custom_background->getExtensionName();
                if (!$this->custom_background->saveAs('images/promocional_images/img_' . $rnd . '.' . $ext)) {
                    $this->custom_background = $old_model_background;
                    $this->save();
                } else {
                    $this->custom_background = 'img_' . $rnd . '.' . $ext;
                    $this->save();
                    if ($old_model_background)
                        unlink('images/promocional_images/' . $old_model_background);
                }
            }

            if ($this->custom_tercera && is_object($myfile3) && get_class($myfile3) === 'CUploadedFile') {
                $rnd = dechex(rand() % 999999999);
                $ext = $this->custom_tercera->getExtensionName();
                if (!$this->custom_tercera->saveAs('images/promocional_images/img_' . $rnd . '.' . $ext)) {
                    $this->custom_tercera = $old_model_tercera;
                    $this->save();
                } else {
                    $this->custom_tercera = 'img_' . $rnd . '.' . $ext;
                    $this->save();
                    if ($old_model_tercera)
                        unlink('images/promocional_images/' . $old_model_tercera);
                }
            }
            if ($this->zip_background && is_object($myfile4) && get_class($myfile4) === 'CUploadedFile') {
                $rnd = dechex(rand() % 999999999);
                $ext = $this->zip_background->getExtensionName();
                if (!$this->zip_background->saveAs('images/promocional_images/img_' . $rnd . '.' . $ext)) {
                    $this->zip_background = $old_model_zip_background;
                    $this->save();
                } else {
                    $this->zip_background = 'img_' . $rnd . '.' . $ext;
                    $this->save();
                    if ($old_model_zip_background)
                        unlink('images/promocional_images/' . $old_model_zip_background);
                }
            }
            if ($this->zip_thumbnail && is_object($myfile5) && get_class($myfile5) === 'CUploadedFile') {
                $rnd = dechex(rand() % 999999999);
                $ext = $this->zip_thumbnail->getExtensionName();
                if (!$this->zip_thumbnail->saveAs('images/promocional_images/img_' . $rnd . '.' . $ext)) {
                    $this->zip_thumbnail = $old_model_zip_thumbnail;
                    $this->save();
                } else {
                    $this->zip_thumbnail = 'img_' . $rnd . '.' . $ext;
                    $this->save();
                    if ($old_model_zip_thumbnail)
                        unlink('images/promocional_images/' . $old_model_zip_thumbnail);
                }
            }
            if ($this->zip_tercera && is_object($myfile6) && get_class($myfile6) === 'CUploadedFile') {
                $rnd = dechex(rand() % 999999999);
                $ext = $this->zip_tercera->getExtensionName();
                if (!$this->zip_tercera->saveAs('images/promocional_images/img_' . $rnd . '.' . $ext)) {
                    $this->zip_tercera = $old_model_zip_tercera;
                    $this->save();
                } else {
                    $this->zip_tercera = 'img_' . $rnd . '.' . $ext;
                    $this->save();
                    if ($old_model_zip_tercera)
                        unlink('images/promocional_images/' . $old_model_zip_tercera);
                }
            }


        }

        return true;
    }

    public function saveModel($data = array()) {
        $myfile = CUploadedFile::getInstance($this, 'custom_thumbnail');
        $myfile2 = CUploadedFile::getInstance($this, 'custom_background');
         $myfile3 = CUploadedFile::getInstance($this, 'custom_tercera');
         $myfile4 = CUploadedFile::getInstance($this, 'zip_background');
         $myfile5 = CUploadedFile::getInstance($this, 'zip_thumbnail');
         $myfile6 = CUploadedFile::getInstance($this, 'zip_tercera');

        if (is_object($myfile) && get_class($myfile) === 'CUploadedFile')
            $data['custom_thumbnail'] = CUploadedFile::getInstance($this, 'custom_thumbnail');

        if (is_object($myfile2) && get_class($myfile2) === 'CUploadedFile')
            $data['custom_background'] = CUploadedFile::getInstance($this, 'custom_background');

         if (is_object($myfile3) && get_class($myfile3) === 'CUploadedFile')
            $data['custom_tercera'] = CUploadedFile::getInstance($this, 'custom_tercera');
         
         if (is_object($myfile4) && get_class($myfile4) === 'CUploadedFile')
            $data['zip_background'] = CUploadedFile::getInstance($this, 'zip_background');
         
         if (is_object($myfile5) && get_class($myfile5) === 'CUploadedFile')
            $data['zip_thumbnail'] = CUploadedFile::getInstance($this, 'zip_thumbnail');
        
         if (is_object($myfile6) && get_class($myfile6) === 'CUploadedFile')
            $data['zip_tercera'] = CUploadedFile::getInstance($this, 'zip_tercera');

        $this->attributes = $data;
        
        $this->paquetes_idPaquete = null;
        $this->destinos_idDestino = null;

        if (!$this->save()) {
            //return CHtml::errorSummary($this);
            return false;
        } else {
            if ($this->zip_background && is_object($myfile4) && get_class($myfile4) === 'CUploadedFile') {
                $rnd = dechex(rand() % 999999999);
                $ext = $this->zip_background->getExtensionName();
                if (!$this->zip_background->saveAs('images/promocional_images/thumbs/img_' . $rnd . '.' . $ext)) {
                    $this->zip_background = NULL;
                    $this->save();
                } else {
                    $this->zip_background = 'img_' . $rnd . '.' . $ext;
                    $this->save();
                }
            }

            if ($this->zip_thumbnail && is_object($myfile5) && get_class($myfile5) === 'CUploadedFile') {
                $rnd = dechex(rand() % 999999999);
                $ext = $this->zip_thumbnail->getExtensionName();
                if (!$this->zip_thumbnail->saveAs('images/promocional_images/img_' . $rnd . '.' . $ext)) {
                    $this->zip_thumbnail = NULL;
                    $this->save();
                } else {
                    $this->zip_thumbnail = 'img_' . $rnd . '.' . $ext;
                    $this->save();
                }
            }

             if ($this->zip_tercera && is_object($myfile4) && get_class($myfile4) === 'CUploadedFile') {
                $rnd = dechex(rand() % 999999999);
                $ext = $this->zip_tercera->getExtensionName();
                if (!$this->zip_tercera->saveAs('images/promocional_images/img_' . $rnd . '.' . $ext)) {
                    $this->zip_tercera = NULL;
                    $this->save();
                } else {
                    $this->zip_tercera = 'img_' . $rnd . '.' . $ext;
                    $this->save();
                }
            }

            return true;
        }
    }
    
    public function getDestinosPromocionales() {      
        return CHtml::listData(Destinos::model()->findAllByAttributes(array('is_promocional' => 1)), 'idDestino', 'nombre');
    }
    
    public function getPaquetes() {     
        return CHtml::listData(Paquetes::model()->findAll(), 'idPaquete', 'nombre');
    }


}