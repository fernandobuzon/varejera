<?php
/* @var $this EstudioController */
/* @var $model Estudio */

$this->breadcrumbs=array(
	'Estudios'=>array('admin'),
	$model->nome,
);

$this->menu=array(
	//array('label'=>'List Estudio', 'url'=>array('index')),
	array('label'=>'Novo Estúdio', 'url'=>array('create')),
	array('label'=>'Editar', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Apagar', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Lista', 'url'=>array('admin')),
);
?>

<h1>Estúdio: <?php echo $model->nome; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		//'id',
		'nome',
		'contato',
		//'apagado',
	),
)); ?>
