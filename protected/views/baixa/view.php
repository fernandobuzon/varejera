<?php
/* @var $this BaixaController */
/* @var $model Baixa */

$this->breadcrumbs=array(
	'Baixas'=>array('admin'),
	$model->idIntegrante->nome,
);

$this->menu=array(
	//array('label'=>'List Baixa', 'url'=>array('index')),
	array('label'=>'Nova Baixa', 'url'=>array('create')),
	array('label'=>'Editar', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Apagar', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Lista', 'url'=>array('admin')),
);
?>

<h1>Baixa: <?php echo $model->idIntegrante->nome; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		//'id',
		'data',
		array(
			'label' => 'Integrante',
			'type' => 'raw',
			'value' => $model->idIntegrante->nome
		),
		'qtde',
		array(
			'label' => 'Produto',
			'type' => 'raw',
			'value' => $model->idProduto->nome
		),
		'motivo',
		//'apagado',
	),
)); ?>
