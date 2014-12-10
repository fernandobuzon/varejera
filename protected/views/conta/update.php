<?php
/* @var $this ContaController */
/* @var $model Conta */

$this->breadcrumbs=array(
	'Contas'=>array('admin'),
	$model->nome=>array('view','id'=>$model->id),
	'Editar',
);

$this->menu=array(
	//array('label'=>'List Conta', 'url'=>array('index')),
	array('label'=>'Nova Conta', 'url'=>array('create')),
	array('label'=>'Detalhes', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Lista', 'url'=>array('admin')),
);
?>

<h1>Conta: <?php echo $model->nome; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
