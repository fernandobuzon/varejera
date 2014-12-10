<?php
/* @var $this ParceiroController */
/* @var $model Parceiro */

$this->breadcrumbs=array(
	'Parceiros'=>array('admin'),
	$model->nome=>array('view','id'=>$model->id),
	'Editar',
);

$this->menu=array(
	//array('label'=>'List Parceiro', 'url'=>array('index')),
	array('label'=>'Novo Parceiro', 'url'=>array('create')),
	array('label'=>'Detalhes', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Lista', 'url'=>array('admin')),
);
?>

<h1>Parceiro: <?php echo $model->nome; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
