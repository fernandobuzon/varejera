<?php
/* @var $this BaixaController */
/* @var $model Baixa */

$this->breadcrumbs=array(
	'Baixas'=>array('admin'),
	'Nova',
);

$this->menu=array(
	//array('label'=>'List Baixa', 'url'=>array('index')),
	array('label'=>'Lista', 'url'=>array('admin')),
);
?>

<h1>Nova Baixa</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>