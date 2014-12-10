<?php
/* @var $this TipoController */
/* @var $model Tipo */

$this->breadcrumbs=array(
	'Tipos'=>array('admin'),
	$model->nome,
);

$this->menu=array(
	//array('label'=>'List Tipo', 'url'=>array('index')),
	array('label'=>'Novo Tipo', 'url'=>array('create')),
	array('label'=>'Editar', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Apagar', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Tem certeza que deseja apagar esse tipo?')),
	array('label'=>'Lista', 'url'=>array('admin')),
);
?>

<h1>Tipo de produto: <?php echo $model->nome; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		//'id',
		'nome',
		//'apagado',
	),
)); ?>
