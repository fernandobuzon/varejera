<?php
/* @var $this GravacaoController */
/* @var $model Gravacao */

$this->breadcrumbs=array(
	'Gravacões'=>array('admin'),
	$model->nome,
);

$this->menu=array(
	//array('label'=>'List Gravacao', 'url'=>array('index')),
	array('label'=>'Nova Gravacão', 'url'=>array('create')),
	array('label'=>'Editar', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Apagar', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Lista', 'url'=>array('admin')),
);
?>

<h1>Gravacão: <?php echo $model->nome; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		//'id',
		array(
			'label' => 'Estúdio',
			'type' => 'raw',
			'value' => $model->idEstudio->nome
		),
		array(
			'label' => 'Banda',
			'type' => 'raw',
			'value' => $model->idBanda->nome
		),
		'nome',
		'data_i',
		'data_f',
		'valor',
		array(
			'name'=>'obs',
			'value'=>nl2br($model->obs),
			'type' => 'html',
		),
		//'apagado',
	),
)); ?>


<div class='row'>
<br><center>
<?php echo CHtml::link('Pagamentos',array('pagamento/admin','id_gravacao'=>"$model->id")); ?> -
<?php echo CHtml::link('Desenvolvimento',array('desenv/admin','id_gravacao'=>"$model->id")); ?>
</center>
</div>