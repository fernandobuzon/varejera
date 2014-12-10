<?php
/* @var $this RetiradaController */
/* @var $model Retirada */

$this->breadcrumbs=array(
	'Retiradas'=>array('admin'),
	'Nova',
);

$this->menu=array(
	//array('label'=>'List Retirada', 'url'=>array('index')),
	array('label'=>'Manage Retirada', 'url'=>array('admin')),
);
?>

<h1>Nova Retirada</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>