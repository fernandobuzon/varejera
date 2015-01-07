<?php
/* @var $this PatrocinioController */
/* @var $model Patrocinio */

$this->breadcrumbs=array(
	'Eventos'=>array('Evento/admin'),
	Evento::model()->chkEvento($_GET['id_evento'])=>array('Evento/view','id'=>$_GET['id_evento']),
	'Patrocínios'=>array('admin','id_evento'=>$_GET['id_evento']),
	'Lista',
);

$this->menu=array(
	//array('label'=>'List Patrocinio', 'url'=>array('index')),
	array('label'=>'Novo Patrocínio', 'url'=>array('create','id_evento'=>$_GET['id_evento'])),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#patrocinio-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'patrocinio-grid',
	'dataProvider'=>$dataProvider,
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
			'name' => 'id_patrocinador',
			'header' => 'Patrocinador',
			'filter'=>CHtml::listData(Patrocinador::model()->findAll(array('order'=>'nome')),'id','nome'),
			'value' => '$data->idPatrocinador->nome'
		),
		'valor',
		array(
			'name' => 'pg',
			'header' => 'Pago?',
			'filter'=>array(0=>"Não",1=>"Sim"),
			'value' => 'Patrocinio::model()->chkPg($data->id)'
		),
		'obs',
		//'id_evento',
		//'id_producao',
		//'apagado',
		array(
			'class'=>'CButtonColumn',
			'template'=>'{view}{update}{delete}',
			'buttons'=>array(
				'update' => array(
					'url'=>'Yii::app()->createUrl("patrocinio/update", array("id"=>$data->id,"id_evento"=>"'. $_GET['id_evento'] . '"))',
				),
				'view' => array(
					'url'=>'Yii::app()->createUrl("patrocinio/view", array("id"=>$data->id,"id_evento"=>"'. $_GET['id_evento'] . '"))',
				),
				'delete' => array(
					'url'=>'Yii::app()->createUrl("patrocinio/delete", array("id"=>$data->id,"id_evento"=>"'. $_GET['id_evento'] . '"))',
				),
			),
		),
	),
)); ?>
