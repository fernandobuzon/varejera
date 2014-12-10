<?php
/* @var $this DespesaController */
/* @var $model Despesa */

$this->breadcrumbs=array(
	'Despesas'=>array('admin'),
	$model->nome=>array('view','id'=>$model->id),
	'Editar',
);

$this->menu=array(
	//array('label'=>'List Despesa', 'url'=>array('index')),
	array('label'=>'Nova Despesa', 'url'=>array('create')),
	array('label'=>'Detalhes', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Lista', 'url'=>array('admin')),
);
?>

<h1>Despesa: <?php echo $model->nome; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
