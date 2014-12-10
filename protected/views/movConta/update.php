<?php
/* @var $this MovContaController */
/* @var $model MovConta */

$this->breadcrumbs=array(
	'Mov. Contas'=>array('admin'),
	$model->idIntegrante->nome=>array('view','id'=>$model->id),
	'Editar',
);

$this->menu=array(
	//array('label'=>'List MovConta', 'url'=>array('index')),
	array('label'=>'Nova Movimentação', 'url'=>array('create')),
	array('label'=>'Detalhes', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Lista', 'url'=>array('admin')),
);
?>

<h1>Movimentação: <?php echo $model->idContaOrig->nome . " -> " . $model->idContaDest->nome ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>