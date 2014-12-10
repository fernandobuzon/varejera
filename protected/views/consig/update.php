<?php
/* @var $this ConsigController */
/* @var $model Consig */

$this->breadcrumbs=array(
	'Consignações'=>array('admin'),
	$model->idParceiro->nome=>array('view','id'=>$model->id),
	'Editar',
);

$this->menu=array(
	//array('label'=>'List Consig', 'url'=>array('index')),
	array('label'=>'Nova Consignação', 'url'=>array('create')),
	array('label'=>'Detalhes', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Lista', 'url'=>array('admin')),
);
?>

<h1>Consignação: <?php echo $model->idParceiro->nome; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>