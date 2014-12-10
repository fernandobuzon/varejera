<?php
/* @var $this IntegranteController */
/* @var $model Integrante */

$this->breadcrumbs=array(
	'Integrantes'=>array('admin'),
	$model->nome,
);

$this->menu=array(
	//array('label'=>'List Integrante', 'url'=>array('index')),
	array('label'=>'Novo Integrante', 'url'=>array('create')),
	array('label'=>'Editar', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Apagar', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Tem certeza que deseja apagar esse integrante?')),
	array('label'=>'Lista', 'url'=>array('admin')),
);
?>

<h1>Integrante: <?php echo $model->nome; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		//'id',
		'nome',
		array(
			'label' => 'Conta',
			'type' => 'raw',
			'value' => $model->idConta->nome
                ),
		//'apagado',
	),
)); ?>
