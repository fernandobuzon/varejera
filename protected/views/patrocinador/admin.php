<?php
/* @var $this PatrocinadorController */
/* @var $model Patrocinador */

$this->breadcrumbs=array(
	'Patrocinadors'=>array('admin'),
	'Lista',
);

$this->menu=array(
	//array('label'=>'List Patrocinador', 'url'=>array('index')),
	array('label'=>'Novo Patrocinador', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#patrocinador-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'patrocinador-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		//'id',
		'nome',
		'contato',
		'link',
		//'endereco',
		//'cidade',
		//'cep',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
