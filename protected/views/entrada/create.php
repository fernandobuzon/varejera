<?php
/* @var $this EntradaController */
/* @var $model Entrada */

$this->breadcrumbs=array(
	'Entradas'=>array('admin'),
	'Nova',
);

$this->menu=array(
	//array('label'=>'List Entrada', 'url'=>array('index')),
	array('label'=>'Lista', 'url'=>array('admin')),
);
?>

<h1>Nova Entrada</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>