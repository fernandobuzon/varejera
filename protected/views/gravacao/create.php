<?php
/* @var $this GravacaoController */
/* @var $model Gravacao */

$this->breadcrumbs=array(
	'Gravacões'=>array('admin'),
	'Nova',
);

$this->menu=array(
	//array('label'=>'List Gravacao', 'url'=>array('index')),
	array('label'=>'Lista', 'url'=>array('admin')),
);
?>

<h1>Nova Gravacão</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>