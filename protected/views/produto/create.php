<?php
/* @var $this ProdutoController */
/* @var $model Produto */

$this->breadcrumbs=array(
	'Produtos'=>array('admin'),
	'Novo',
);

$this->menu=array(
	//array('label'=>'List Produto', 'url'=>array('index')),
	array('label'=>'Lista', 'url'=>array('admin')),
);
?>

<h1>Novo Produto</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
