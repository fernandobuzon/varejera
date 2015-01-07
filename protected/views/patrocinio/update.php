<?php
/* @var $this PatrocinioController */
/* @var $model Patrocinio */

$this->breadcrumbs=array(
	'Eventos'=>array('Evento/admin'),
	$model->idEvento->nome=>array('Evento/view','id'=>$model->id_evento),
	'Patrocínios'=>array('admin','id_evento'=>$model->id_evento),
	$model->idPatrocinador->nome=>array('view','id'=>$model->id),
	'Editar',
);

$this->menu=array(
	//array('label'=>'List Patrocinio', 'url'=>array('index')),
	array('label'=>'Novo Patrocínio', 'url'=>array('create','id_evento'=>$model->id_evento)),
	array('label'=>'Detalhes', 'url'=>array('view', 'id'=>$model->id,'id_evento'=>$model->id_evento)),
	array('label'=>'Lista', 'url'=>array('admin','id_evento'=>$model->id_evento)),
);
?>

<h1>Patrocínio: <?php echo $model->idPatrocinador->nome; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>