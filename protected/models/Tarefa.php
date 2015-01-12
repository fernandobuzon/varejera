<?php

/**
 * This is the model class for table "tarefa".
 *
 * The followings are the available columns in table 'tarefa':
 * @property integer $id
 * @property string $nome
 * @property integer $id_integrante
 * @property integer $id_evento
 * @property string $andamento
 * @property string $conclusao
 * @property string $valor_pg
 * @property string $valor_total
 * @property integer $apagado
 *
 * The followings are the available model relations:
 * @property Evento $idEvento
 * @property Integrante $idIntegrante
 */
class Tarefa extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tarefa';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nome, id_integrante, id_evento, andamento', 'required'),
			array('id_integrante, id_evento, apagado', 'numerical', 'integerOnly'=>true),
			array('nome', 'length', 'max'=>240),
			array('andamento', 'length', 'max'=>10000),
			array('valor_pg, valor_total', 'length', 'max'=>11),
			array('conclusao', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, nome, id_integrante, id_evento, andamento, conclusao, valor_pg, valor_total, apagado', 'safe', 'on'=>'search'),
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
			'idEvento' => array(self::BELONGS_TO, 'Evento', 'id_evento'),
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
			'nome' => 'Nome',
			'id_integrante' => 'Responsável',
			'id_evento' => 'Evento',
			'andamento' => 'Andamento',
			'conclusao' => 'Conclusão',
			'valor_pg' => 'Valor Pago',
			'valor_total' => 'Valor Total',
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
		$criteria->compare('id_integrante',$this->id_integrante);
		$criteria->compare('id_evento',$this->id_evento);
		$criteria->compare('andamento',$this->andamento,true);
		$criteria->compare('conclusao',$this->conclusao,true);
		$criteria->compare('valor_pg',$this->valor_pg,true);
		$criteria->compare('valor_total',$this->valor_total,true);
		$criteria->compare('apagado',$this->apagado);
		$criteria->addCondition('apagado != 1');
		$criteria->order = 'conclusao';

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
	public function searchByIdEvento($id_evento)
	{
		// @todo Please modify the following code to remove attributes that should not be searched.
	
		$criteria=new CDbCriteria;
	
		$criteria->compare('id',$this->id);
		$criteria->compare('nome',$this->nome,true);
		$criteria->compare('id_integrante',$this->id_integrante);
		$criteria->compare('id_evento',$this->id_evento);
		$criteria->compare('andamento',$this->andamento,true);
		$criteria->compare('conclusao',$this->conclusao,true);
		$criteria->compare('valor_pg',$this->valor_pg,true);
		$criteria->compare('valor_total',$this->valor_total,true);
		$criteria->compare('apagado',$this->apagado);
		$criteria->compare('id_evento',$id_evento);
		$criteria->addCondition('apagado != 1');
		$criteria->order = 'conclusao';
	
		return new CActiveDataProvider($this, array(
					'criteria'=>$criteria,
			));
	}	

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Tarefa the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	
	protected function afterFind()
	{
		if($this->conclusao)
		{
			parent::afterFind();
			$this->conclusao=date('d/m/Y', strtotime(str_replace("-", "", $this->conclusao)));
		}
	}
	
	protected function beforeSave()
	{
		if(parent::beforeSave()){
			if($this->conclusao)
			{
				$this->conclusao=date('Y-m-d', strtotime(str_replace("/", "-", $this->conclusao)));
				return TRUE;
			}
			else
			{
				$this->conclusao=NULL;
				return TRUE;
			}
		}
		else return FALSE;
	}
}
