<?php
/* @var $this TarefaController */
/* @var $model Tarefa */

$this->breadcrumbs=array(
	'Eventos'=>array('Evento/admin'),
	$model->idEvento->nome=>array('Evento/view','id'=>$model->id_evento),
	'Tarefas'=>array('admin','id_evento'=>$model->id_evento),
	$model->nome,
);

if ($model->id_integrante == Integrante::model()->chkId())
{
	$this->menu=array(
		array('label'=>'Nova Tarefa', 'url'=>array('create','id_evento'=>$model->id_evento)),
		array('label'=>'Editar', 'url'=>array('update', 'id'=>$model->id, 'id_evento'=>$model->id_evento)),
		array('label'=>'Apagar', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
		array('label'=>'Lista', 'url'=>array('admin','id_evento'=>$model->id_evento)),
	);
}
else
{
	$this->menu=array(
			array('label'=>'Nova Tarefa', 'url'=>array('create','id_evento'=>$model->id_evento)),
			array('label'=>'Lista', 'url'=>array('admin','id_evento'=>$model->id_evento)),
	);
}
?>

<h1>Tarefa: <?php echo $model->nome; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		//'id',
		'nome',
		array(
			'label' => 'Integrante',
			'type' => 'raw',
			'value' => $model->idIntegrante->nome
		),
		//'id_evento',
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
