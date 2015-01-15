<?php

/**
 * This is the model class for table "banda".
 *
 * The followings are the available columns in table 'banda':
 * @property integer $id
 * @property integer $id_genero
 * @property string $nome
 * @property string $contato
 * @property string $link
 * @property integer $apagado
 *
 * The followings are the available model relations:
 * @property Genero $idGenero
 * @property Produto[] $produtos
 */
class Banda extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'banda';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_genero, nome', 'required'),
			array('id_genero, apagado', 'numerical', 'integerOnly'=>true),
			array('nome, contato', 'length', 'max'=>100),
			array('link', 'length', 'max'=>240),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, id_genero, nome, contato, link, apagado', 'safe', 'on'=>'search'),
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
			'idGenero' => array(self::BELONGS_TO, 'Genero', 'id_genero'),
			'produtos' => array(self::HAS_MANY, 'Produto', 'id_banda'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'id_genero' => 'Gênero',
			'nome' => 'Nome',
			'contato' => 'Contato',
			'link' => 'Link',
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
		$criteria->compare('id_genero',$this->id_genero);
		$criteria->compare('nome',$this->nome,true);
		$criteria->compare('contato',$this->contato,true);
		$criteria->compare('link',$this->link,true);
		$criteria->compare('apagado',$this->apagado);
		$criteria->addCondition('apagado != 1');
		$criteria->order = 'nome';

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Banda the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function listaBandas()
	{
		$listaBandas = CHtml::listData(Banda::model()->findAll(), 'id', 'nome');
		if($listaBandas)
			return $listaBandas;
		else
			return null;
	}
}
