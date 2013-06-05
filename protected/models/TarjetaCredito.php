<?php

/**
 * This is the model class for table "TARJETACREDITO".
 *
 * The followings are the available columns in table 'TARJETACREDITO':
 * @property integer $K_NUMEROTARJETA
 * @property integer $O_CODIGOVERIFICACION
 * @property string $O_CLAVETARJETA
 * @property string $N_NOMBRETARJETA
 * @property string $F_VENCIMIENTO
 * @property string $I_TIPOTARJETA
 * @property integer $K_CEDULA
 *
 * The followings are the available model relations:
 * @property REGULAR $kNUMEROTARJETA
 */
class TarjetaCredito extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return TarjetaCredito the static model class
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
		return 'TARJETACREDITO';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('K_NUMEROTARJETA,O_CODIGOVERIFICACION, O_CLAVETARJETA, N_NOMBRETARJETA, F_VENCIMIENTO, I_TIPOTARJETA, K_CEDULA', 'required'),
			array('O_CODIGOVERIFICACION, K_CEDULA', 'numerical', 'integerOnly'=>true),
			array('O_CLAVETARJETA', 'length', 'max'=>32),
			array('N_NOMBRETARJETA', 'length', 'max'=>20),
			array('I_TIPOTARJETA', 'length', 'max'=>1),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('K_NUMEROTARJETA, O_CODIGOVERIFICACION, O_CLAVETARJETA, N_NOMBRETARJETA, F_VENCIMIENTO, I_TIPOTARJETA, K_CEDULA', 'safe', 'on'=>'search'),
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
			'kNUMEROTARJETA' => array(self::BELONGS_TO, 'REGULAR', 'K_NUMEROTARJETA'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'K_NUMEROTARJETA' => 'K Numerotarjeta',
			'O_CODIGOVERIFICACION' => 'O Codigoverificacion',
			'O_CLAVETARJETA' => 'O Clavetarjeta',
			'N_NOMBRETARJETA' => 'N Nombretarjeta',
			'F_VENCIMIENTO' => 'F Vencimiento',
			'I_TIPOTARJETA' => 'I Tipotarjeta',
			'K_CEDULA' => 'K Cedula',
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

		$criteria->compare('K_NUMEROTARJETA',$this->K_NUMEROTARJETA);
		$criteria->compare('O_CODIGOVERIFICACION',$this->O_CODIGOVERIFICACION);
		$criteria->compare('O_CLAVETARJETA',$this->O_CLAVETARJETA,true);
		$criteria->compare('N_NOMBRETARJETA',$this->N_NOMBRETARJETA,true);
		$criteria->compare('F_VENCIMIENTO',$this->F_VENCIMIENTO,true);
		$criteria->compare('I_TIPOTARJETA',$this->I_TIPOTARJETA,true);
		$criteria->compare('K_CEDULA',$this->K_CEDULA);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}