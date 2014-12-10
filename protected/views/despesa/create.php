<?php
/* @var $this DespesaController */
/* @var $model Despesa */

$this->breadcrumbs=array(
	'Despesas'=>array('admin'),
	'Nova',
);

$this->menu=array(
	//array('label'=>'List Despesa', 'url'=>array('index')),
	array('label'=>'Lista', 'url'=>array('admin')),
);
?>

<h1>Nova Despesa</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
