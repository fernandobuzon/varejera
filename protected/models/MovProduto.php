<?php

/**
 * This is the model class for table "mov_produto".
 *
 * The followings are the available columns in table 'mov_produto':
 * @property integer $id
 * @property string $data
 * @property integer $id_integrante
 * @property integer $id_integrante_dest
 * @property integer $id_produto
 * @property integer $qtde
 * @property integer $apagado
 *
 * The followings are the available model relations:
 * @property Produto $idProduto
 * @property Integrante $idIntegranteDest
 * @property Integrante $idIntegrante
 */
class MovProduto extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'mov_produto';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('data, id_integrante, id_integrante_dest, id_produto, qtde', 'required'),
			array('id_integrante, id_integrante_dest, id_produto, qtde, apagado', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, data, id_integrante, id_integrante_dest, apagado, id_produto, qtde', 'safe', 'on'=>'search'),
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
			'idProduto' => array(self::BELONGS_TO, 'Produto', 'id_produto'),
			'idIntegranteDest' => array(self::BELONGS_TO, 'Integrante', 'id_integrante_dest'),
			'idIntegrante' => array(self::BELONGS_TO, 'Integrante', 'id_integrante'),
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
			'id_integrante' => 'Integrante',
			'id_integrante_dest' => 'Receptor',
			'id_produto' => 'Produto',
			'qtde' => 'Qtde.',
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
		$criteria->compare('id_integrante_dest',$this->id_integrante_dest);
		$criteria->compare('id_produto',$this->id_produto);
		$criteria->compare('qtde',$this->qtde);
		$criteria->compare('apagado',$this->apagado);
		$criteria->addCondition('apagado != 1');
		$criteria->order = 'data DESC';

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return MovProduto the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	
	protected function afterFind(){
		parent::afterFind();
		$this->data=date('d/m/Y', strtotime(str_replace("-", "", $this->data)));
	}
	
	protected function beforeSave(){
		if(parent::beforeSave()){
			$this->data=date('Y-m-d', strtotime(str_replace("/", "-", $this->data)));
			return TRUE;
		}
		else return FALSE;
	}
}
