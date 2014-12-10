<?php
/* @var $this ContaController */
/* @var $model Conta */

$this->breadcrumbs=array(
	'Contas'=>array('admin'),
	'Nova',
);

$this->menu=array(
	//array('label'=>'List Conta', 'url'=>array('index')),
	array('label'=>'Lista', 'url'=>array('admin')),
);
?>

<h1>Nova Conta</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
