<?php
/* @var $this CortesiaController */
/* @var $model Saida */

$this->breadcrumbs=array(
	'Cortesias'=>array('admin'),
	'Nova',
);

$this->menu=array(
	//array('label'=>'List Saida', 'url'=>array('index')),
	array('label'=>'Lista', 'url'=>array('admin')),
);
?>

<h1>Nova Cortesia</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>