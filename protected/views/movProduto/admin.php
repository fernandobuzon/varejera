<?php
/* @var $this MovProdutoController */
/* @var $model MovProduto */

$this->breadcrumbs=array(
	'Mov. entre integrantes'=>array('admin'),
	'Lista',
);

$this->menu=array(
	//array('label'=>'List MovProduto', 'url'=>array('index')),
	array('label'=>'Nova movimentação', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#mov-produto-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'mov-produto-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		//'id',
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
			'filter'=>CHtml::listData(Integrante::model()->findAll(array('condition'=>'apagado != 1','order'=>'nome')),'id','nome'),
			'value' => '$data->idIntegrante->nome'
		),
		array(
			'name' => 'id_integrante_dest',
			'header' => 'Receptor',
			'filter'=>CHtml::listData(Integrante::model()->findAll(array('condition'=>'apagado != 1','order'=>'nome')),'id','nome'),
			'value' => '$data->idIntegranteDest->nome'
		),
		'qtde',
		array(
			'name' => 'id_produto',
			'header' => 'Produto',
			'filter'=>CHtml::listData(Produto::model()->findAll(array('condition'=>'apagado != 1','order'=>'nome')),'id','nome'),
			'value' => '$data->idProduto->nome'
		),
		//'apagado',
		array(
			'class'=>'CButtonColumn',
			'template'=>'{view}{update}{delete}',
			'buttons'=>array(
				'update' => array(
					'visible'=>'$data->id_integrante=="' . Integrante::model()->chkId() . '"'
				),
				'delete' => array(
					'visible'=>'$data->id_integrante=="' . Integrante::model()->chkId() . '"'
				),
			),
		),
	),
)); ?>
