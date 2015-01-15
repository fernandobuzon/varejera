<?php
/* @var $this PagamentoController */
/* @var $model Pagamento */

$this->breadcrumbs=array(
	'Pagamentos'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Pagamento', 'url'=>array('index')),
	array('label'=>'Create Pagamento', 'url'=>array('create')),
	array('label'=>'Update Pagamento', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Pagamento', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Pagamento', 'url'=>array('admin')),
);
?>

<h1>View Pagamento #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'id_gravacao',
		'id_integrante',
		'data',
		'valor',
		'apagado',
	),
)); ?>
