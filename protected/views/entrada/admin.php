<?php
/* @var $this EntradaController */
/* @var $model Entrada */

$this->breadcrumbs=array(
	'Entradas'=>array('admin'),
	'Lista',
);

$this->menu=array(
	//array('label'=>'List Entrada', 'url'=>array('index')),
	array('label'=>'Nova Entrada', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#entrada-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'entrada-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		//'id',
		array(
			'name' => 'data',
			'header' => 'Data',
			'filter'=>$this->widget('zii.widgets.jui.CJuiDatePicker', array(
        		'model'=>$model,
        		'attribute'=>'data',
				'language' => 'pt-BR',
				'options'=>array(
					'dateFormat'=>'dd/mm/yy'
				)	
    		), true)
		),
		array(
			'name' => 'idIntegrante',
			'header' => 'Integrante',
			'filter'=>CHtml::listData(Integrante::model()->findAll(array('order'=>'nome')),'id','nome'),
			'value' => '$data->idIntegrante->nome'
		),
		'qtde',
		array(
			'name' => 'id_parceiro',
			'header' => 'Parceiro',
			'filter'=>CHtml::listData(Parceiro::model()->findAll(array('order'=>'nome')),'id','nome'),
			'value' => '$data->idParceiro->nome'
		),
		array(
			'name' => 'id_produto',
			'header' => 'Produto',
			'filter'=>CHtml::listData(Produto::model()->findAll(array('order'=>'nome')),'id','nome'),
			'value' => '$data->idProduto->nome'	
		),
		'valor',
		array(
			'name' => 'pg',
			'header' => 'Pago?',
			'filter'=>array(0=>"Não",1=>"Sim"),
			'value' => 'Entrada::Model()->chkPg($data->id)'
		),
		array(
			'name' => 'recebido',
			'header' => 'Recebido?',
			'filter'=>array(0=>"Não",1=>"Sim"),
			'value' => 'Entrada::Model()->chkRecebido($data->id)'
		),
		/*
		'id_troca',
		'apagado',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
