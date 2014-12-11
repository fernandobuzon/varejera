<?php
/* @var $this VendaController */
/* @var $model Saida */

$this->breadcrumbs=array(
	'Vendas'=>array('admin'),
	'Lista',
);

$this->menu=array(
	//array('label'=>'List Saida', 'url'=>array('index')),
	array('label'=>'Nova Venda', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#saida-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<a href="<?php echo Yii::app()->createUrl('venda/admin/');?>">Todas as vendas</a><br>
<a href="<?php echo Yii::app()->createUrl('venda/admin/');?>&fiado=1">Somente fiados em aberto</a>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'saida-grid',
	'dataProvider'=>$dataProvider,
	'filter'=>$model,
	'columns'=>array(
		array(
			'name' => 'data',
			'header' => 'Data',
			'filter'=>$this->widget('zii.widgets.jui.CJuiDatePicker', array(
        		'model'=>$model,
        		'attribute'=>'data',
				'language' => 'pt-BR',
				'options'=>array(
					'dateFormat'=>'dd/mm/yy'
				)	
    		), true)
		),
		array(
			'name' => 'id_integrante',
			'header' => 'Integrante',
			'filter'=>CHtml::listData(Integrante::model()->findAll(array('order'=>'nome')),'id','nome'),
			'value' => '$data->idIntegrante->nome'
		),
		'qtde',
		array(
			'name' => 'id_produto',
			'header' => 'Produto',
			'filter'=>CHtml::listData(Produto::model()->findAll(array('order'=>'nome')),'id','nome'),
			'value' => '$data->idProduto->nome'
		),
		'ocasiao',
		'valor',
		/*
		array(
			'name' => 'fiado',
			'header' => 'Fiado?',
			'value' => 'Saida::model()->chkFiado($data->id)'
		),
		'quitado',
		*/
		'obs',
		/*
		'id_troca',
		'id_consig',
		'apagado',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
