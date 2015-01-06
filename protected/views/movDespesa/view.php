<?php
/* @var $this MovDespesaController */
/* @var $model MovDespesa */

$this->breadcrumbs=array(
	'Mov. Despesas'=>array('admin'),
	$model->idDespesa->nome,
);

$this->menu=array(
	//array('label'=>'List MovDespesa', 'url'=>array('index')),
	array('label'=>'Novo Pagamento', 'url'=>array('create')),
	array('label'=>'Editar', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Apagar', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Tem certeza que deseja apagar esse pagamento?')),
	array('label'=>'Lista', 'url'=>array('admin')),
);
?>

<h1>Pagamento: <?php echo $model->idDespesa->nome; ?></h1>

<?php if ($model->pg == 1) $pg = 'Sim'; else $pg = 'Não'; ?>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		//'id',
		'data',
		array(
			'label' => 'Despesa',
			'type' => 'raw',
			'value' => $model->idDespesa->nome
		),
		array(
			'label' => 'Integrante',
			'type' => 'raw',
			'value' => $model->idIntegrante->nome
		),
		'valor',
		array(
			'label' => 'Pago?',
			'type' => 'raw',
			'value' => "$pg"
		),
		//'id_saida',
		'obs',
		//'apagado',
	),
)); ?>
