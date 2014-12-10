<?php
/* @var $this ProdutoController */
/* @var $model Produto */

$this->breadcrumbs=array(
	'Produtos'=>array('admin'),
	$model->nome,
);

$this->menu=array(
	//array('label'=>'List Produto', 'url'=>array('index')),
	array('label'=>'Novo Produto', 'url'=>array('create')),
	array('label'=>'Editar', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Apagar', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Tem certeza que deseja apagar esse produto?')),
	array('label'=>'Lista', 'url'=>array('admin')),
);
?>

<h1>Produto: <?php echo $model->nome; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		//'id',
		array(
			'label' => 'Tipo',
			'type' => 'raw',
			'value' => $model->idTipo->nome
		),
		array(
			'label' => 'Banda',
			'type' => 'raw',
			'value' => $model->idBanda->nome
		),
		'nome',
		'obs',
		//'apagado',
	),
)); ?>
