<?php

/**
 * This is the model class for table "USUARIO".
 *
 * The followings are the available columns in table 'USUARIO':
 * @property integer $K_CEDULA
 * @property string $N_CORREO
 * @property string $N_NOMBRES
 * @property string $N_APELLIDOS
 * @property string $I_ROL
 * @property string $O_PASSWORD
 *
 * The followings are the available model relations:
 * @property ADMINISTRADOR $aDMINISTRADOR
 * @property SOCIO $sOCIO
 */
class Usuario extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Usuario the static model class
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
		return 'USUARIO';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('K_CEDULA, N_CORREO, N_NOMBRES, N_APELLIDOS, I_ROL, O_PASSWORD', 'required'),
			array('N_CORREO, N_NOMBRES, N_APELLIDOS', 'length', 'max'=>50),
			array('I_ROL', 'length', 'max'=>1),
			array('O_PASSWORD', 'length', 'max'=>32),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('K_CEDULA, N_CORREO, N_NOMBRES, N_APELLIDOS, I_ROL, O_PASSWORD', 'safe', 'on'=>'search'),
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
			'aDMINISTRADOR' => array(self::HAS_ONE, 'ADMINISTRADOR', 'K_CEDULA'),
			'sOCIO' => array(self::HAS_ONE, 'SOCIO', 'K_CEDULA'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'K_CEDULA' => 'Numero de identificacion',
			'N_CORREO' => 'Correo electronico',
			'N_NOMBRES' => 'Nombres',
			'N_APELLIDOS' => 'Apellidos',
			'I_ROL' => 'Rol',
			'O_PASSWORD' => 'Clave',
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
		$criteria->compare('N_CORREO',$this->N_CORREO,true);
		$criteria->compare('N_NOMBRES',$this->N_NOMBRES,true);
		$criteria->compare('N_APELLIDOS',$this->N_APELLIDOS,true);
		$criteria->compare('I_ROL',$this->I_ROL,true);
		$criteria->compare('O_PASSWORD',$this->O_PASSWORD,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}