<?php
/* @var $this ReuniaoController */
/* @var $model Reuniao */

//$evento = Evento::model()->chkEvento($_GET['id_evento']);

$this->breadcrumbs=array(
	'Eventos'=>array('Evento/admin'),
	Evento::model()->chkEvento($_GET['id_evento'])=>array('Evento/view','id'=>$_GET['id_evento']),
	'Reuniões'=>array('admin','id_evento'=>$_GET['id_evento']),
	'Lista',
);

$this->menu=array(
	//array('label'=>'List Reuniao', 'url'=>array('index')),
	array('label'=>'Nova Reunião', 'url'=>array('create','id_evento'=>$_GET['id_evento'])),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#reuniao-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'reuniao-grid',
	'dataProvider'=>$dataProvider,
	'filter'=>$model,
	'columns'=>array(
		//'id',
		'data',
		array(
				'name' => 'ata',
				'header' => 'ATA',
				'value' => 'nl2br($data->ata)',
				'type'=>'raw',
				'htmlOptions'=>array('width'=>'100%'),
		),
		//'id_evento',
		//'apagado',
		array(
			'class'=>'CButtonColumn',
			'template'=>'{view}{update}{delete}',
			'buttons'=>array(
				'update' => array(
					'url'=>'Yii::app()->createUrl("reuniao/update", array("id"=>$data->id,"id_evento"=>"'. $_GET['id_evento'] . '"))',
				),
				'view' => array(
					'url'=>'Yii::app()->createUrl("reuniao/view", array("id"=>$data->id,"id_evento"=>"'. $_GET['id_evento'] . '"))',
				),
				'delete' => array(
					'url'=>'Yii::app()->createUrl("reuniao/delete", array("id"=>$data->id,"id_evento"=>"'. $_GET['id_evento'] . '"))',
				),
			),
		),
	),
)); ?>
