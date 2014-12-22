<?php
/* @var $this TrocaController */
/* @var $model Troca */

$this->breadcrumbs=array(
	'Trocas'=>array('admin'),
	$model->idParceiro->nome,
);

$this->menu=array(
	//array('label'=>'List Troca', 'url'=>array('index')),
	array('label'=>'Nova Troca', 'url'=>array('create')),
	array('label'=>'Editar', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Apagar', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Lista', 'url'=>array('admin')),
);
?>

<div class="row">

<h1>Troca: <?php echo $model->idParceiro->nome; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		//'id',
		'data',
		array(
			'label' => 'Integrante',
			'type' => 'raw',
			'value' => $model->idIntegrante->nome
		),
		array(
			'label' => 'Parceiro',
			'type' => 'raw',
			'value' => $model->idParceiro->nome
		),
		'pago',
		'recebido'
		//'apagado',
	),
)); ?>
</div>


<div class="row">

<?php

$form=$this->beginWidget('CActiveForm', array(
	'id'=>'troca-form',
	'enableAjaxValidation'=>false,
));

echo CHtml::textField('qtde', '', array('size'=>5,'maxlength'=>5,'placeholder'=>'Quantidade'));
$modelp = new Produto;
echo CHtml::activeDropDownList(
		$modelp,'id',Produto::model()->listaProdutos(),array(
				'empty'=>'Escolha o produto',
		)
);

echo "<br>";
echo CHtml::button('Adicionar aos ENVIADOS', array(
	'ajax' => array(
		'type'=>'POST',
		'url'=>CController::createUrl('troca/AjaxTrocaEnv'),
		'success' => 'js:function(data) { $("#saida-grid").yiiGridView("update"); }',
	)
));

echo CHtml::button('Adicionar aos RECEBIDOS', array(
	'ajax' => array(
		'type'=>'POST',
		'url'=>CController::createUrl('troca/AjaxTrocaRec'),
		'success' => 'js:function(data) { $("#entrada-grid").yiiGridView("update"); }',
	)
));

echo CHtml::hiddenField('data' , $model->data, array('id' => 'data'));
echo CHtml::hiddenField('id_integrante' , $model->id_integrante, array('id' => 'id_integrante'));
echo CHtml::hiddenField('id_parceiro' , $model->id_parceiro, array('id' => 'id_parceiro'));
echo CHtml::hiddenField('id_troca' , $model->id, array('id' => 'id_troca'));

$this->endWidget();

?>

</div>

<div class="row">
<?php $this->widget('zii.widgets.grid.CGridView', array(
        'id'=>'saida-grid',
        'dataProvider'=>Saida::model()->searchByTroca($model->id),
        'columns'=>array(
                'qtde',
                array(
                        'name' => 'id_produto',
                        'header' => 'Produtos ENVIADOS',
                        'value' => '$data->idProduto->nome'
                ),
                'obs',
        		array(
        				'class'=>'CButtonColumn',
						'template'=>'{delete}',
						'buttons'=>array(
							'delete'=>array(
								'url'=>'Yii::app()->createUrl("saida/delete", array("id"=>$data->id))',
							)
						)
        		),
        ),
)); ?>
</div>

<div class="row">
<?php $this->widget('zii.widgets.grid.CGridView', array(
        'id'=>'entrada-grid',
        'dataProvider'=>Entrada::model()->searchByTroca($model->id),
        'columns'=>array(
                'qtde',
                array(
                        'name' => 'id_produto',
                        'header' => 'Produtos RECEBIDOS',
                        'value' => '$data->idProduto->nome'
                ),
                'obs',
        		array(
        				'class'=>'CButtonColumn',
						'template'=>'{delete}',
						'buttons'=>array(
							'delete'=>array(
								'url'=>'Yii::app()->createUrl("entrada/delete", array("id"=>$data->id, "r"=>"entrada/delete"))',
							)
						)
        		),
        ),
)); ?>
</div>

