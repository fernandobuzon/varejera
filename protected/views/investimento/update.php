<?php
/* @var $this InvestimentoController */
/* @var $model Investimento */

$this->breadcrumbs=array(
	//'Investimentos'=>array('index'),
	$model->idIntegrante->nome=>array('view','id'=>$model->id),
	'Editar',
);

$this->menu=array(
	//array('label'=>'List Investimento', 'url'=>array('index')),
	array('label'=>'Novo Investimento', 'url'=>array('create')),
	array('label'=>'Detalhes', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Editar', 'url'=>array('admin')),
);
?>

<h1>Investimento: <?php echo $model->idIntegrante->nome; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>