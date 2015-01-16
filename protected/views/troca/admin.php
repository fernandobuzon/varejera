<?php
/* @var $this TrocaController */
/* @var $model Troca */

$this->breadcrumbs=array(
	'Trocas'=>array('admin'),
	'Lista',
);

$this->menu=array(
	//array('label'=>'List Troca', 'url'=>array('index')),
	array('label'=>'Nova Troca', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#troca-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'troca-grid',
	'dataProvider'=>$model->search(),
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
		array(
			'name' => 'id_parceiro',
			'header' => 'Parceiro',
			'filter'=>CHtml::listData(Parceiro::model()->findAll(array('order'=>'nome')),'id','nome'),
			'value' => '$data->idParceiro->nome'
		),
		'pago',
		'recebido',
		/*
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
