<?php

/**
 * This is the model class for table "meta".
 *
 * The followings are the available columns in table 'meta':
 * @property integer $id
 * @property string $data
 * @property string $previsao
 * @property string $nome
 * @property string $andamento
 * @property string $valor_pg
 * @property string $valor_total
 * @property string $conclusao
 * @property integer $apagado
 */
class Meta extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'meta';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('data, previsao, nome', 'required'),
			array('apagado', 'numerical', 'integerOnly'=>true),
			array('nome', 'length', 'max'=>240),
			array('andamento', 'length', 'max'=>10000),
			array('valor_pg, valor_total', 'length', 'max'=>11),
			array('conclusao', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, data, previsao, nome, andamento, valor_pg, valor_total, conclusao, apagado', 'safe', 'on'=>'search'),
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
			'data' => 'Data',
			'previsao' => 'Previsão',
			'nome' => 'Nome',
			'andamento' => 'Andamento',
			'valor_pg' => 'Valor Pago',
			'valor_total' => 'Valor Total',
			'conclusao' => 'Conclusão',
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
		$criteria->compare('previsao',$this->previsao,true);
		$criteria->compare('nome',$this->nome,true);
		$criteria->compare('andamento',$this->andamento,true);
		$criteria->compare('valor_pg',$this->valor_pg,true);
		$criteria->compare('valor_total',$this->valor_total,true);
		$criteria->compare('conclusao',$this->conclusao,true);
		$criteria->compare('apagado',$this->apagado);
		$criteria->addCondition('apagado != 1');
		$criteria->order = 'previsao';

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public function searchAberto()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.
	
		$criteria=new CDbCriteria;
	
		$criteria->compare('id',$this->id);
		$criteria->compare('data',$this->data,true);
		$criteria->compare('previsao',$this->previsao,true);
		$criteria->compare('nome',$this->nome,true);
		$criteria->compare('andamento',$this->andamento,true);
		$criteria->compare('valor_pg',$this->valor_pg,true);
		$criteria->compare('valor_total',$this->valor_total,true);
		$criteria->compare('conclusao',$this->conclusao,true);
		$criteria->compare('apagado',$this->apagado);
		$criteria->addCondition('apagado != 1');
		$criteria->addCondition('conclusao is null');
		$criteria->order = 'previsao';
	
		return new CActiveDataProvider($this, array(
				'criteria'=>$criteria,
		));
	}
	
	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Meta the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	protected function afterFind()
	{
		if($this->data)
		{
			parent::afterFind();
			$this->data=date('d/m/Y', strtotime(str_replace("-", "", $this->data)));
			$this->previsao=date('d/m/Y', strtotime(str_replace("-", "", $this->previsao)));
			$this->conclusao=date('d/m/Y', strtotime(str_replace("-", "", $this->conclusao)));
		}
	}
	
	protected function beforeSave()
	{
		$this->conclusao=2014-02-02;
		if(parent::beforeSave())
		{
			$this->data=date('Y-m-d', strtotime(str_replace("/", "-", $this->data)));
			$this->previsao=date('Y-m-d', strtotime(str_replace("/", "-", $this->previsao)));
	
			if ($this->conclusao)
			{
				//$this->conclusao=date('Y-m-d', strtotime(str_replace("/", "-", $this->conclusao)));
				$this->conclusao=2014-02-02;
			}
			else
				$this->conclusao=2014-02-02;
				
			return TRUE;
		}
		else return FALSE;
	}
}
