<?php
/* @var $this PagamentoController */
/* @var $model Pagamento */

$this->breadcrumbs=array(
	'Pagamentos'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Pagamento', 'url'=>array('index')),
	array('label'=>'Create Pagamento', 'url'=>array('create')),
	array('label'=>'View Pagamento', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Pagamento', 'url'=>array('admin')),
);
?>

<h1>Update Pagamento <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>