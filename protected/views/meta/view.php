<?php
/* @var $this MetaController */
/* @var $model Meta */

$this->breadcrumbs=array(
	'Metas'=>array('admin'),
	$model->nome,
);

$this->menu=array(
	//array('label'=>'List Meta', 'url'=>array('index')),
	array('label'=>'Nova Meta', 'url'=>array('create')),
	array('label'=>'Editar Meta', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Apagar', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Lista', 'url'=>array('admin')),
);
?>

<h1>Meta: <?php echo $model->nome; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		//'id',
		'data',
		'previsao',
		'nome',
		array(
			'name'=>'andamento',
			'value'=>nl2br($model->andamento),
			'type' => 'html',
		),
		'valor_pg',
		'valor_total',
		'conclusao',
		//'apagado',
	),
)); ?>
