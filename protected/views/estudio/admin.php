<?php
/* @var $this EstudioController */
/* @var $model Estudio */

$this->breadcrumbs=array(
	'Estudios'=>array('admin'),
	'Lista',
);

$this->menu=array(
	//array('label'=>'List Estudio', 'url'=>array('index')),
	array('label'=>'Novo Estúdio', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#estudio-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'estudio-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		//'id',
		'nome',
		'contato',
		//'apagado',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
