<?php

/**
 * This is the model class for table "donde_pago".
 *
 * The followings are the available columns in table 'donde_pago':
 * @property integer $idDondePago
 * @property string $nombre
 * @property string $email
 * @property string $ciudad
 *
 * The followings are the available model relations:
 * @property Reservas[] $reservases
 */
class DondePago extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return DondePago the static model class
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
		return 'donde_pago';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
                        array('nombre', 'required'),
//                        array('email','email'),
			array('nombre, ciudad', 'length', 'max'=>100),
			array('email', 'length', 'max'=>100),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idDondePago, nombre, email, ciudad', 'safe', 'on'=>'search'),
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
			'reservases' => array(self::HAS_MANY, 'Reservas', 'donde_pago_idDondePago'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idDondePago' => 'Id Donde Pago',
			'nombre' => 'Nombre',
			'email' => 'Email',
			'ciudad' => 'Ciudad',
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

		$criteria->compare('idDondePago',$this->idDondePago);
		$criteria->compare('nombre',$this->nombre,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('ciudad',$this->ciudad,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
                        'sort' => array(
                            'defaultOrder' => 'nombre ASC, idDondePago ASC',
                        ),
                        'pagination' => array(
                            'pageSize' => 10
                        ),
		));
	}
}