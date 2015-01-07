<?php
/* @var $this ReuniaoController */
/* @var $model Reuniao */

$this->breadcrumbs=array(
	'Eventos'=>array('Evento/admin'),
	Evento::model()->chkEvento($_GET['id_evento'])=>array('Evento/view','id'=>$_GET['id_evento']),
	'Reuniões'=>array('admin','id_evento'=>$_GET['id_evento']),
	$model->data=>array('view','id'=>$model->id),
	'Editar',
);

$this->menu=array(
	//array('label'=>'List Reuniao', 'url'=>array('index')),
	array('label'=>'Nova Reunião', 'url'=>array('create','id_evento'=>$_GET['id_evento'])),
	array('label'=>'Detalhes', 'url'=>array('view', 'id'=>$model->id,'id_evento'=>$_GET['id_evento'])),
	array('label'=>'Lista', 'url'=>array('admin','id_evento'=>$_GET['id_evento'])),
);
?>

<h1>Reunião: <?php echo $model->data; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>