<?php
/* @var $this GeneroController */
/* @var $model Genero */

$this->breadcrumbs=array(
	'Generos'=>array('admin'),
	'Lista',
);

$this->menu=array(
	//array('label'=>'List Genero', 'url'=>array('index')),
	array('label'=>'Novo Gênero', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#genero-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'genero-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		//'id',
		'nome',
		//'apagado',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
