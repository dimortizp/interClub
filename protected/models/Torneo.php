<?php

/**
 * This is the model class for table "TORNEO".
 *
 * The followings are the available columns in table 'TORNEO':
 * @property integer $K_IDTORNEO
 * @property string $F_INICIO
 * @property string $F_FINAL
 * @property string $I_ESTADOTORNEO
 * @property integer $K_IDCATEGORIA
 *
 * The followings are the available model relations:
 * @property RONDA[] $rONDAs
 * @property CATEGORIA $kIDCATEGORIA
 */
class Torneo extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Torneo the static model class
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
		return 'TORNEO';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('K_IDTORNEO,F_INICIO, F_FINAL, I_ESTADOTORNEO, K_IDCATEGORIA, Q_PARTICIPANTES', 'required'),
			array('K_IDCATEGORIA', 'numerical', 'integerOnly'=>true),
			array('I_ESTADOTORNEO', 'length', 'max'=>1),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('K_IDTORNEO, F_INICIO, F_FINAL, I_ESTADOTORNEO, K_IDCATEGORIA, Q_PARTICIPANTES', 'safe', 'on'=>'search'),
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
			'rONDAs' => array(self::HAS_MANY, 'RONDA', 'K_IDTORNEO'),
			'kIDCATEGORIA' => array(self::BELONGS_TO, 'CATEGORIA', 'K_IDCATEGORIA'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'K_IDTORNEO' => 'Id Torneo',
			'F_INICIO' => 'Fecha de Inicio del Torneo',
			'F_FINAL' => 'Fecha Final del torneo',
			'I_ESTADOTORNEO' => 'Estado del torneo',
			'K_IDCATEGORIA' => 'Categoria',
                    'Q_PARTICIPANTES'=> 'Número de Participantes',
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

		$criteria->compare('K_IDTORNEO',$this->K_IDTORNEO);
		$criteria->compare('F_INICIO',$this->F_INICIO,true);
		$criteria->compare('F_FINAL',$this->F_FINAL,true);
		$criteria->compare('I_ESTADOTORNEO',$this->I_ESTADOTORNEO,true);
		$criteria->compare('K_IDCATEGORIA',$this->K_IDCATEGORIA);
                $criteria->compare('Q_PARTICIPANTES',$this->Q_PARTICIPANTES);
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}