<?php
/* @var $this PatrocinioController */
/* @var $model Patrocinio */

$this->breadcrumbs=array(
	'Eventos'=>array('Evento/admin'),
	$model->idEvento->nome=>array('Evento/view','id'=>$model->id_evento),
	'Patrocínios'=>array('admin','id_evento'=>$model->id_evento),
	$model->idPatrocinador->nome,
);

if ($model->id_integrante == Integrante::model()->chkId())
{
	$this->menu=array(
		array('label'=>'Novo Patrocinio', 'url'=>array('create','id_evento'=>$model->id_evento)),
		array('label'=>'Editar', 'url'=>array('update', 'id'=>$model->id,'id_evento'=>$model->id_evento)),
		array('label'=>'Apagar', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
		array('label'=>'Lista', 'url'=>array('admin','id_evento'=>$model->id_evento)),
	);
}
else
{
	$this->menu=array(
			array('label'=>'Novo Patrocinio', 'url'=>array('create','id_evento'=>$model->id_evento)),
			array('label'=>'Lista', 'url'=>array('admin','id_evento'=>$model->id_evento)),
	);
}
?>

<h1>Patrocínio: <?php echo $model->idPatrocinador->nome; ?></h1>

<?php if ($model->pg == 1) $pg = 'Sim'; else $pg = 'Não'; ?>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		//'id',
		'data',
		array(
			'label' => 'Integrante',
			'type' => 'raw',
			'value' => $model->idIntegrante->nome
		),
		array(
			'label' => 'Patrocinador',
			'type' => 'raw',
			'value' => $model->idPatrocinador->nome
		),
		'valor',
		array(
			'label' => 'Pago?',
			'type' => 'raw',
			'value' => "$pg"
		),
		array(
			'name'=>'obs',
			'value'=>nl2br($model->obs),
			'type' => 'html',
		),
		array(
			'label' => 'Evento',
			'type' => 'raw',
			'value' => $model->idEvento->nome
		),
		//'id_producao',
		//'apagado',
	),
)); ?>
