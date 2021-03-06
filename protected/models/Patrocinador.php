<?php

/**
 * This is the model class for table "patrocinador".
 *
 * The followings are the available columns in table 'patrocinador':
 * @property integer $id
 * @property string $nome
 * @property string $contato
 * @property string $link
 * @property string $endereco
 * @property string $cidade
 * @property string $cep
 * @property integer $apagado
 */
class Patrocinador extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'patrocinador';
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
			array('nome, contato, link, endereco', 'length', 'max'=>240),
			array('cidade', 'length', 'max'=>50),
			array('cep', 'length', 'max'=>10),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, nome, contato, link, endereco, cidade, cep, apagado', 'safe', 'on'=>'search'),
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
			'nome' => 'Nome',
			'contato' => 'Contato',
			'link' => 'Link',
			'endereco' => 'Endereco',
			'cidade' => 'Cidade',
			'cep' => 'CEP',
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
		$criteria->compare('contato',$this->contato,true);
		$criteria->compare('link',$this->link,true);
		$criteria->compare('endereco',$this->endereco,true);
		$criteria->compare('cidade',$this->cidade,true);
		$criteria->compare('cep',$this->cep,true);
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
	 * @return Patrocinador the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	
	public function listaPatrocinadores()
	{
		$listaPatrocinadores = CHtml::listData(Patrocinador::model()->findAll(), 'id', 'nome');
		if($listaPatrocinadores)
			return $listaPatrocinadores;
		else
			return null;
	}
}
