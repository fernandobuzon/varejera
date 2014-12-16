<?php

/**
 * This is the model class for table "saida".
 *
 * The followings are the available columns in table 'saida':
 * @property integer $id
 * @property string $data
 * @property integer $qtde
 * @property integer $id_integrante
 * @property integer $id_produto
 * @property string $ocasiao
 * @property integer $id_parceiro
 * @property string $valor
 * @property integer $fiado
 * @property string $quitado
 * @property string $obs
 * @property integer $id_troca
 * @property integer $id_consig
 * @property integer $apagado
 *
 * The followings are the available model relations:
 * @property MovDespesa[] $movDespesa
 * @property Consig $idConsig
 * @property Integrante $idIntegrante
 * @property Parceiro $idParceiro
 * @property Produto $idProduto
 * @property Troca $idTroca
 */
class Saida extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'saida';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('data, id_produto, id_parceiro', 'required'),
			array('qtde, id_integrante, id_produto, id_parceiro, fiado, id_troca, id_consig, apagado', 'numerical', 'integerOnly'=>true),
			array('ocasiao', 'length', 'max'=>200),
			array('valor', 'length', 'max'=>11),
			array('obs', 'length', 'max'=>300),
			array('quitado', 'safe'),
			array('quitado', 'default', 'setOnEmpty' => true, 'value' => null),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, data, qtde, id_integrante, id_produto, ocasiao, id_parceiro, valor, fiado, quitado, obs, id_troca, id_consig, apagado', 'safe', 'on'=>'search'),
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
			'movDespesa' => array(self::HAS_MANY, 'MovDespesa', 'id_saida'),
			'idConsig' => array(self::BELONGS_TO, 'Consig', 'id_consig'),
			'idIntegrante' => array(self::BELONGS_TO, 'Integrante', 'id_integrante'),
			'idParceiro' => array(self::BELONGS_TO, 'Parceiro', 'id_parceiro'),
			'idProduto' => array(self::BELONGS_TO, 'Produto', 'id_produto'),
			'idTroca' => array(self::BELONGS_TO, 'Troca', 'id_troca'),
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
			'id_integrante' => 'Id Integrante',
			'id_produto' => 'Id Produto',
			'ocasiao' => 'Ocasiao',
			'id_parceiro' => 'Id Parceiro',
			'valor' => 'Valor',
			'fiado' => 'Fiado',
			'quitado' => 'Quitado',
			'obs' => 'Obs',
			'id_troca' => 'Id Troca',
			'id_consig' => 'Id Consig',
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
		$criteria->compare('data',($this->data ? date('Y-m-d', strtotime(str_replace('/', '-', $this->data))) : null ));
		$criteria->compare('qtde',$this->qtde);
		$criteria->compare('id_integrante',$this->id_integrante);
		$criteria->compare('id_produto',$this->id_produto);
		$criteria->compare('ocasiao',$this->ocasiao,true);
		$criteria->compare('id_parceiro',$this->id_parceiro);
		$criteria->compare('valor',$this->valor,true);
		$criteria->compare('fiado',$this->fiado);
		$criteria->compare('quitado',($this->quitado ? date('Y-m-d', strtotime(str_replace('/', '-', $this->quitado))) : null ));
		$criteria->compare('obs',$this->obs,true);
		$criteria->compare('id_troca',$this->id_troca);
		$criteria->compare('id_consig',$this->id_consig);
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
	 * @return Saida the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function searchVendas()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.
	
		$criteria=new CDbCriteria;
	
		$criteria->compare('id',$this->id);
		$criteria->compare('data',($this->data ? date('Y-m-d', strtotime(str_replace('/', '-', $this->data))) : null ));
		$criteria->compare('qtde',$this->qtde);
		$criteria->compare('id_integrante',$this->id_integrante);
		$criteria->compare('id_produto',$this->id_produto);
		$criteria->compare('ocasiao',$this->ocasiao,true);
		$criteria->compare('id_parceiro',$this->id_parceiro);
		$criteria->compare('valor',$this->valor,true);
		$criteria->compare('fiado',$this->fiado);
		$criteria->compare('quitado',($this->quitado ? date('Y-m-d', strtotime(str_replace('/', '-', $this->quitado))) : null ));
		$criteria->compare('obs',$this->obs,true);
		$criteria->compare('apagado',$this->apagado);
		$criteria->addCondition('apagado != 1');
		$criteria->addCondition('valor > 0');
		$criteria->order = 'data DESC';
	
		return new CActiveDataProvider($this, array(
				'criteria'=>$criteria,
		));
	}
	
	public function searchVendasFiado()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.
	
		$criteria=new CDbCriteria;
	
		$criteria->compare('id',$this->id);
		$criteria->compare('data',($this->data ? date('Y-m-d', strtotime(str_replace('/', '-', $this->data))) : null ));
		$criteria->compare('qtde',$this->qtde);
		$criteria->compare('id_integrante',$this->id_integrante);
		$criteria->compare('id_produto',$this->id_produto);
		$criteria->compare('ocasiao',$this->ocasiao,true);
		$criteria->compare('id_parceiro',$this->id_parceiro);
		$criteria->compare('valor',$this->valor,true);
		$criteria->compare('fiado',$this->fiado);
		$criteria->compare('quitado',($this->quitado ? date('Y-m-d', strtotime(str_replace('/', '-', $this->quitado))) : null ));
		$criteria->compare('obs',$this->obs,true);
		$criteria->compare('apagado',$this->apagado);
		$criteria->addCondition('apagado != 1');
		$criteria->addCondition('valor > 0');
		$criteria->addCondition('fiado = 1');
		$criteria->addCondition('quitado is null');
		$criteria->order = 'data DESC';
	
		return new CActiveDataProvider($this, array(
				'criteria'=>$criteria,
		));
	}

	public function searchCortesias()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.
	
		$criteria=new CDbCriteria;
	
		$criteria->compare('id',$this->id);
		$criteria->compare('data',($this->data ? date('Y-m-d', strtotime(str_replace('/', '-', $this->data))) : null ));
		$criteria->compare('qtde',$this->qtde);
		$criteria->compare('id_integrante',$this->id_integrante);
		$criteria->compare('id_produto',$this->id_produto);
		$criteria->compare('ocasiao',$this->ocasiao,true);
		$criteria->compare('id_parceiro',$this->id_parceiro);
		$criteria->compare('valor',$this->valor,true);
		$criteria->compare('fiado',$this->fiado);
		$criteria->compare('quitado',($this->quitado ? date('Y-m-d', strtotime(str_replace('/', '-', $this->quitado))) : null ));
		$criteria->compare('obs',$this->obs,true);
		$criteria->compare('apagado',$this->apagado);
		$criteria->addCondition('apagado != 1');
		$criteria->addCondition('valor = 0');
		$criteria->addCondition('id_troca is null');
		$criteria->order = 'data DESC';
	
		return new CActiveDataProvider($this, array(
				'criteria'=>$criteria,
		));
	}

	protected function afterFind(){
		parent::afterFind();
		$this->data=date('d/m/Y', strtotime(str_replace("-", "", $this->data)));
		if ($this->quitado)
			$this->quitado=date('d/m/Y', strtotime(str_replace("-", "", $this->quitado)));
	}
	
	protected function beforeSave(){
		if(parent::beforeSave()){
			$this->data=date('Y-m-d', strtotime(str_replace("/", "-", $this->data)));
			if ($this->quitado)
				$this->quitado=date('Y-m-d', strtotime(str_replace("/", "-", $this->quitado)));
			return TRUE;
		}
		else return FALSE;
	}
	
	public function chkFiado($id)
	{
		$model = Saida::model()->findByPk($id);
		if($model->fiado == 1)
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
