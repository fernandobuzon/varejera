<?php
/* @var $this CortesiaController */
/* @var $model Saida */

$this->breadcrumbs=array(
	'Cortesias'=>array('admin'),
	'Lista',
);

$this->menu=array(
	//array('label'=>'List Saida', 'url'=>array('index')),
	array('label'=>'Nova Cortesia', 'url'=>array('create')),
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

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'saida-grid',
	'dataProvider'=>$model->searchCortesias(),
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
			'filter'=>CHtml::listData(Integrante::model()->findAll(array('condition'=>'apagado != 1','order'=>'nome')),'id','nome'),
			'value' => '$data->idIntegrante->nome'
		),
		'qtde',
		array(
			'name' => 'id_produto',
			'header' => 'Produto',
			'filter'=>CHtml::listData(Produto::model()->findAll(array('condition'=>'apagado != 1','order'=>'nome')),'id','nome'),
			'value' => '$data->idProduto->nome'
		),
		'ocasiao',
		'obs',
		/*
		'id_troca',
		'id_consig',
		'apagado',
		*/
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
