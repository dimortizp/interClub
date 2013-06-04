<?php

/**
 * This is the model class for table "RONDA".
 *
 * The followings are the available columns in table 'RONDA':
 * @property integer $K_IDRONDA
 * @property string $Q_NUMERORONDA
 * @property string $I_ESTADORONDA
 * @property integer $K_IDTORNEO
 *
 * The followings are the available model relations:
 * @property PARTIDA[] $pARTIDAs
 * @property TORNEO $kIDTORNEO
 */
class Ronda extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Ronda the static model class
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
		return 'RONDA';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('K_IDRONDA,Q_NUMERORONDA, I_ESTADORONDA, K_IDTORNEO', 'required'),
			array('K_IDTORNEO', 'numerical', 'integerOnly'=>true),
			array('Q_NUMERORONDA', 'length', 'max'=>4),
			array('I_ESTADORONDA', 'length', 'max'=>1),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('K_IDRONDA, Q_NUMERORONDA, I_ESTADORONDA, K_IDTORNEO', 'safe', 'on'=>'search'),
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
			'pARTIDAs' => array(self::HAS_MANY, 'PARTIDA', 'K_IDRONDA'),
			'kIDTORNEO' => array(self::BELONGS_TO, 'TORNEO', 'K_IDTORNEO'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'K_IDRONDA' => 'Id ronda',
			'Q_NUMERORONDA' => 'Ronda Numero',
			'I_ESTADORONDA' => 'Estado Ronda',
			'K_IDTORNEO' => 'Id torneo',
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

		$criteria->compare('K_IDRONDA',$this->K_IDRONDA);
		$criteria->compare('Q_NUMERORONDA',$this->Q_NUMERORONDA,true);
		$criteria->compare('I_ESTADORONDA',$this->I_ESTADORONDA,true);
		$criteria->compare('K_IDTORNEO',$this->K_IDTORNEO);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}