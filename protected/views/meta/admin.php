<?php
/* @var $this MetaController */
/* @var $model Meta */

$this->breadcrumbs=array(
	'Metas'=>array('admin'),
	'Lista',
);

$this->menu=array(
	//array('label'=>'List Meta', 'url'=>array('index')),
	array('label'=>'Nova Meta', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#meta-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<a href="<?php echo Yii::app()->createUrl('meta/admin/');?>&all=1">Todas as metas</a><br>
<a href="<?php echo Yii::app()->createUrl('meta/admin/');?>">Somente metas em aberto</a>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'meta-grid',
	'dataProvider'=>$dataProvider,
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
			'name' => 'previsao',
			'header' => 'Previsão',
			'filter'=>$this->widget('zii.widgets.jui.CJuiDatePicker', array(
				'model'=>$model,
				'attribute'=>'previsao',
				'language' => 'pt-BR',
				'options'=>array(
					'dateFormat'=>'dd/mm/yy'
				)
			), true)
		),
		'nome',
		array(
			'name' => 'andamento',
			'header' => 'Andamento',
			'value' => 'nl2br($data->andamento)',
			'type'=>'raw',
			'htmlOptions'=>array('width'=>'100%'),
		),
		//'valor_pg',
		'valor_total',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
