<?php
/* @var $this GratisController */
/* @var $model Entrada */

$this->breadcrumbs=array(
	'Recebimentos'=>array('admin'),
	'Novo',
);

$this->menu=array(
	//array('label'=>'List Entrada', 'url'=>array('index')),
	array('label'=>'Lista', 'url'=>array('admin')),
);
?>

<h1>Novo recebimento</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>