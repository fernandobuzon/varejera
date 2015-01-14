<?php

/**
 * This is the model class for table "parceiro".
 *
 * The followings are the available columns in table 'parceiro':
 * @property integer $id
 * @property string $nome
 * @property string $contato
 * @property string $endereco
 * @property string $cidade
 * @property string $cep
 * @property integer $distro
 * @property integer $apagado
 *
 * The followings are the available model relations:
 * @property Consig[] $consigs
 * @property Entrada[] $entradas
 * @property Saida[] $saidas
 * @property Troca[] $trocas
 */
class Parceiro extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'parceiro';
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
			array('distro, apagado', 'numerical', 'integerOnly'=>true),
			array('nome, contato, endereco', 'length', 'max'=>240),
			array('cidade', 'length', 'max'=>50),
			array('cep', 'length', 'max'=>10),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, nome, contato, endereco, cidade, cep, distro, apagado', 'safe', 'on'=>'search'),
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
			'consigs' => array(self::HAS_MANY, 'Consig', 'id_parceiro'),
			'entradas' => array(self::HAS_MANY, 'Entrada', 'id_parceiro'),
			'saidas' => array(self::HAS_MANY, 'Saida', 'id_parceiro'),
			'trocas' => array(self::HAS_MANY, 'Troca', 'id_parceiro'),
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
			'endereco' => 'Endereco',
			'cidade' => 'Cidade',
			'cep' => 'Cep',
			'distro' => 'Distro',
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
		$criteria->compare('endereco',$this->endereco,true);
		$criteria->compare('cidade',$this->cidade,true);
		$criteria->compare('cep',$this->cep,true);
		$criteria->compare('distro',$this->distro);
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
	 * @return Parceiro the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	* Custom
	*/

	public function chkDistro($id)
	{
		$model = Parceiro::model()->findByPk($id);
		if($model->distro == 1)
			echo 'Sim';
		else
			echo 'Não';
	}
	
	public function listaParceiros()
	{
		$listaParceiros = CHtml::listData(Parceiro::model()->findAll(array('condition'=>'apagado != 1','order'=>'nome')), 'id', 'nome');
		if($listaParceiros)
			return $listaParceiros;
		else
			return null;
	}
}
