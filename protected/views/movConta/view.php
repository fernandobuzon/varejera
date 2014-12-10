<?php
/* @var $this MovContaController */
/* @var $model MovConta */

$this->breadcrumbs=array(
	'Mov. Contas'=>array('admin'),
	$model->idIntegrante->nome,
);

$this->menu=array(
	//array('label'=>'List MovConta', 'url'=>array('index')),
	array('label'=>'Nova movimentação', 'url'=>array('create')),
	array('label'=>'Editar', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Apagar', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Tem certeza que deseja apagar essa movimentação?')),
	array('label'=>'Lista', 'url'=>array('admin')),
);
?>

<h1>Movimentação: <?php echo $model->idContaOrig->nome . " -> " . $model->idContaDest->nome ?></h1>

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
			'label' => 'Conta origem',
			'type' => 'raw',
			'value' => $model->idContaOrig->nome
		),
		array(
			'label' => 'Conta destino',
			'type' => 'raw',
			'value' => $model->idContaDest->nome
		),
		'valor',
		//'apagado',
	),
)); ?>
