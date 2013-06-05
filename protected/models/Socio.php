<?php

/**
 * This is the model class for table "SOCIO".
 *
 * The followings are the available columns in table 'SOCIO':
 * @property integer $K_CEDULA
 * @property string $F_AFILIACION
 * @property string $N_NACIONALIDAD
 * @property string $I_TIPOSOCIO
 * @property integer $K_CATEGORIA
 *
 * The followings are the available model relations:
 * @property CORTECIA $cORTECIA
 * @property PARTIDA[] $pARTIDAs
 * @property PARTIDA[] $pARTIDAs1
 * @property REGULAR $rEGULAR
 * @property CATEGORIA $kCATEGORIA
 * @property USUARIO $kCEDULA
 */
class Socio extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Socio the static model class
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
		return 'SOCIO';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('K_CEDULA,F_AFILIACION, N_NACIONALIDAD, I_TIPOSOCIO, K_CATEGORIA', 'required'),
			array('K_CATEGORIA', 'numerical', 'integerOnly'=>true),
			array('N_NACIONALIDAD', 'length', 'max'=>20),
			array('I_TIPOSOCIO', 'length', 'max'=>1),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('K_CEDULA, F_AFILIACION, N_NACIONALIDAD, I_TIPOSOCIO, K_CATEGORIA', 'safe', 'on'=>'search'),
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
			'cORTECIA' => array(self::HAS_ONE, 'CORTECIA', 'K_CEDULA'),
			'pARTIDAs' => array(self::MANY_MANY, 'PARTIDA', 'LISTAESPERA(K_CEDULA, K_IDPARTIDA)'),
			'pARTIDAs1' => array(self::HAS_MANY, 'PARTIDA', 'K_CEDULAGANADOR'),
			'rEGULAR' => array(self::HAS_ONE, 'REGULAR', 'K_CEDULA'),
			'kCATEGORIA' => array(self::BELONGS_TO, 'CATEGORIA', 'K_CATEGORIA'),
			'kCEDULA' => array(self::BELONGS_TO, 'USUARIO', 'K_CEDULA'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'K_CEDULA' => 'Cedula',
			'F_AFILIACION' => 'F Afiliacion',
			'N_NACIONALIDAD' => 'N Nacionalidad',
			'I_TIPOSOCIO' => 'I Tiposocio',
			'K_CATEGORIA' => 'K Categoria',
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

		$criteria->compare('K_CEDULA',$this->K_CEDULA);
		$criteria->compare('F_AFILIACION',$this->F_AFILIACION,true);
		$criteria->compare('N_NACIONALIDAD',$this->N_NACIONALIDAD,true);
		$criteria->compare('I_TIPOSOCIO',$this->I_TIPOSOCIO,true);
		$criteria->compare('K_CATEGORIA',$this->K_CATEGORIA);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}