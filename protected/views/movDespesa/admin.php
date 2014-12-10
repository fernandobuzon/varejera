<?php
/* @var $this MovDespesaController */
/* @var $model MovDespesa */

$this->breadcrumbs=array(
	'Mov. Despesas'=>array('admin'),
	'Lista',
);

$this->menu=array(
	//array('label'=>'List MovDespesa', 'url'=>array('index')),
	array('label'=>'Novo pagamento', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#mov-despesa-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'mov-despesa-grid',
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
			'name' => 'id_despesa',
			'header' => 'Despesa',
			'filter'=>CHtml::listData(Despesa::model()->findAll(array('order'=>'nome')),'id','nome'),
			'value' => '$data->idDespesa->nome'
		),
		array(
			'name' => 'id_conta',
			'header' => 'Conta',
			'filter'=>CHtml::listData(Conta::model()->findAll(array('order'=>'nome')),'id','nome'),
			'value' => '$data->idConta->nome'
		),
		'valor',
		array(
			'name' => 'pg',
			'header' => 'Pago?',
			'filter'=>array(0=>"Não",1=>"Sim"),
			'value' => 'movDespesa::model()->chkPg($data->id)'
		),
		'obs',
		/*
		'id_saida',
		'apagado',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
