<?php
/* @var $this TrocaController */
/* @var $model Troca */

$this->breadcrumbs=array(
	'Trocas'=>array('admin'),
	$model->idParceiro->nome,
);

$this->menu=array(
	//array('label'=>'List Troca', 'url'=>array('index')),
	array('label'=>'Nova Troca', 'url'=>array('create')),
	array('label'=>'Editar', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Apagar', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Lista', 'url'=>array('admin')),
);
?>

<div class="row">

<h1>Troca: <?php echo $model->idParceiro->nome; ?></h1>

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
			'label' => 'Parceiro',
			'type' => 'raw',
			'value' => $model->idParceiro->nome
		),
		'pago',
		'recebido'
		//'apagado',
	),
)); ?>
</div>

<div class="row">
<?php $this->widget('zii.widgets.grid.CGridView', array(
        'id'=>'saida-grid',
        'dataProvider'=>Saida::model()->searchByTroca($model->id),
        'columns'=>array(
                'qtde',
                array(
                        'name' => 'id_produto',
                        'header' => 'Produtos ENVIADOS',
                        'value' => '$data->idProduto->nome'
                ),
                'obs',
        ),
)); ?>
</div>

<div class="row">
<?php $this->widget('zii.widgets.grid.CGridView', array(
        'id'=>'entrada-grid',
        'dataProvider'=>Entrada::model()->searchByTroca($model->id),
        'columns'=>array(
                'qtde',
                array(
                        'name' => 'id_produto',
                        'header' => 'Produtos RECEBIDOS',
                        'value' => '$data->idProduto->nome'
                ),
                'obs',
        ),
)); ?>
</div>

