<?php
/* @var $this ParceiroController */
/* @var $model Parceiro */

$this->breadcrumbs=array(
	'Parceiros'=>array('admin'),
	$model->nome,
);

$this->menu=array(
	//array('label'=>'List Parceiro', 'url'=>array('index')),
	array('label'=>'Novo Parceiro', 'url'=>array('create')),
	array('label'=>'Editar', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Apagar', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Tem certeza que deseja apagar esse parceiro?')),
	array('label'=>'Lista', 'url'=>array('admin')),
);
?>

<h1>Parceiro: <?php echo $model->nome; ?></h1>

<?php if ($model->distro == 1) $distro = 'Sim'; else $distro = 'Não'; ?>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		//'id',
		'nome',
		'contato',
		'endereco',
		'cidade',
		'cep',
		array(
			'label' => 'Distro?',
			'type' => 'raw',
			'value' => "$distro"
		)
		//'apagado',
	),
)); ?>
