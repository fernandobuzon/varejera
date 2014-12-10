<?php

/**
 * This is the model class for table "produto".
 *
 * The followings are the available columns in table 'produto':
 * @property integer $id
 * @property integer $id_tipo
 * @property integer $id_banda
 * @property string $nome
 * @property string $obs
 * @property integer $apagado
 *
 * The followings are the available model relations:
 * @property Consig[] $consigs
 * @property Entrada[] $entradas
 * @property Banda $idBanda
 * @property Tipo $idTipo
 * @property Retirada[] $retiradas
 * @property Saida[] $saidas
 */
class Produto extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'produto';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_tipo, id_banda, nome', 'required'),
			array('id_tipo, id_banda, apagado', 'numerical', 'integerOnly'=>true),
			array('nome', 'length', 'max'=>80),
			array('obs', 'length', 'max'=>200),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, id_tipo, id_banda, nome, obs, apagado', 'safe', 'on'=>'search'),
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
			'consigs' => array(self::HAS_MANY, 'Consig', 'id_produto'),
			'entradas' => array(self::HAS_MANY, 'Entrada', 'id_produto'),
			'idBanda' => array(self::BELONGS_TO, 'Banda', 'id_banda'),
			'idTipo' => array(self::BELONGS_TO, 'Tipo', 'id_tipo'),
			'retiradas' => array(self::HAS_MANY, 'Retirada', 'id_produto'),
			'saidas' => array(self::HAS_MANY, 'Saida', 'id_produto'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'id_tipo' => 'Id Tipo',
			'id_banda' => 'Id Banda',
			'nome' => 'Nome',
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
		$criteria->compare('id_tipo',$this->id_tipo);
		$criteria->compare('id_banda',$this->id_banda);
		$criteria->compare('nome',$this->nome,true);
		$criteria->compare('obs',$this->obs,true);
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
	 * @return Produto the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	
	public function listaProdutos()
	{
		$listaProdutos = CHtml::listData(Produto::model()->findAll(), 'id', 'nome');
		if($listaProdutos)
			return $listaProdutos;
		else
			return null;
	}
}
