<?php
/* @var $this ReuniaoController */
/* @var $model Reuniao */

$this->breadcrumbs=array(
	'Eventos'=>array('Evento/admin'),
	Evento::model()->chkEvento($_GET['id_evento'])=>array('Evento/view','id'=>$_GET['id_evento']),
	'Reuniões'=>array('admin','id_evento'=>$_GET['id_evento']),
	'Nova',
);

$this->menu=array(
	//array('label'=>'List Reuniao', 'url'=>array('index')),
	array('label'=>'Lista', 'url'=>array('admin','id_evento'=>$_GET['id_evento'])),
);
?>

<h1>Nova Reunião <?php echo Evento::model()->chkEvento($_GET['id_evento']) ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>