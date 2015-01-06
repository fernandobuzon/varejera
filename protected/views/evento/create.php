<?php
/* @var $this EventoController */
/* @var $model Evento */

$this->breadcrumbs=array(
	'Eventos'=>array('admin'),
	'Novo',
);

$this->menu=array(
	//array('label'=>'List Evento', 'url'=>array('index')),
	array('label'=>'Lista', 'url'=>array('admin')),
);
?>

<h1>Novo Evento</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>