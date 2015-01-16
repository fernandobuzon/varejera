<?php
/* @var $this ConsigController */
/* @var $model Consig */

$this->breadcrumbs=array(
	'Consignações'=>array('admin'),
	'Lista',
);

$this->menu=array(
	//array('label'=>'List Consig', 'url'=>array('index')),
	array('label'=>'Nova Consignação', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#consig-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'consig-grid',
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
		'qtde',
		array(
			'name' => 'id_produto',
			'header' => 'Produto',
			'filter'=>CHtml::listData(Produto::model()->findAll(array('order'=>'nome')),'id','nome'),
			'value' => '$data->idProduto->nome'
		),
		array(
			'name' => 'id_parceiro',
			'header' => 'Parceiro',
			'filter'=>CHtml::listData(Parceiro::model()->findAll(array('order'=>'nome')),'id','nome'),
			'value' => '$data->idParceiro->nome'
		),
		'obs',
		array(
			'name' => 'baixado',
			'header' => 'Baixado?',
			'filter'=>array(0=>"Não",1=>"Sim"),
			'value' => 'Consig::model()->chkBaixado($data->id)'
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
