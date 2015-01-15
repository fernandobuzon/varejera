<?php

/**
 * This is the model class for table "gravacao".
 *
 * The followings are the available columns in table 'gravacao':
 * @property integer $id
 * @property integer $id_estudio
 * @property integer $id_banda
 * @property string $nome
 * @property string $data_i
 * @property string $data_f
 * @property string $valor
 * @property string $obs
 * @property integer $apagado
 *
 * The followings are the available model relations:
 * @property Banda $idBanda
 * @property Estudio $idEstudio
 */
class Gravacao extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'gravacao';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_estudio, id_banda, nome, data_i', 'required'),
			array('id_estudio, id_banda, apagado', 'numerical', 'integerOnly'=>true),
			array('nome', 'length', 'max'=>240),
			array('valor', 'length', 'max'=>11),
			array('obs', 'length', 'max'=>10000),
			array('data_f', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, id_estudio, id_banda, nome, data_i, data_f, valor, obs, apagado', 'safe', 'on'=>'search'),
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
			'idBanda' => array(self::BELONGS_TO, 'Banda', 'id_banda'),
			'idEstudio' => array(self::BELONGS_TO, 'Estudio', 'id_estudio'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'id_estudio' => 'Estúdio',
			'id_banda' => 'Banda',
			'nome' => 'Nome',
			'data_i' => 'Data de início',
			'data_f' => 'Data de conclusão',
			'valor' => 'Valor',
			'obs' => 'Obs.',
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
		$criteria->compare('id_estudio',$this->id_estudio);
		$criteria->compare('id_banda',$this->id_banda);
		$criteria->compare('nome',$this->nome,true);
		$criteria->compare('data_i',$this->data_i,true);
		$criteria->compare('data_f',$this->data_f,true);
		$criteria->compare('valor',$this->valor,true);
		$criteria->compare('obs',$this->obs,true);
		$criteria->compare('apagado',$this->apagado);
		$criteria->addCondition('apagado != 1');
		$criteria->order = 'nome';

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public function searchGravacoesEmAberto()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.
	
		$criteria=new CDbCriteria;
	
		$criteria->compare('id',$this->id);
		$criteria->compare('id_estudio',$this->id_estudio);
		$criteria->compare('id_banda',$this->id_banda);
		$criteria->compare('nome',$this->nome,true);
		$criteria->compare('data_i',$this->data_i,true);
		$criteria->compare('data_f',$this->data_f,true);
		$criteria->compare('valor',$this->valor,true);
		$criteria->compare('obs',$this->obs,true);
		$criteria->compare('apagado',$this->apagado);
		$criteria->addCondition('data_f is null');
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
	 * @return Gravacao the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	
	protected function afterFind(){
		parent::afterFind();
		$this->data_i=date('d/m/Y', strtotime(str_replace("-", "", $this->data_i)));
		if ($this->data_f)
			$this->data_f=date('d/m/Y', strtotime(str_replace("-", "", $this->data_f)));
	}
	
	protected function beforeSave(){
		if(parent::beforeSave()){
			$this->data_i=date('Y-m-d', strtotime(str_replace("/", "-", $this->data_i)));
			if ($this->data_f)
				$this->data_f=date('Y-m-d', strtotime(str_replace("/", "-", $this->data_f)));
			else
				$this->data_f=null;
			return TRUE;
		}
		else return FALSE;
	}
}
