<?php
/* @var $this CompraController */
/* @var $model Entrada */

$this->breadcrumbs=array(
	'Compras'=>array('admin'),
	'Nova',
);

$this->menu=array(
	//array('label'=>'List Entrada', 'url'=>array('index')),
	array('label'=>'Lista', 'url'=>array('admin')),
);
?>

<h1>Nova Compra</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>