<?php
/* @var $this MovProdutoController */
/* @var $model MovProduto */

$this->breadcrumbs=array(
	'Mov. entre integrantes'=>array('admin'),
	$model->idIntegrante->nome=>array('view','id'=>$model->id),
	'Editar',
);

$this->menu=array(
	//array('label'=>'List MovProduto', 'url'=>array('index')),
	array('label'=>'Nova movimentação', 'url'=>array('create')),
	array('label'=>'Detalhes', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Lista', 'url'=>array('admin')),
);
?>

<h1>Movimentação: <?php echo $model->idIntegrante->nome; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>