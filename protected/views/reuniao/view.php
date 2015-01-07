<?php
/* @var $this ReuniaoController */
/* @var $model Reuniao */

$this->breadcrumbs=array(
	'Eventos'=>array('Evento/admin'),
	$model->idEvento->nome=>array('Evento/view','id'=>$model->id_evento),
	'Reuniões'=>array('admin','id_evento'=>$model->id_evento),
	$model->data,
);

$this->menu=array(
	//array('label'=>'List Reuniao', 'url'=>array('index')),
	array('label'=>'Nova Reunião', 'url'=>array('create','id_evento'=>$model->id_evento)),
	array('label'=>'Editar', 'url'=>array('update', 'id'=>$model->id,'id_evento'=>$model->id_evento)),
	array('label'=>'Apagar', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Lista', 'url'=>array('admin','id_evento'=>$model->id_evento)),
);
?>

<h1>Reunião: <?php echo $model->data; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		//'id',
		'data',
		array(
			'name'=>'ata',
			'value'=>nl2br($model->ata),
			'type' => 'html',
		),
		//'id_evento',
		//'apagado',
	),
)); ?>
