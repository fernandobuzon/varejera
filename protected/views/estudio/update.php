<?php
/* @var $this EstudioController */
/* @var $model Estudio */

$this->breadcrumbs=array(
	'Estudios'=>array('admin'),
	$model->nome=>array('view','id'=>$model->id),
	'Editar',
);

$this->menu=array(
	//array('label'=>'List Estudio', 'url'=>array('index')),
	array('label'=>'Novo Estúdio', 'url'=>array('create')),
	array('label'=>'Detalhes', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Lista', 'url'=>array('admin')),
);
?>

<h1>Estúdio: <?php echo $model->nome; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>