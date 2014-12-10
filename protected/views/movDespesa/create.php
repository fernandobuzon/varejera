<?php
/* @var $this MovDespesaController */
/* @var $model MovDespesa */

$this->breadcrumbs=array(
	'Mov. Despesas'=>array('admin'),
	'Novo',
);

$this->menu=array(
	//array('label'=>'List MovDespesa', 'url'=>array('index')),
	array('label'=>'Lista', 'url'=>array('admin')),
);
?>

<h1>Novo Pagamento</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>