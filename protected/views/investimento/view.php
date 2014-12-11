<?php
/* @var $this InvestimentoController */
/* @var $model Investimento */

$this->breadcrumbs=array(
	'Investimentos'=>array('admin'),
	$model->idIntegrante->nome,
);

$this->menu=array(
	//array('label'=>'List Investimento', 'url'=>array('index')),
	array('label'=>'Novo Investimento', 'url'=>array('create')),
	array('label'=>'Editar', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Apagar', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Lista', 'url'=>array('admin')),
);
?>

<h1>Investimento: <?php echo $model->idIntegrante->nome; ?></h1>

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
		'valor',
		'obs',
		//'apagado',
	),
)); ?>
