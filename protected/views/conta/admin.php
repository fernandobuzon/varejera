<?php
/* @var $this ContaController */
/* @var $model Conta */

$this->breadcrumbs=array(
	'Contas'=>array('admin'),
	'Lista',
);

$this->menu=array(
	//array('label'=>'List Conta', 'url'=>array('index')),
	array('label'=>'Nova Conta', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#conta-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'conta-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		//'id',
		'nome',
		'detalhes',
		//'apagado',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>

<?php 
//$listaIds = CHtml::listData(Integrante::model()->findAll(), 'nome', 'id_conta');
//foreach ($listaIds as $idconta)
//	$idsContas[] = $idconta;

//echo $idconta[0];

//if (in_array("$this->id", $idsContas))
//	$criteria->addCondition('apagado = 9');
?>
