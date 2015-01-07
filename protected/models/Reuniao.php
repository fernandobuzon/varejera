<?php

/**
 * This is the model class for table "reuniao".
 *
 * The followings are the available columns in table 'reuniao':
 * @property integer $id
 * @property string $data
 * @property string $ata
 * @property integer $id_evento
 * @property integer $apagado
 *
 * The followings are the available model relations:
 * @property Evento $idEvento
 */
class Reuniao extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'reuniao';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('data, ata, id_evento', 'required'),
			array('id_evento, apagado', 'numerical', 'integerOnly'=>true),
			array('ata', 'length', 'max'=>10000),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, data, ata, id_evento, apagado', 'safe', 'on'=>'search'),
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
			'ata' => 'Ata',
			'id_evento' => 'Id Evento',
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
		$criteria->compare('ata',$this->ata,true);
		$criteria->compare('id_evento',$this->id_evento);
		$criteria->compare('apagado',$this->apagado);
		$criteria->addCondition('apagado != 1');
		$criteria->order = 'data';

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
	public function searchByIdEvento($id_evento)
	{
		// @todo Please modify the following code to remove attributes that should not be searched.
	
		$criteria=new CDbCriteria;
	
		$criteria->compare('id',$this->id);
		$criteria->compare('data',$this->data,true);
		$criteria->compare('ata',$this->ata,true);
		$criteria->compare('id_evento',$this->id_evento);
		$criteria->compare('apagado',$this->apagado);
		$criteria->compare('id_evento',$id_evento);
		$criteria->addCondition('apagado != 1');
		$criteria->order = 'data';
	
		return new CActiveDataProvider($this, array(
				'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Reuniao the static model class
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
