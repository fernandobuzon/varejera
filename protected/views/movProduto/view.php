<?php
/* @var $this MovProdutoController */
/* @var $model MovProduto */

$this->breadcrumbs=array(
	'Mov. entre integrantes'=>array('admin'),
	$model->idIntegrante->nome,
);

if ($model->id_integrante == Integrante::model()->chkId())
{
	$this->menu=array(
		array('label'=>'Nova movimentação', 'url'=>array('create')),
		array('label'=>'Editar', 'url'=>array('update', 'id'=>$model->id)),
		array('label'=>'Apagar', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
		array('label'=>'Lista', 'url'=>array('admin')),
	);
}
else
{
	$this->menu=array(
			array('label'=>'Nova movimentação', 'url'=>array('create')),
			array('label'=>'Lista', 'url'=>array('admin')),
	);
}
?>

<h1>Movimentação: <?php echo $model->idIntegrante->nome; ?></h1>

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
			'label' => 'Receptor',
			'type' => 'raw',
			'value' => $model->idIntegranteDest->nome
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
