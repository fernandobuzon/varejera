<?php
/* @var $this IntegranteController */
/* @var $model Integrante */

$this->breadcrumbs=array(
	'Integrantes'=>array('admin'),
	'Lista',
);

$this->menu=array(
	//array('label'=>'List Integrante', 'url'=>array('index')),
	array('label'=>'Novo Integrante', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#integrante-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'integrante-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		//'id',
		'nome',
		array(
			'name' => 'id_conta',
			'header' => 'Conta pessoal',
			'value' => '$data->idConta->nome'
		),
		//'apagado',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
