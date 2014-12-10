<?php
/* @var $this EntradaController */
/* @var $model Entrada */

$this->breadcrumbs=array(
	'Entradas'=>array('index'),
	$model->idParceiro->nome=>array('view','id'=>$model->id),
	'Editar',
);

$this->menu=array(
	//array('label'=>'List Entrada', 'url'=>array('index')),
	array('label'=>'Nova Entrada', 'url'=>array('create')),
	array('label'=>'Detalhes', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Lista', 'url'=>array('admin')),
);
?>

<h1>Entrada: <?php echo $model->idParceiro->nome; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>