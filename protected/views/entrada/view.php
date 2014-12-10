<?php
/* @var $this EntradaController */
/* @var $model Entrada */

$this->breadcrumbs=array(
	'Entradas'=>array('admin'),
	$model->idParceiro->nome,
);

$this->menu=array(
	//array('label'=>'List Entrada', 'url'=>array('index')),
	array('label'=>'Nova Entrada', 'url'=>array('create')),
	array('label'=>'Editar', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Apagar', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Tem certeza que deseja apagar essa aquisição?')),
	array('label'=>'Lista', 'url'=>array('admin')),
);
?>

<h1>Entrada: <?php echo $model->idParceiro->nome; ?></h1>

<?php if ($model->pg == 1) $pg = 'Sim'; else $pg = 'Não'; ?>
<?php if ($model->recebido == 1) $recebido = 'Sim'; else $recebido = 'Não'; ?>

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
		array(
			'label' => 'Pago?',
			'type' => 'raw',
			'value' => ($model->pg == 1 ? 'Sim' : 'Não')
		),
		array(
			'label' => 'Recebido?',
			'type' => 'raw',
			'value' => "$recebido"
		),
		//'id_troca',
		//'apagado',
	),
)); ?>
