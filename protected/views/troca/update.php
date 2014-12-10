<?php
/* @var $this TrocaController */
/* @var $model Troca */

$this->breadcrumbs=array(
	'Trocas'=>array('admin'),
	$model->idParceiro->nome=>array('view','id'=>$model->id),
	'Editar',
);

$this->menu=array(
	//array('label'=>'List Troca', 'url'=>array('index')),
	array('label'=>'Nova Troca', 'url'=>array('create')),
	array('label'=>'Detalhes', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Lista', 'url'=>array('admin')),
);
?>

<h1>Troca: <?php echo $model->idParceiro->nome; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
