<?php
/* @var $this GeneroController */
/* @var $model Genero */

$this->breadcrumbs=array(
	'Gêneros'=>array('admin'),
	$model->nome=>array('view','id'=>$model->id),
	'Editar',
);

$this->menu=array(
	//array('label'=>'List Genero', 'url'=>array('index')),
	array('label'=>'Novo Gênero', 'url'=>array('create')),
	array('label'=>'Detalhes', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Lista', 'url'=>array('admin')),
);
?>

<h1>Gênero: <?php echo $model->nome; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>