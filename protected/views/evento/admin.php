<?php
/* @var $this EventoController */
/* @var $model Evento */

$this->breadcrumbs=array(
	'Eventos'=>array('admin'),
	'Lista',
);

$this->menu=array(
	//array('label'=>'List Evento', 'url'=>array('index')),
	array('label'=>'Novo Evento', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#evento-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<a href="<?php echo Yii::app()->createUrl('evento/admin/');?>&todos=1">Todos os eventos</a><br>
<a href="<?php echo Yii::app()->createUrl('evento/admin/');?>">Somente eventos em aberto</a>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'evento-grid',
	'dataProvider'=>$dataProvider,
	'filter'=>$model,
	'columns'=>array(
		//'id',
		'nome',
		'data',
		'local',
		//'horario',
		'ingresso',
		//'concluido',
		//'apagado',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
