<?php
/* @var $this EstoqueController */
/* @var $model Estoque */

$this->breadcrumbs=array(
		'Relatórios',
		'Estoque'
);

//$this->menu=array(
//	//array('label'=>'List Estoque', 'url'=>array('index')),
//	array('label'=>'Create Estoque', 'url'=>array('create')),
//);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#estoque-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<a href="<?php echo Yii::app()->createUrl('estoque/admin/');?>&listOp=all">Todos os produtos</a><br>
<a href="<?php echo Yii::app()->createUrl('estoque/admin/');?>&listOp=estoque">Somente produtos em estoque</a><br>
<a href="<?php echo Yii::app()->createUrl('estoque/admin/');?>&listOp=aguardando">Somente produtos aguardando chegar</a>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'estoque-grid',
	'dataProvider'=>$dataProvider,
	'filter'=>$model,
	'columns'=>array(
		//'id',
		array(
			'name' => 'qtde',
			'header' => 'Qtde.',
			'filter'=>false,
			'value' => '$data->qtde'
		),
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
	),
)); ?>
