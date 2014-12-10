<?php
/* @var $this MovDespesaController */
/* @var $model MovDespesa */

$this->breadcrumbs=array(
	'Mov. Despesas'=>array('admin'),
	$model->idDespesa->nome=>array('view','id'=>$model->id),
	'Editar',
);

$this->menu=array(
	//array('label'=>'List MovDespesa', 'url'=>array('index')),
	array('label'=>'Novo Pagamento', 'url'=>array('create')),
	array('label'=>'Detalhes', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Lista', 'url'=>array('admin')),
);
?>

<h1>Pagamento: <?php echo $model->idDespesa->nome; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>