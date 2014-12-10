<?php
/* @var $this VendaController */
/* @var $model Saida */

$this->breadcrumbs=array(
	'Vendas'=>array('admin'),
	'Nova',
);

$this->menu=array(
	//array('label'=>'List Saida', 'url'=>array('index')),
	array('label'=>'Lista', 'url'=>array('admin')),
);
?>

<h1>Nova Venda</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>