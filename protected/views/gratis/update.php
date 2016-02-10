<?php
/* @var $this GratisController */
/* @var $model Entrada */

$this->breadcrumbs=array(
	'Recebimentos'=>array('admin'),
	$model->idParceiro->nome=>array('view','id'=>$model->id),
	'Editar',
);

$this->menu=array(
	//array('label'=>'List Entrada', 'url'=>array('index')),
	array('label'=>'Novo recebimento', 'url'=>array('create')),
	array('label'=>'Detalhes', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Lista', 'url'=>array('admin')),
);
?>

<h1>Recebimento: <?php echo $model->idParceiro->nome; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>