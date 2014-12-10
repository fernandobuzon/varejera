<?php
/* @var $this BandaController */
/* @var $model Banda */

$this->breadcrumbs=array(
	'Bandas'=>array('admin'),
	$model->nome,
);

$this->menu=array(
	//array('label'=>'List Banda', 'url'=>array('index')),
	array('label'=>'Nova Banda', 'url'=>array('create')),
	array('label'=>'Editar', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Apagar', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Lista', 'url'=>array('admin')),
);
?>

<h1>Banda: <?php echo $model->nome; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		//'id',
		array(
			'label' => 'Gênero',
			'type' => 'raw',
			'value' => $model->idGenero->nome
		),
		'nome',
		'contato',
		'link',
		//'apagado',
	),
)); ?>
