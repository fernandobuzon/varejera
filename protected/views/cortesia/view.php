<?php
/* @var $this CortesiaController */
/* @var $model Saida */

$this->breadcrumbs=array(
	'Cortesias'=>array('admin'),
	$model->idParceiro->nome,
);

if ($model->id_integrante == Integrante::model()->chkId())
{
	$this->menu=array(
		array('label'=>'Nova Cortesia', 'url'=>array('create')),
		array('label'=>'Editar', 'url'=>array('update', 'id'=>$model->id)),
		array('label'=>'Apagar', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Tem certeza que deseja apagar essa cortesia?')),
		array('label'=>'Lista', 'url'=>array('admin')),
	);
}
else
{
	$this->menu=array(
			array('label'=>'Nova Cortesia', 'url'=>array('create')),
			array('label'=>'Lista', 'url'=>array('admin')),
	);
}
?>

<h1>Cortesia: <?php echo $model->idParceiro->nome; ?></h1>

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
