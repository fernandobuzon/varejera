<?php
/* @var $this BandaController */
/* @var $model Banda */

$this->breadcrumbs=array(
	'Bandas'=>array('admin'),
	$model->nome=>array('view','id'=>$model->id),
	'Editar',
);

$this->menu=array(
	//array('label'=>'List Banda', 'url'=>array('index')),
	array('label'=>'Nova Banda', 'url'=>array('create')),
	array('label'=>'Detalhes', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Lista', 'url'=>array('admin')),
);
?>

<h1>Banda: <?php echo $model->nome; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>