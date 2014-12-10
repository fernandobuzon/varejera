<?php
/* @var $this RetiradaController */
/* @var $model Retirada */

$this->breadcrumbs=array(
	'Retiradas'=>array('admin'),
	$model->idIntegrante->nome,
);

$this->menu=array(
	//array('label'=>'List Retirada', 'url'=>array('index')),
	array('label'=>'Nova Retirada', 'url'=>array('create')),
	array('label'=>'Editar', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Apagar', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Lista', 'url'=>array('admin')),
);
?>

<h1>Retirada: <?php echo $model->idIntegrante->nome; ?></h1>

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
		array(
			'label' => 'Produto',
			'type' => 'raw',
			'value' => $model->idProduto->nome
		),
		'qtde',
		//'apagado',
	),
)); ?>
