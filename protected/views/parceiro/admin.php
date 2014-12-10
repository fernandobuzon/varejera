<?php
/* @var $this ParceiroController */
/* @var $model Parceiro */

$this->breadcrumbs=array(
	'Parceiros'=>array('admin'),
	'Lista',
);

$this->menu=array(
	//array('label'=>'List Parceiro', 'url'=>array('index')),
	array('label'=>'Novo Parceiro', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#parceiro-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'parceiro-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		//'id',
		'nome',
		'contato',
		'endereco',
		'cidade',
		'cep',
		array(
			'name' => 'distro',
			'header' => 'Distro?',
			'filter'=>array(0=>"Não",1=>"Sim"),
			'value' => 'Parceiro::model()->chkDistro($data->id)'
		),
		//'apagado',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
