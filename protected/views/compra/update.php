<?php
/* @var $this CompraController */
/* @var $model Entrada */

$this->breadcrumbs=array(
	'Compras'=>array('admin'),
	$model->id=>array('view','id'=>$model->id),
	'Editar',
);

$this->menu=array(
	//array('label'=>'List Entrada', 'url'=>array('index')),
	array('label'=>'Nova compra', 'url'=>array('create')),
	array('label'=>'Detalhes', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Lista', 'url'=>array('admin')),
);
?>

<h1>Compra: <?php echo $model->idProduto->nome; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>