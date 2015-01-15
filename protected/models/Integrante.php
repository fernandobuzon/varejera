<?php

/**
 * This is the model class for table "integrante".
 *
 * The followings are the available columns in table 'integrante':
 * @property integer $id
 * @property string $nome
 * @property integer $id_conta
 * @property integer $apagado
 *
 * The followings are the available model relations:
 * @property Consig[] $consigs
 * @property Entrada[] $entradas
 * @property Conta $idConta
 * @property MovConta[] $movContas
 * @property MovDespesa[] $movDespesa
 * @property Retirada[] $retiradas
 * @property Saida[] $saidas
 * @property Troca[] $trocas
 */
class Integrante extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'integrante';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nome, id_conta', 'required'),
			array('id_conta, apagado', 'numerical', 'integerOnly'=>true),
			array('nome', 'length', 'max'=>50),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, nome, id_conta, apagado', 'safe', 'on'=>'search'),
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
			'consigs' => array(self::HAS_MANY, 'Consig', 'id_integrante'),
			'entradas' => array(self::HAS_MANY, 'Entrada', 'id_integrante'),
			'idConta' => array(self::BELONGS_TO, 'Conta', 'id_conta'),
			'movContas' => array(self::HAS_MANY, 'MovConta', 'id_integrante'),
			'movDespesa' => array(self::HAS_MANY, 'MovDespesa', 'id_integrante'),
			'retiradas' => array(self::HAS_MANY, 'Retirada', 'id_integrante'),
			'saidas' => array(self::HAS_MANY, 'Saida', 'id_integrante'),
			'trocas' => array(self::HAS_MANY, 'Troca', 'id_integrante'),
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
			'id_conta' => 'Conta',
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
		$criteria->compare('id_conta',$this->id_conta);
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
	 * @return Integrante the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	
	public function listaIntegrantes()
	{
		$listaIntegrantes = CHtml::listData(Integrante::model()->findAll(), 'id', 'nome');
		if($listaIntegrantes)
			return $listaIntegrantes;
		else
			return null;
	}
	
	public function chkId()
	{
		$model = Integrante::model()->findByAttributes(
  			array('nome'=>Yii::app()->user->getId()),
			array('condition'=>'apagado != 1')
		);
		return $model->id;
	}
}
