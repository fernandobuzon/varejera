<?php
/* @var $this TarefaController */
/* @var $model Tarefa */

$this->breadcrumbs=array(
	'Eventos'=>array('Evento/admin'),
	Evento::model()->chkEvento($_GET['id_evento'])=>array('Evento/view','id'=>$_GET['id_evento']),
	'Tarefas'=>array('admin','id_evento'=>$_GET['id_evento']),
	'Lista',
);

$this->menu=array(
	//array('label'=>'List Tarefa', 'url'=>array('index')),
	array('label'=>'Nova Tarefa', 'url'=>array('create','id_evento'=>$_GET['id_evento'])),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#tarefa-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<a href="<?php echo Yii::app()->createUrl('tarefa/admin/',array('id_evento'=>$_GET['id_evento']));?>&all=1">Todas as tarefas</a><br>
<a href="<?php echo Yii::app()->createUrl('tarefa/admin/',array('id_evento'=>$_GET['id_evento']));?>">Somente tarefas em aberto</a>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'tarefa-grid',
	'dataProvider'=>$dataProvider,
	'filter'=>$model,
	'columns'=>array(
		//'id',
		'nome',
		array(
			'name' => 'id_integrante',
			'header' => 'Responsável',
			'filter'=>CHtml::listData(Integrante::model()->findAll(array('condition'=>'apagado != 1','order'=>'nome')),'id','nome'),
			'value' => '$data->idIntegrante->nome'
		),
		//'id_evento',
		array(
			'name' => 'andamento',
			'header' => 'Andamento',
			'value' => 'nl2br($data->andamento)',
			'type'=>'raw',
			'htmlOptions'=>array('width'=>'100%'),
		),
		'valor_pg',
		'valor_total',
		//'apagado',
		array(
			'class'=>'CButtonColumn',
			'template'=>'{view}{update}{delete}',
			'buttons'=>array(
				'update' => array(
					'url'=>'Yii::app()->createUrl("tarefa/update", array("id"=>$data->id,"id_evento"=>"'. $_GET['id_evento'] . '"))',
					'visible'=>'$data->id_integrante=="' . Integrante::model()->chkId() . '"'
				),
				'view' => array(
					'url'=>'Yii::app()->createUrl("tarefa/view", array("id"=>$data->id,"id_evento"=>"'. $_GET['id_evento'] . '"))',
				),
				'delete' => array(
					'url'=>'Yii::app()->createUrl("tarefa/delete", array("id"=>$data->id,"id_evento"=>"'. $_GET['id_evento'] . '"))',
					'visible'=>'$data->id_integrante=="' . Integrante::model()->chkId() . '"'
				),
			),
		),
	),
)); ?>
