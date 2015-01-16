<?php
/* @var $this DespesaController */
/* @var $model Despesa */

$this->breadcrumbs=array(
	'Despesas'=>array('admin'),
	'Lista',
);

$this->menu=array(
	//array('label'=>'List Despesa', 'url'=>array('index')),
	array('label'=>'Nova Despesa', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#despesa-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'despesa-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		//'id',
		'nome',
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
