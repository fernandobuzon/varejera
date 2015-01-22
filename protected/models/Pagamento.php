<?php

/**
 * This is the model class for table "pagamento".
 *
 * The followings are the available columns in table 'pagamento':
 * @property integer $id
 * @property integer $id_gravacao
 * @property integer $id_integrante
 * @property string $data
 * @property string $valor
 * @property string $obs
 * @property integer $apagado
 *
 * The followings are the available model relations:
 * @property Integrante $idIntegrante
 * @property Gravacao $idGravacao
 */
class Pagamento extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'pagamento';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_gravacao, id_integrante, data', 'required'),
			array('id_gravacao, id_integrante, apagado', 'numerical', 'integerOnly'=>true),
			array('valor', 'length', 'max'=>11),
			array('obs', 'length', 'max'=>240),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, id_gravacao, id_integrante, data, valor, obs, apagado', 'safe', 'on'=>'search'),
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
			'idIntegrante' => array(self::BELONGS_TO, 'Integrante', 'id_integrante'),
			'idGravacao' => array(self::BELONGS_TO, 'Gravacao', 'id_gravacao'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'id_gravacao' => 'Gravação',
			'id_integrante' => 'Integrante',
			'data' => 'Data',
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
		$criteria->compare('id_gravacao',$this->id_gravacao);
		$criteria->compare('id_integrante',$this->id_integrante);
		$criteria->compare('data',$this->data,true);
		$criteria->compare('valor',$this->valor,true);
		$criteria->compare('obs',$this->obs,true);
		$criteria->compare('apagado',$this->apagado);
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
	 * @return Pagamento the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	
	public function searchByGravacao($id)
	{
		$criteria=new CDbCriteria;
		$criteria->compare('id_gravacao',$id);
		$criteria->addCondition('apagado != 1');
		$criteria->order = 'data desc, id_integrante';
	
		return new CActiveDataProvider($this, array(
				'criteria'=>$criteria,
				'pagination' => array(
						'pageSize' => 100,
				),
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
}
