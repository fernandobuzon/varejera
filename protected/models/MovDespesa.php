<?php

/**
 * This is the model class for table "mov_despesa".
 *
 * The followings are the available columns in table 'mov_despesa':
 * @property integer $id
 * @property string $data
 * @property integer $id_despesa
 * @property integer $id_integrante
 * @property string $valor
 * @property integer $pg
 * @property integer $id_saida
 * @property string $obs
 * @property integer $apagado
 *
 * The followings are the available model relations:
 * @property Saida $idSaida
 * @property Despesa $idDespesa
 * @property Integrante $idIntegrante
 */
class MovDespesa extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'mov_despesa';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('data, id_despesa, id_integrante', 'required'),
			array('id_despesa, id_integrante, pg, id_saida, apagado', 'numerical', 'integerOnly'=>true),
			array('valor', 'length', 'max'=>11),
			array('obs', 'length', 'max'=>240),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, data, id_despesa, id_integrante, valor, pg, id_saida, obs, apagado', 'safe', 'on'=>'search'),
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
			'idSaida' => array(self::BELONGS_TO, 'Saida', 'id_saida'),
			'idDespesa' => array(self::BELONGS_TO, 'Despesa', 'id_despesa'),
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
			'id_despesa' => 'Id Despesa',
			'id_integrante' => 'Id Integrante',
			'valor' => 'Valor',
			'pg' => 'Pg',
			'id_saida' => 'Id Saida',
			'obs' => 'Obs',
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
		$criteria->compare('id_despesa',$this->id_despesa);
		$criteria->compare('id_integrante',$this->id_integrante);
		$criteria->compare('valor',$this->valor,true);
		$criteria->compare('pg',$this->pg);
		$criteria->compare('id_saida',$this->id_saida);
		$criteria->compare('obs',$this->obs,true);
		$criteria->compare('apagado',$this->apagado);
		$criteria->order = 'data DESC';
		$criteria->addCondition('apagado != 1');

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return MovDespesa the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	* Custom
	*/

	/**
	 * Custom
	 */
	
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
	
	public function chkPg($id)
	{
		$model = MovDespesa::model()->findByPk($id);
		if($model->pg == 1)
			echo 'Sim';
		else
			echo 'Não';
	}
}
