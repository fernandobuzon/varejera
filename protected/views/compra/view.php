<?php
/* @var $this CompraController */
/* @var $model Entrada */

$this->breadcrumbs=array(
	'Compras'=>array('admin'),
	$model->idProduto->nome,
);

$this->menu=array(
	//array('label'=>'List Entrada', 'url'=>array('index')),
	array('label'=>'Nova compra', 'url'=>array('create')),
	array('label'=>'Editar', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Apagar', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Lista', 'url'=>array('admin')),
);
?>

<h1>Compra: <?php echo $model->idProduto->nome; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		//'id',
		'data',
		'qtde',
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
		array(
			'label' => 'Parceiro',
			'type' => 'raw',
			'value' => $model->idParceiro->nome
		),
		'valor',
		'ocasiao',
		'valor',
		array(
			'label' => 'Fiado?',
			'type' => 'raw',
			'value' => ($model->fiado == 1 ? 'Sim' : 'Não')
		),
		'quitado',
		'obs',
		array(
			'label' => 'Recebido?',
			'type' => 'raw',
			'value' => ($model->recebido == 1 ? 'Sim' : 'Não')
		),
		//'id_troca',
		//'apagado',
	),
)); ?>
