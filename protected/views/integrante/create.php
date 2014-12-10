<?php
/* @var $this IntegranteController */
/* @var $model Integrante */

$this->breadcrumbs=array(
	'Integrantes'=>array('admin'),
	'Novo',
);

$this->menu=array(
	//array('label'=>'List Integrante', 'url'=>array('index')),
	array('label'=>'Lista', 'url'=>array('admin')),
);
?>

<h1>Novo Integrante</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
