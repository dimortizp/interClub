<?php

/**
 * This is the model class for table "CATEGORIA".
 *
 * The followings are the available columns in table 'CATEGORIA':
 * @property integer $K_IDCATEGORIA
 * @property string $N_CATEGORIA
 *
 * The followings are the available model relations:
 * @property SOCIO[] $sOCIOs
 * @property TORNEO[] $tORNEOs
 */
class Categoria extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Categoria the static model class
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
		return 'CATEGORIA';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('N_CATEGORIA', 'required'),
			array('N_CATEGORIA', 'length', 'max'=>10),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('K_IDCATEGORIA, N_CATEGORIA', 'safe', 'on'=>'search'),
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
			'sOCIOs' => array(self::HAS_MANY, 'SOCIO', 'K_CATEGORIA'),
			'tORNEOs' => array(self::HAS_MANY, 'TORNEO', 'K_IDCATEGORIA'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'K_IDCATEGORIA' => 'K Idcategoria',
			'N_CATEGORIA' => 'N Categoria',
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

		$criteria->compare('K_IDCATEGORIA',$this->K_IDCATEGORIA);
		$criteria->compare('N_CATEGORIA',$this->N_CATEGORIA,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}