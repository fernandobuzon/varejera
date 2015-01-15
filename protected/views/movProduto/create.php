<?php
/* @var $this MovProdutoController */
/* @var $model MovProduto */

$this->breadcrumbs=array(
	'Mov. entre integrantes'=>array('admin'),
	'Nova',
);

$this->menu=array(
	//array('label'=>'List MovProduto', 'url'=>array('index')),
	array('label'=>'Lista', 'url'=>array('admin')),
);
?>

<h1>Nova movimentação</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>