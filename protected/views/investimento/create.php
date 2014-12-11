<?php
/* @var $this InvestimentoController */
/* @var $model Investimento */

$this->breadcrumbs=array(
	'Investimentos'=>array('admin'),
	'Novo',
);

$this->menu=array(
	//array('label'=>'List Investimento', 'url'=>array('index')),
	array('label'=>'Lista', 'url'=>array('admin')),
);
?>

<h1>Novo Investimento</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>