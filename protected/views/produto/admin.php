<?php
/* @var $this ProdutoController */
/* @var $model Produto */

$this->breadcrumbs=array(
	'Produtos'=>array('admin'),
	'Lista',
);

$this->menu=array(
	//array('label'=>'List Produto', 'url'=>array('index')),
	array('label'=>'Novo Produto', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#produto-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'produto-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		//'id',
		array(
			'name' => 'id_tipo',
			'header' => 'Tipo',
			'filter'=>CHtml::listData(Tipo::model()->findAll(array('order'=>'nome')),'id','nome'),
			'value' => '$data->idTipo->nome'
		),
		array(
			'name' => 'id_banda',
			'header' => 'Banda',
			'filter'=>CHtml::listData(Banda::model()->findAll(array('order'=>'nome')),'id','nome'),
			'value' => '$data->idBanda->nome'
		),
		'nome',
		'obs',
		//'apagado',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
