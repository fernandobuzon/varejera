<?php
/* @var $this ConsigController */
/* @var $model Consig */

$this->breadcrumbs=array(
	'Consignações'=>array('admin'),
	'Nova',
);

$this->menu=array(
	//array('label'=>'List Consig', 'url'=>array('index')),
	array('label'=>'Lista', 'url'=>array('admin')),
);
?>

<h1>Nova Consignação</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>