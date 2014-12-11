<?php
/* @var $this CortesiaController */
/* @var $model Saida */

$this->breadcrumbs=array(
	'Cortesias'=>array('admin'),
	$model->idParceiro->nome=>array('view','id'=>$model->id),
	'Editar',
);

$this->menu=array(
	//array('label'=>'List Saida', 'url'=>array('index')),
	array('label'=>'Nova Cortesia', 'url'=>array('create')),
	array('label'=>'Detalhes', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Lista', 'url'=>array('admin')),
);
?>

<h1>Cortesia: <?php echo $model->idParceiro->nome; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>