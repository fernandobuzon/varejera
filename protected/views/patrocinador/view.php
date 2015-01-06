<?php
/* @var $this PatrocinadorController */
/* @var $model Patrocinador */

$this->breadcrumbs=array(
	'Patrocinadors'=>array('admin'),
	$model->nome,
);

$this->menu=array(
	//array('label'=>'List Patrocinador', 'url'=>array('index')),
	array('label'=>'Novo Ptrocinador', 'url'=>array('create')),
	array('label'=>'Editar', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Apagar', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Lista', 'url'=>array('admin')),
);
?>

<h1>Patrocinador: <?php echo $model->nome; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		//'id',
		'nome',
		'contato',
		'link',
		'endereco',
		'cidade',
		'cep',
		//'apagado',
	),
)); ?>
