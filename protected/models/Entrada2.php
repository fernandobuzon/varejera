<?php

/**
 * This is the model class for table "entrada".
 *
 * The followings are the available columns in table 'entrada':
 * @property integer $id
 * @property string $data
 * @property integer $qtde
 * @property integer $id_parceiro
 * @property integer $id_produto
 * @property string $valor
 * @property integer $id_integrante
 * @property integer $pg
 * @property integer $recebido
 * @property integer $id_troca
 * @property integer $apagado
 *
 * The followings are the available model relations:
 * @property Troca $idTroca
 * @property Integrante $idIntegrante
 * @property Parceiro $idParceiro
 * @property Produto $idProduto
 */

class Entrada extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'entrada';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('data, qtde, id_parceiro, id_produto, id_integrante', 'required'),
			array('qtde, id_parceiro, id_produto, id_integrante, pg, recebido, id_troca, apagado', 'numerical', 'integerOnly'=>true),
			array('valor', 'length', 'max'=>11),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, data, qtde, id_parceiro, id_produto, valor, id_integrante, pg, recebido, id_troca, apagado', 'safe', 'on'=>'search'),
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
			'idTroca' => array(self::BELONGS_TO, 'Troca', 'id_troca'),
			'idIntegrante' => array(self::BELONGS_TO, 'Integrante', 'id_integrante'),
			'idParceiro' => array(self::BELONGS_TO, 'Parceiro', 'id_parceiro'),
			'idProduto' => array(self::BELONGS_TO, 'Produto', 'id_produto'),
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
			'qtde' => 'Qtde',
			'id_parceiro' => 'Id Parceiro',
			'id_produto' => 'Id Produto',
			'valor' => 'Valor',
			'id_integrante' => 'Id Integrante',
			'pg' => 'Pg',
			'recebido' => 'Recebido',
			'id_troca' => 'Id Troca',
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
		$criteria->compare('qtde',$this->qtde);
		$criteria->compare('id_parceiro',$this->id_parceiro);
		$criteria->compare('id_produto',$this->id_produto);
		$criteria->compare('valor',$this->valor,true);
		$criteria->compare('id_integrante',$this->id_integrante);
		$criteria->compare('pg',$this->pg);
		$criteria->compare('recebido',$this->recebido);
		$criteria->compare('id_troca',$this->id_troca);
		$criteria->compare('apagado',$this->apagado);
		$criteria->addCondition('apagado != 1');
		$criteria->order = 'data DESC';

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public function searchCompras()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.
	
		$criteria=new CDbCriteria;
	
		$criteria->compare('id',$this->id);
		$criteria->compare('data',$this->data,true);
		$criteria->compare('qtde',$this->qtde);
		$criteria->compare('id_parceiro',$this->id_parceiro);
		$criteria->compare('id_produto',$this->id_produto);
		$criteria->compare('valor',$this->valor,true);
		$criteria->compare('id_integrante',$this->id_integrante);
		$criteria->compare('pg',$this->pg);
		$criteria->compare('recebido',$this->recebido);
		$criteria->compare('id_troca',$this->id_troca);
		$criteria->compare('apagado',$this->apagado);
		$criteria->addCondition('valor > 0');
		$criteria->addCondition('apagado != 1');
		$criteria->order = 'data DESC';
	
		return new CActiveDataProvider($this, array(
				'criteria'=>$criteria,
		));
	}

	public function searchGratis()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.
	
		$criteria=new CDbCriteria;
	
		$criteria->compare('id',$this->id);
		$criteria->compare('data',$this->data,true);
		$criteria->compare('qtde',$this->qtde);
		$criteria->compare('id_parceiro',$this->id_parceiro);
		$criteria->compare('id_produto',$this->id_produto);
		$criteria->compare('valor',$this->valor,true);
		$criteria->compare('id_integrante',$this->id_integrante);
		$criteria->compare('pg',$this->pg);
		$criteria->compare('recebido',$this->recebido);
		$criteria->compare('id_troca',$this->id_troca);
		$criteria->compare('apagado',$this->apagado);
		$criteria->addCondition('valor = 0');
		$criteria->addCondition('id_troca is NULL');
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
	 * @return Entrada the static model class
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

	public function chkPg($id)
	{
		$model = Entrada::model()->findByPk($id);
		if($model->pg == 1)
			echo 'Sim';
		else
			echo 'Não';
	}

	public function chkRecebido($id)
	{
		$model = Entrada::model()->findByPk($id);
		if($model->recebido == 1)
			echo 'Sim';
		else
			echo 'Não';
	}

	public function searchByTroca($id)
	{
		$criteria=new CDbCriteria;
		$criteria->compare('id_troca',$id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}
