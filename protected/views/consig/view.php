<?php
/* @var $this ConsigController */
/* @var $model Consig */

$this->breadcrumbs=array(
	'Consignações'=>array('admin'),
	$model->idParceiro->nome,
);

$this->menu=array(
	//array('label'=>'List Consig', 'url'=>array('index')),
	array('label'=>'Nova Consig', 'url'=>array('create')),
	array('label'=>'Editar', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Apagar', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Tem certeza que deseja apagar essa Consignação?')),
	array('label'=>'Lista', 'url'=>array('admin')),
);
?>

<h1>Consignação: <?php echo $model->idParceiro->nome; ?></h1>

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
		'obs',
		'baixado',
		//'apagado',
	),
)); ?>
