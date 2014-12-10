<?php
/* @var $this BandaController */
/* @var $model Banda */

$this->breadcrumbs=array(
	'Bandas'=>array('admin'),
	'Nova',
);

$this->menu=array(
	//array('label'=>'List Banda', 'url'=>array('index')),
	array('label'=>'Lista', 'url'=>array('admin')),
);
?>

<h1>Nova Banda</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>