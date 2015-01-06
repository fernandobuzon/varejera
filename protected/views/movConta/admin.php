<?php
/* @var $this MovContaController */
/* @var $model MovConta */

$this->breadcrumbs=array(
	'Mov. Contas'=>array('admin'),
	'Lista',
);

$this->menu=array(
	//array('label'=>'List MovConta', 'url'=>array('index')),
	array('label'=>'Nova Movimentação', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#mov-conta-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");

echo "conta:" . Conta::model()->chkConta();

?>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'mov-conta-grid',
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
			'filter'=>CHtml::listData(Integrante::model()->findAll(array('order'=>'nome')),'id','nome'),
			'value' => '$data->idIntegrante->nome'
		),
		array(
			'name' => 'id_conta_orig',
			'header' => 'Origem',
			'filter'=>CHtml::listData(Conta::model()->findAll(array('order'=>'nome')),'id','nome'),
			'value' => '$data->idContaOrig->nome'
		),
		array(
			'name' => 'id_conta_dest',
			'header' => 'Destino',
			'filter'=>CHtml::listData(Conta::model()->findAll(array('order'=>'nome')),'id','nome'),
			'value' => '$data->idContaDest->nome'
		),
		'valor',
		/*
		'apagado',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
