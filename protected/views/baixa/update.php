<?php
/* @var $this BaixaController */
/* @var $model Baixa */

$this->breadcrumbs=array(
	'Baixas'=>array('admin'),
	$model->idIntegrante->nome=>array('view','id'=>$model->id),
	'Editar',
);

$this->menu=array(
	//array('label'=>'List Baixa', 'url'=>array('index')),
	array('label'=>'Nova Baixa', 'url'=>array('create')),
	array('label'=>'Detalhes', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Lista', 'url'=>array('admin')),
);
?>

<h1>Baixa: <?php echo $model->idIntegrante->nome; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>