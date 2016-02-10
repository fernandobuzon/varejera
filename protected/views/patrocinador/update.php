<?php
/* @var $this PatrocinadorController */
/* @var $model Patrocinador */

$this->breadcrumbs=array(
	'Patrocinadors'=>array('index'),
	$model->nome=>array('view','id'=>$model->id),
	'Editar',
);

$this->menu=array(
	//array('label'=>'List Patrocinador', 'url'=>array('index')),
	array('label'=>'Novo Patrocinador', 'url'=>array('create')),
	array('label'=>'Detalhes', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Lista', 'url'=>array('admin')),
);
?>

<h1>Patrocinador: <?php echo $model->nome; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>