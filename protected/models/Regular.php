<?php

/**
 * This is the model class for table "REGULAR".
 *
 * The followings are the available columns in table 'REGULAR':
 * @property integer $K_CEDULA
 *
 * The followings are the available model relations:
 * @property SOCIO $kCEDULA
 * @property TARJETACREDITO $tARJETACREDITO
 */
class Regular extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Regular the static model class
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
		return 'REGULAR';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
                    array('K_CEDULA', 'required'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('K_CEDULA', 'safe', 'on'=>'search'),
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
			'kCEDULA' => array(self::BELONGS_TO, 'SOCIO', 'K_CEDULA'),
			'tARJETACREDITO' => array(self::HAS_ONE, 'TARJETACREDITO', 'K_CEDULA'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
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

		$criteria->compare('K_CEDULA',$this->K_CEDULA);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}