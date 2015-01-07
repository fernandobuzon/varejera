<?php

/**
 * This is the model class for table "patrocinio".
 *
 * The followings are the available columns in table 'patrocinio':
 * @property integer $id
 * @property string $data
 * @property integer $id_integrante
 * @property integer $id_patrocinador
 * @property string $valor
 * @property integer $pg
 * @property string $obs
 * @property integer $apagado
 */
class Patrocinio extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'patrocinio';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('data, id_integrante, id_patrocinador, obs', 'required'),
			array('id_integrante, id_patrocinador, pg, apagado', 'numerical', 'integerOnly'=>true),
			array('valor', 'length', 'max'=>11),
			array('obs', 'length', 'max'=>1000),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, data, id_integrante, id_patrocinador, valor, pg, obs, apagado', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'data' => 'Data',
			'id_integrante' => 'Id Integrante',
			'id_patrocinador' => 'Id Patrocinador',
			'valor' => 'Valor',
			'pg' => 'Pg',
			'obs' => 'Obs',
			'apagado' => 'Apagado',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('data',$this->data,true);
		$criteria->compare('id_integrante',$this->id_integrante);
		$criteria->compare('id_patrocinador',$this->id_patrocinador);
		$criteria->compare('valor',$this->valor,true);
		$criteria->compare('pg',$this->pg);
		$criteria->compare('obs',$this->obs,true);
		$criteria->compare('apagado',$this->apagado);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Patrocinio the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
