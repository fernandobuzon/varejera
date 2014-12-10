<?php
/* @var $this TrocaController */
/* @var $model Troca */

$this->breadcrumbs=array(
	'Trocas'=>array('admin'),
	'Nova',
);

$this->menu=array(
	//array('label'=>'List Troca', 'url'=>array('index')),
	array('label'=>'Lista', 'url'=>array('admin')),
);
?>

<h1>Nova Troca</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
