<?php
/* @var $this MetaController */
/* @var $model Meta */

$this->breadcrumbs=array(
	'Metas'=>array('admin'),
	'Nova',
);

$this->menu=array(
	//array('label'=>'List Meta', 'url'=>array('index')),
	array('label'=>'Lista', 'url'=>array('admin')),
);
?>

<h1>Nova Meta</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>