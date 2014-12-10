<?php
/* @var $this RetiradaController */
/* @var $model Retirada */

$this->breadcrumbs=array(
	'Retiradas'=>array('index'),
	$model->idIntegrante->nome=>array('view','id'=>$model->id),
	'Editar',
);

$this->menu=array(
	//array('label'=>'List Retirada', 'url'=>array('index')),
	array('label'=>'Nova Retirada', 'url'=>array('create')),
	array('label'=>'Detalhes', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Lista', 'url'=>array('admin')),
);
?>

<h1>Retirada: <?php echo $model->idIntegrante->nome; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>