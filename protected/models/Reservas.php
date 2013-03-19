<?php

/**
 * This is the model class for table "reservas".
 *
 * The followings are the available columns in table 'reservas':
 * @property integer $idReserva
 * @property integer $consecutivo
 * @property string $nombre
 * @property string $apellidos
 * @property string $documento
 * @property string $email
 * @property string $direccion
 * @property string $telefono
 * @property string $ciudad
 * @property integer $paquetes_idPaquete
 * @property string $fecha_reserva
 * @property integer $num_adultos
 * @property integer $num_ninos
 * @property integer $num_infantes
 * @property string $forma_pago
 * @property string $fecha_formulario
 * @property integer $donde_pago_idDondePago
 *
 * The followings are the available model relations:
 * @property DondePago $dondePagoIdDondePago
 * @property Paquetes $paquetesIdPaquete
 */
class Reservas extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Reservas the static model class
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
		return 'reservas';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
                        array('nombre, apellidos, email, documento, direccion, telefono, ciudad, paquetes_idPaquete, fecha_reserva, donde_pago_idDondePago', 'required', 'on'=>'insert'),
                        array('consecutivo', 'unique'),
			array('consecutivo, paquetes_idPaquete, num_adultos, num_ninos, num_infantes, donde_pago_idDondePago', 'numerical', 'integerOnly'=>true),
			array('nombre, apellidos, email, forma_pago', 'length', 'max'=>100),
                        array('email', 'email'),
			array('documento, telefono', 'length', 'max'=>20),
			array('direccion', 'length', 'max'=>200),
			array('ciudad', 'length', 'max'=>50),
			array('fecha_reserva, fecha_formulario', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idReserva, consecutivo, nombre, apellidos, documento, email, direccion, telefono, ciudad, paquetes_idPaquete, fecha_reserva, num_adultos, num_ninos, num_infantes, forma_pago, fecha_formulario, donde_pago_idDondePago', 'safe', 'on'=>'search'),
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
			'dondePagoIdDondePago' => array(self::BELONGS_TO, 'DondePago', 'donde_pago_idDondePago'),
			'paquetesIdPaquete' => array(self::BELONGS_TO, 'Paquetes', 'paquetes_idPaquete'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idReserva' => 'Id Reserva',
			'consecutivo' => 'Consecutivo',
			'nombre' => 'Nombre',
			'apellidos' => 'Apellidos',
			'documento' => 'Documento de identidad',
			'email' => 'Email',
			'direccion' => 'Dirección',
			'telefono' => 'Teléfono',
			'ciudad' => 'Ciudad',
			'paquetes_idPaquete' => 'Plan',
			'fecha_reserva' => 'Inicio de viaje',
			'num_adultos' => '# Adultos',
			'num_ninos' => '# Ninos (2 a 11 años)',
			'num_infantes' => '# Infantes (de 1 a 23 meses)',
			'forma_pago' => 'Forma de Pago',
			'fecha_formulario' => 'Fecha del Formulario',
			'donde_pago_idDondePago' => 'Donde prefiere realizar su pago',
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

		$criteria->compare('idReserva',$this->idReserva);
		$criteria->compare('consecutivo',$this->consecutivo);
		$criteria->compare('nombre',$this->nombre,true);
		$criteria->compare('apellidos',$this->apellidos,true);
		$criteria->compare('documento',$this->documento,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('direccion',$this->direccion,true);
		$criteria->compare('telefono',$this->telefono,true);
		$criteria->compare('ciudad',$this->ciudad,true);
		$criteria->compare('paquetes_idPaquete',$this->paquetes_idPaquete);
		$criteria->compare('fecha_reserva',$this->fecha_reserva,true);
		$criteria->compare('num_adultos',$this->num_adultos);
		$criteria->compare('num_ninos',$this->num_ninos);
		$criteria->compare('num_infantes',$this->num_infantes);
		$criteria->compare('forma_pago',$this->forma_pago,true);
		$criteria->compare('fecha_formulario',$this->fecha_formulario,true);
		$criteria->compare('donde_pago_idDondePago',$this->donde_pago_idDondePago);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
                         'sort' => array(
                            'defaultOrder' => 'idReserva ASC, fecha_reserva ASC',
                        ),
                        'pagination' => array(
                            'pageSize' => 20
                        ),
		));
	}
}