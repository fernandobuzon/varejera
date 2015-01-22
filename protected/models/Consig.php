<?php

/**
 * This is the model class for table "consig".
 *
 * The followings are the available columns in table 'consig':
 * @property integer $id
 * @property string $data
 * @property integer $id_integrante
 * @property integer $qtde
 * @property integer $id_produto
 * @property integer $id_parceiro
 * @property string $obs
 * @property integer $baixado
 * @property integer $apagado
 *
 * The followings are the available model relations:
 * @property Parceiro $idParceiro
 * @property Integrante $idIntegrante
 * @property Produto $idProduto
 * @property Saida[] $saidas
 */
class Consig extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'consig';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('data, id_integrante, qtde, id_produto, id_parceiro, obs', 'required'),
			array('id_integrante, qtde, id_produto, id_parceiro, baixado, apagado', 'numerical', 'integerOnly'=>true),
			array('obs', 'length', 'max'=>500),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, data, id_integrante, qtde, id_produto, id_parceiro, obs, baixado, apagado', 'safe', 'on'=>'search'),
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
			'idParceiro' => array(self::BELONGS_TO, 'Parceiro', 'id_parceiro'),
			'idIntegrante' => array(self::BELONGS_TO, 'Integrante', 'id_integrante'),
			'idProduto' => array(self::BELONGS_TO, 'Produto', 'id_produto'),
			'saidas' => array(self::HAS_MANY, 'Saida', 'id_consig'),
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
			'qtde' => 'Qtde.',
			'id_produto' => 'Produto',
			'id_parceiro' => 'Parceiro',
			'obs' => 'Obs',
			'baixado' => 'Baixados',
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
		$criteria->compare('qtde',$this->qtde);
		$criteria->compare('id_produto',$this->id_produto);
		$criteria->compare('id_parceiro',$this->id_parceiro);
		$criteria->compare('obs',$this->obs,true);
		$criteria->compare('baixado',$this->baixado);
		$criteria->compare('apagado',$this->apagado);
		$criteria->addCondition('apagado != 1');
		$criteria->order = 'baixado, data DESC';

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Consig the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

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
	
	public function chkBaixado($id)
	{
		$model = Consig::model()->findByPk($id);
		if($model->baixado == 1)
			echo 'Sim';
		else
			echo 'Não';
	}
}
