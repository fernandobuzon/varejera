<?php
/* @var $this ParceiroController */
/* @var $model Parceiro */

$this->breadcrumbs=array(
	'Parceiros'=>array('admin'),
	'Novo',
);

$this->menu=array(
	//array('label'=>'List Parceiro', 'url'=>array('index')),
	array('label'=>'Lista', 'url'=>array('admin')),
);
?>

<h1>Novo Parceiro</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
