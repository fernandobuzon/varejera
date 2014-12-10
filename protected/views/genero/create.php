<?php
/* @var $this GeneroController */
/* @var $model Genero */

$this->breadcrumbs=array(
	'Gêneros'=>array('admin'),
	'Novo',
);

$this->menu=array(
	//array('label'=>'List Genero', 'url'=>array('index')),
	array('label'=>'Lista', 'url'=>array('admin')),
);
?>

<h1>Novo Gênero</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>