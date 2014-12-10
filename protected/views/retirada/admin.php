<?php
/* @var $this RetiradaController */
/* @var $model Retirada */

$this->breadcrumbs=array(
	'Retiradas'=>array('index'),
	'Lista',
);

$this->menu=array(
	//array('label'=>'List Retirada', 'url'=>array('index')),
	array('label'=>'Nova Retirada', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#retirada-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'retirada-grid',
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
		//'apagado',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
