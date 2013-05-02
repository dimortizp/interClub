<?php

/**
 * This is the model class for table "LUGAR".
 *
 * The followings are the available columns in table 'LUGAR':
 * @property integer $K_IDLUGAR
 * @property string $O_DIRECCION
 * @property string $N_SITIO
 *
 * The followings are the available model relations:
 * @property PARTIDA[] $pARTIDAs
 */
class Lugar extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Lugar the static model class
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
		return 'LUGAR';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('O_DIRECCION, N_SITIO', 'required'),
			array('O_DIRECCION, N_SITIO', 'length', 'max'=>20),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('K_IDLUGAR, O_DIRECCION, N_SITIO', 'safe', 'on'=>'search'),
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
			'pARTIDAs' => array(self::HAS_MANY, 'PARTIDA', 'K_IDLUGAR'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'K_IDLUGAR' => 'K Idlugar',
			'O_DIRECCION' => 'O Direccion',
			'N_SITIO' => 'N Sitio',
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

		$criteria->compare('K_IDLUGAR',$this->K_IDLUGAR);
		$criteria->compare('O_DIRECCION',$this->O_DIRECCION,true);
		$criteria->compare('N_SITIO',$this->N_SITIO,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}