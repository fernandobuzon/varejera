<?php
/* @var $this TipoController */
/* @var $model Tipo */

$this->breadcrumbs=array(
	'Tipos'=>array('admin'),
	'Novo',
);

$this->menu=array(
	//array('label'=>'List Tipo', 'url'=>array('index')),
	array('label'=>'Manage Tipo', 'url'=>array('admin')),
);
?>

<h1>Novo Tipo de produtos</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
