<?php
/* @var $this GravacaoController */
/* @var $model Gravacao */

$this->breadcrumbs=array(
	'Gravacões'=>array('admin'),
	'Lista',
);

$this->menu=array(
	//array('label'=>'List Gravacao', 'url'=>array('index')),
	array('label'=>'Nova Gravacão', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#gravacao-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<a href="<?php echo Yii::app()->createUrl('gravacao/admin/');?>&todos=1">Todas as gravações</a><br>
<a href="<?php echo Yii::app()->createUrl('gravacao/admin/');?>">Somente gravações em aberto</a>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'gravacao-grid',
	'dataProvider'=>$dataProvider,
	'filter'=>$model,
	'columns'=>array(
		//'id',
		array(
			'name' => 'id_estudio',
			'header' => 'Estúdio',
			'filter'=>CHtml::listData(Estudio::model()->findAll(array('condition'=>'apagado != 1','order'=>'nome')),'id','nome'),
			'value' => '$data->idEstudio->nome'
		),
		array(
			'name' => 'id_banda',
			'header' => 'Banda',
			'filter'=>CHtml::listData(Banda::model()->findAll(array('condition'=>'apagado != 1','order'=>'nome')),'id','nome'),
			'value' => '$data->idBanda->nome'
		),
		'nome',
		'data_i',
		//'data_f',
		'valor',
		array(
				'name' => 'obs',
				'header' => 'Obs.',
				'value' => 'nl2br($data->obs)',
				'type'=>'raw',
				'htmlOptions'=>array('width'=>'100%'),
		),
		//'apagado',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
