<?php

/**
 * This is the model class for table "PARTIDA".
 *
 * The followings are the available columns in table 'PARTIDA':
 * @property integer $K_IDPARTIDA
 * @property string $I_ESTADOPARTIDA
 * @property string $F_FECHAHORA
 * @property integer $K_IDLUGAR
 * @property integer $K_CEDULAGANADOR
 * @property integer $K_IDRONDA
 *
 * The followings are the available model relations:
 * @property SOCIO[] $sOCIOs
 * @property LUGAR $kIDLUGAR
 * @property RONDA $kIDRONDA
 * @property SOCIO $kCEDULAGANADOR
 */
class Partida extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Partida the static model class
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
		return 'PARTIDA';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('I_ESTADOPARTIDA, F_FECHAHORA, K_IDLUGAR, K_IDRONDA', 'required'),
			array('K_IDLUGAR, K_CEDULAGANADOR, K_IDRONDA', 'numerical', 'integerOnly'=>true),
			array('I_ESTADOPARTIDA', 'length', 'max'=>1),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('K_IDPARTIDA, I_ESTADOPARTIDA, F_FECHAHORA, K_IDLUGAR, K_CEDULAGANADOR, K_IDRONDA', 'safe', 'on'=>'search'),
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
			'sOCIOs' => array(self::MANY_MANY, 'SOCIO', 'LISTAESPERA(K_IDPARTIDA, K_CEDULA)'),
			'kIDLUGAR' => array(self::BELONGS_TO, 'LUGAR', 'K_IDLUGAR'),
			'kIDRONDA' => array(self::BELONGS_TO, 'RONDA', 'K_IDRONDA'),
			'kCEDULAGANADOR' => array(self::BELONGS_TO, 'SOCIO', 'K_CEDULAGANADOR'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'K_IDPARTIDA' => 'K Idpartida',
			'I_ESTADOPARTIDA' => 'I Estadopartida',
			'F_FECHAHORA' => 'F Fechahora',
			'K_IDLUGAR' => 'K Idlugar',
			'K_CEDULAGANADOR' => 'K Cedulaganador',
			'K_IDRONDA' => 'K Idronda',
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

		$criteria->compare('K_IDPARTIDA',$this->K_IDPARTIDA);
		$criteria->compare('I_ESTADOPARTIDA',$this->I_ESTADOPARTIDA,true);
		$criteria->compare('F_FECHAHORA',$this->F_FECHAHORA,true);
		$criteria->compare('K_IDLUGAR',$this->K_IDLUGAR);
		$criteria->compare('K_CEDULAGANADOR',$this->K_CEDULAGANADOR);
		$criteria->compare('K_IDRONDA',$this->K_IDRONDA);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}