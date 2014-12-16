<?php
/* @var $this GratisController */
/* @var $model Entrada */

$this->breadcrumbs=array(
	'Entradas'=>array('admin'),
	$model->idParceiro->nome,
);

$this->menu=array(
	//array('label'=>'List Entrada', 'url'=>array('index')),
	array('label'=>'Novo recebimento', 'url'=>array('create')),
	array('label'=>'Editar', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Apagar', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Lista', 'url'=>array('admin')),
);
?>

<h1>Recebimento: <?php echo $model->idParceiro->nome; ?></h1>

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
		'obs',
	),
)); ?>
