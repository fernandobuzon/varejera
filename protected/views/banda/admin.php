<?php
/* @var $this BandaController */
/* @var $model Banda */

$this->breadcrumbs=array(
	'Bandas'=>array('admin'),
	'Lista',
);

$this->menu=array(
	//array('label'=>'List Banda', 'url'=>array('index')),
	array('label'=>'Nova Banda', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#banda-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'banda-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		//'id',
		array(
			'name' => 'id_genero',
			'header' => 'Gênero',
			'filter'=>CHtml::listData(Genero::model()->findAll(array('order'=>'nome')),'id','nome'),
			'value' => '$data->idGenero->nome'
		),
		array(
			'name' => 'nome',
			'header' => 'Nome',
			'filter' => CHtml::listData(Banda::model()->findAll(array('order'=>'nome')),'nome', 'nome'),
			'value' => '$data->nome'
		),
		'contato',
		'link',
		//'apagado',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
