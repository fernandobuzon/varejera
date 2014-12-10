<?php
/* @var $this TipoController */
/* @var $model Tipo */

$this->breadcrumbs=array(
	'Tipos'=>array('admin'),
	'Lista',
);

$this->menu=array(
	//array('label'=>'List Tipo', 'url'=>array('index')),
	array('label'=>'Novo Tipo', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#tipo-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'tipo-grid',
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
