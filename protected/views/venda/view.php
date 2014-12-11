<?php
/* @var $this VendaController */
/* @var $model Saida */

$this->breadcrumbs=array(
	'Vendas'=>array('admin'),
	$model->idProduto->nome,
);

$this->menu=array(
	//array('label'=>'List Saida', 'url'=>array('index')),
	array('label'=>'Nova Venda', 'url'=>array('create')),
	array('label'=>'Editar', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Apagar', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Lista', 'url'=>array('admin')),
);
?>

<h1>Venda: <?php echo $model->idProduto->nome; ?></h1>

<?php if ($model->fiado == 1) $fiado = 'Sim'; else $fiado = 'Não'; ?>
<?php if ($model->quitado == 1) $quitado = 'Sim'; else $quitado = 'Não'; ?>

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
		'ocasiao',
		array(
			'label' => 'Parceiro',
			'type' => 'raw',
			'value' => $model->idParceiro->nome
		),
		'valor',
		array(
			'label' => 'Fiado?',
			'type' => 'raw',
			'value' => "$fiado"
		),
		'quitado',
		'obs',
		//'id_troca',
		//'id_consig',
		//'apagado',
	),
)); ?>
