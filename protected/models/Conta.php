<?php

/**
 * This is the model class for table "conta".
 *
 * The followings are the available columns in table 'conta':
 * @property integer $id
 * @property string $nome
 * @property string $detalhes
 * @property integer $apagado
 *
 * The followings are the available model relations:
 * @property Integrante[] $integrantes
 * @property MovConta[] $movContas
 * @property MovConta[] $movContas1
 * @property MovDespesa[] $movDespesa
 */
class Conta extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'conta';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nome', 'required'),
			array('apagado', 'numerical', 'integerOnly'=>true),
			array('nome', 'length', 'max'=>50),
			array('detalhes', 'length', 'max'=>240),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, nome, detalhes, apagado', 'safe', 'on'=>'search'),
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
			'integrantes' => array(self::HAS_MANY, 'Integrante', 'id_conta'),
			'movContas' => array(self::HAS_MANY, 'MovConta', 'id_conta_dest'),
			'movContas1' => array(self::HAS_MANY, 'MovConta', 'id_conta_orig'),
			'movDespesa' => array(self::HAS_MANY, 'MovDespesa', 'id_conta'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'nome' => 'Nome',
			'detalhes' => 'Detalhes',
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
		$criteria->compare('nome',$this->nome,true);
		$criteria->compare('detalhes',$this->detalhes,true);
		$criteria->compare('apagado',$this->apagado);
		$criteria->order = 'nome';
		$criteria->addCondition('apagado != 1');

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Conta the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function listaContas()
	{
			$listaContas = CHtml::listData(Conta::model()->findAll(), 'id', 'nome');
			if($listaContas)
				return $listaContas;
			else
				return null;
	}
}
