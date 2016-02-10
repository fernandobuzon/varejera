<?php
/* @var $this GravacaoController */
/* @var $model Gravacao */

$this->breadcrumbs=array(
	'Gravacões'=>array('admin'),
	$model->nome=>array('view','id'=>$model->id),
	'Editar',
);

$this->menu=array(
	//array('label'=>'List Gravacao', 'url'=>array('index')),
	array('label'=>'Nova Gravacão', 'url'=>array('create')),
	array('label'=>'Detalhes', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Lista', 'url'=>array('admin')),
);
?>

<h1>Gravacao: <?php echo $model->nome; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>