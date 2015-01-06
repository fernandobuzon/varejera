<?php

/**
 * This is the model class for table "produto" (Estoque).
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
 * @property Baixa[] $baixas
 * @property Consig[] $consigs
 * @property Entrada[] $entradas
 * @property Banda $idBanda
 * @property Tipo $idTipo
 * @property Retirada[] $retiradas
 * @property Saida[] $saidas
 */
class Estoque extends CActiveRecord
{
	public $qtde;
	
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
			array('id_tipo, id_banda, qtde, apagado', 'numerical', 'integerOnly'=>true),
			array('nome', 'length', 'max'=>80),
			array('obs', 'length', 'max'=>200),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, id_tipo, id_banda, nome, obs, qtde, apagado', 'safe', 'on'=>'search'),
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
			'baixas' => array(self::HAS_MANY, 'Baixa', 'id_produto'),
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
			'qtde' => 'Qtde',
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
	public function search($param)
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;
		
		if ($param == 'estoque')
		{
			$criteria->select = array(
  				new CDbExpression('id'),
				new CDbExpression('id_tipo'),
				new CDbExpression('id_banda'),
				new CDbExpression('nome'),
				new CDbExpression('COALESCE(((select sum(ent.qtde) from entrada ent where ent.id_produto = t.id and ent.recebido = 1) - (select sum(sda.qtde) from saida sda where sda.id_produto = t.id)),0) as qtde'),
			);
			$criteria->compare('id',$this->id);
			$criteria->compare('id_tipo',$this->id_tipo);
			$criteria->compare('id_banda',$this->id_banda);
			$criteria->compare('nome',$this->nome,true);
			$criteria->order = 'nome';
			$criteria->having = 'qtde > 0';
		}
		else if ($param == 'all')
		{
			$criteria->select = array(
					new CDbExpression('id'),
					new CDbExpression('id_tipo'),
					new CDbExpression('id_banda'),
					new CDbExpression('nome'),
					new CDbExpression('COALESCE(((select sum(ent.qtde) from entrada ent where ent.id_produto = t.id) - (select sum(sda.qtde) from saida sda where sda.id_produto = t.id)),0) as qtde'),
			);
			$criteria->compare('id',$this->id);
			$criteria->compare('id_tipo',$this->id_tipo);
			$criteria->compare('id_banda',$this->id_banda);
			$criteria->compare('nome',$this->nome,true);
			$criteria->order = 'nome';
		}
		else if ($param == 'aguardando')
		{
			$criteria->select = array(
					new CDbExpression('t.id'),
					new CDbExpression('id_tipo'),
					new CDbExpression('id_banda'),
					new CDbExpression('nome'),
					new CDbExpression('COALESCE((select sum(ent.qtde) from entrada ent where ent.id_produto = t.id and ent.recebido=0),0) as qtde'),
			);
			$criteria->join = 'JOIN entrada e ON t.id = e.id_produto';
			$criteria->condition = 'e.recebido = 0';
			$criteria->compare('id',$this->id);
			$criteria->compare('id_tipo',$this->id_tipo);
			$criteria->compare('id_banda',$this->id_banda);
			$criteria->compare('nome',$this->nome,true);
			$criteria->group = 'id';
			$criteria->order = 'nome';
		}
		
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'pagination' => array('pageSize' => 30),
		));		
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Estoque the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
