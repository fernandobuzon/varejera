<?php

/**
 * This is the model class for table "evento".
 *
 * The followings are the available columns in table 'evento':
 * @property integer $id
 * @property string $nome
 * @property string $data
 * @property string $local
 * @property string $horario
 * @property double $ingresso
 * @property integer $concluido
 * @property integer $apagado
 */
class Evento extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'evento';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nome, data, local, horario', 'required'),
			array('concluido, apagado', 'numerical', 'integerOnly'=>true),
			array('ingresso', 'numerical'),
			array('nome, local', 'length', 'max'=>240),
			array('horario', 'length', 'max'=>15),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, nome, data, local, horario, ingresso, concluido, apagado', 'safe', 'on'=>'search'),
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
			'data' => 'Data',
			'local' => 'Local',
			'horario' => 'Horário',
			'ingresso' => 'Ingresso',
			'concluido' => 'Concluído',
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
		$criteria->compare('data',$this->data,true);
		$criteria->compare('local',$this->local,true);
		$criteria->compare('horario',$this->horario,true);
		$criteria->compare('ingresso',$this->ingresso);
		$criteria->compare('concluido',$this->concluido);
		$criteria->compare('apagado',$this->apagado);
		$criteria->addCondition('apagado != 1');
		$criteria->order = 'nome';

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
	public function searchEventosEmAberto()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.
	
		$criteria=new CDbCriteria;
	
		$criteria->compare('id',$this->id);
		$criteria->compare('nome',$this->nome,true);
		$criteria->compare('data',$this->data,true);
		$criteria->compare('local',$this->local,true);
		$criteria->compare('horario',$this->horario,true);
		$criteria->compare('ingresso',$this->ingresso);
		$criteria->compare('concluido',$this->concluido);
		$criteria->compare('apagado',$this->apagado);
		$criteria->addCondition('concluido = 0');
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
	 * @return Evento the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	
	public function chkConcluido($id)
	{
		$model = Evento::model()->findByPk($id);
		if($model->concluido == 1)
			echo 'Sim';
		else
			echo 'Não';
	}
	
	public function chkEvento($id)
	{
		$model = Evento::model()->findByPk($id);
		return $model->nome;
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
