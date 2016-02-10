<?php
/* @var $this TarefaController */
/* @var $model Tarefa */

$this->breadcrumbs=array(
	'Eventos'=>array('Evento/admin'),
	$model->idEvento->nome=>array('Evento/view','id'=>$model->id_evento),
	'Tarefas'=>array('admin','id_evento'=>$model->id_evento),
	$model->nome=>array('view','id'=>$model->id),
	'Editar',
);

$this->menu=array(
	//array('label'=>'List Tarefa', 'url'=>array('index')),
	array('label'=>'Nova Tarefa', 'url'=>array('create','id_evento'=>$model->id_evento)),
	array('label'=>'Detalhes', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Lista', 'url'=>array('admin','id_evento'=>$model->id_evento)),
);
?>

<h1>Tarefa: <?php echo $model->nome; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>