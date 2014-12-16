<?php
/* @var $this CompraController */
/* @var $model Entrada */

$this->breadcrumbs=array(
	'Compras'=>array('admin'),
	'Lista',
);

$this->menu=array(
	//array('label'=>'List Entrada', 'url'=>array('index')),
	array('label'=>'Nova compra', 'url'=>array('create')),
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

<a href="<?php echo Yii::app()->createUrl('compra/admin/');?>">Todas as compras</a><br>
<a href="<?php echo Yii::app()->createUrl('compra/admin/');?>&fiado=1">Somente compras pendentes (a pagar)</a>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'entrada-grid',
	'dataProvider'=>$dataProvider,
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
			'name' => 'id_produto',
			'header' => 'Produto',
			'filter'=>CHtml::listData(Produto::model()->findAll(array('order'=>'nome')),'id','nome'),
			'value' => '$data->idProduto->nome'	
		),
		'ocasiao',
		'valor',
		array(
			'name' => 'recebido',
			'header' => 'Recebido?',
			'filter'=>array(0=>"Não",1=>"Sim"),
			'value' => 'Entrada::Model()->chkRecebido($data->id)'
		),
		'obs',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
