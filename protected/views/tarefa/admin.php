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

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'tarefa-grid',
	'dataProvider'=>$model->search(),
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
		array(
			'name' => 'conclusao',
			'header' => 'Data de conclusão',
			'filter'=>$this->widget('zii.widgets.jui.CJuiDatePicker', array(
				'model'=>$model,
				'attribute'=>'conclusao',
				'language' => 'pt-BR',
				'options'=>array(
					'dateFormat'=>'dd/mm/yy'
				)
			), true)
		),
		'valor_total',
		//'apagado',
		array(
			'class'=>'CButtonColumn',
			'template'=>'{view}{update}{delete}',
			'buttons'=>array(
				'update' => array(
					'url'=>'Yii::app()->createUrl("tarefa/update", array("id"=>$data->id,"id_evento"=>"'. $_GET['id_evento'] . '"))',
				),
				'view' => array(
					'url'=>'Yii::app()->createUrl("tarefa/view", array("id"=>$data->id,"id_evento"=>"'. $_GET['id_evento'] . '"))',
				),
				'delete' => array(
					'url'=>'Yii::app()->createUrl("tarefa/delete", array("id"=>$data->id,"id_evento"=>"'. $_GET['id_evento'] . '"))',
				),
			),
		),
	),
)); ?>
