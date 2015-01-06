<?php
/* @var $this PatrocinadorController */
/* @var $model Patrocinador */

$this->breadcrumbs=array(
	'Patrocinadors'=>array('admin'),
	'Novo',
);

$this->menu=array(
	//array('label'=>'List Patrocinador', 'url'=>array('index')),
	array('label'=>'Lista', 'url'=>array('admin')),
);
?>

<h1>Novo Patrocinador</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>