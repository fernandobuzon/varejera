<?php

/**
 * This is the model class for table "troca".
 *
 * The followings are the available columns in table 'troca':
 * @property integer $id
 * @property string $data
 * @property integer $id_integrante
 * @property integer $id_parceiro
 * @property string $pago
 * @property string $recebido
 * @property integer $apagado
 *
 * The followings are the available model relations:
 * @property Entrada[] $entradas
 * @property Saida[] $saidas
 * @property Parceiro $idParceiro
 * @property Integrante $idIntegrante
 */
class Troca extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'troca';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('data, id_integrante, id_parceiro', 'required'),
			array('id_integrante, id_parceiro, apagado', 'numerical', 'integerOnly'=>true),
			array('pago, recebido', 'length', 'max'=>11),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, data, id_integrante, id_parceiro, pago, recebido, apagado', 'safe', 'on'=>'search'),
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
			'entradas' => array(self::HAS_MANY, 'Entrada', 'id_troca'),
			'saidas' => array(self::HAS_MANY, 'Saida', 'id_troca'),
			'idParceiro' => array(self::BELONGS_TO, 'Parceiro', 'id_parceiro'),
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
			'id_parceiro' => 'Parceiro',
			'pago' => 'Pago',
			'recebido' => 'Recebido',
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
		$criteria->compare('id_parceiro',$this->id_parceiro);
		$criteria->compare('pago',$this->pago,true);
		$criteria->compare('recebido',$this->recebido,true);
		$criteria->compare('apagado',$this->apagado);
		$criteria->order = 'data DESC';
		$criteria->addCondition('apagado != 1');

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
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
	
	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Troca the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
