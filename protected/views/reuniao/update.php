<?php
/* @var $this ReuniaoController */
/* @var $model Reuniao */

$this->breadcrumbs=array(
	'Eventos'=>array('Evento/admin'),
	$model->idEvento->nome=>array('Evento/view','id'=>$model->id_evento),
	'Reuniões'=>array('admin','id_evento'=>$model->id_evento),
	$model->data=>array('view','id'=>$model->id),
	'Editar',
);

$this->menu=array(
	//array('label'=>'List Reuniao', 'url'=>array('index')),
	array('label'=>'Nova Reunião', 'url'=>array('create','id_evento'=>$model->id_evento)),
	array('label'=>'Detalhes', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Lista', 'url'=>array('admin','id_evento'=>$model->id_evento)),
);
?>

<h1>Reunião: <?php echo $model->data; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>