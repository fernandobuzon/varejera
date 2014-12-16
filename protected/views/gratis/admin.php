<?php
/* @var $this GratisController */
/* @var $model Entrada */

$this->breadcrumbs=array(
	'Recebimentos'=>array('admin'),
	'Lista',
);

$this->menu=array(
	//array('label'=>'List Entrada', 'url'=>array('index')),
	array('label'=>'Novo recebimento', 'url'=>array('create')),
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
	'dataProvider'=>$model->searchGratis(),
	'filter'=>$model,
	'columns'=>array(
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
			'name' => 'id_integrante',
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
		'obs',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
