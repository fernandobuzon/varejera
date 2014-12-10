<?php
/* @var $this VendaController */
/* @var $model Saida */

$this->breadcrumbs=array(
	'Vendas'=>array('admin'),
	$model->idProduto->nome=>array('view','id'=>$model->id),
	'Editar',
);

$this->menu=array(
	//array('label'=>'List Saida', 'url'=>array('index')),
	array('label'=>'Nova Venda', 'url'=>array('create')),
	array('label'=>'Detalhes', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Lista', 'url'=>array('admin')),
);
?>

<h1>Venda: <?php echo $model->idProduto->nome; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>