<?php
/* @var $this TarefaController */
/* @var $model Tarefa */

$this->breadcrumbs=array(
	'Eventos'=>array('Evento/admin'),
	Evento::model()->chkEvento($_GET['id_evento'])=>array('Evento/view','id'=>$_GET['id_evento']),
	'Tarefas'=>array('admin','id_evento'=>$_GET['id_evento']),
	'Nova',
);

$this->menu=array(
	//array('label'=>'List Tarefa', 'url'=>array('index')),
	array('label'=>'Lista', 'url'=>array('admin','id_evento'=>$_GET['id_evento'])),
);
?>

<h1>Nova Tarefa</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>