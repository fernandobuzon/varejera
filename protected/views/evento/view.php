<?php
/* @var $this EventoController */
/* @var $model Evento */

$this->breadcrumbs=array(
	'Eventos'=>array('admin'),
	$model->nome,
);

$this->menu=array(
	//array('label'=>'List Evento', 'url'=>array('index')),
	array('label'=>'Novo Evento', 'url'=>array('create')),
	array('label'=>'Editar', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Apagar', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Lista', 'url'=>array('admin')),
);
?>

<h1>Evento: <?php echo $model->nome; ?></h1>

<?php if ($model->concluido == 1) $concluido = 'Sim'; else $concluido = 'Não'; ?>

<div class='row'>
<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		//'id',
		'nome',
		'data',
		'local',
		'horario',
		'ingresso',
		array(
			'label' => 'Concluído?',
			'type' => 'raw',
			'value' => "$concluido"
		)
		//'apagado',
	),
)); ?>
</div>

<div class='row'>
<br><center>

<?php echo CHtml::link('Reuniões',array('reuniao/admin','id_evento'=>"$model->id")); ?> -
<?php echo CHtml::link('Patrocínios',array('patrocinio/admin','id_evento'=>"$model->id")); ?> -
<?php echo CHtml::link('Tarefas',array('tarefa/admin','id_evento'=>"$model->id")); ?> - 
<?php echo CHtml::link('Resumo',array('resumo/index','id_evento'=>"$model->id")); ?>
</center>
</div>