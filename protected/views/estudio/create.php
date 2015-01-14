<?php
/* @var $this EstudioController */
/* @var $model Estudio */

$this->breadcrumbs=array(
	'Estudios'=>array('admin'),
	'Novo',
);

$this->menu=array(
	//array('label'=>'List Estudio', 'url'=>array('index')),
	array('label'=>'Lista', 'url'=>array('admin')),
);
?>

<h1>Novo Estúdio</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>