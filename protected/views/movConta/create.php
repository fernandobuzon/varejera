<?php
/* @var $this MovContaController */
/* @var $model MovConta */

$this->breadcrumbs=array(
	'Mov. Contas'=>array('admin'),
	'Nova',
);

$this->menu=array(
	//array('label'=>'List MovConta', 'url'=>array('index')),
	array('label'=>'Lista', 'url'=>array('admin')),
);
?>

<h1>Nova Movimentação</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>