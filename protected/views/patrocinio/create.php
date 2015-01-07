<?php
/* @var $this PatrocinioController */
/* @var $model Patrocinio */

$this->breadcrumbs=array(
	Evento::model()->chkEvento($_GET['id_evento'])=>array('Evento/view','id'=>$_GET['id_evento']),
	'Patrocínios'=>array('admin','id_evento'=>$_GET['id_evento']),
	'Novo',
);

$this->menu=array(
	//array('label'=>'List Patrocinio', 'url'=>array('index')),
	array('label'=>'Manage Patrocinio', 'url'=>array('admin','id_evento'=>$_GET['id_evento'])),
);
?>

<h1>Novo Patrocínio <?php echo Evento::model()->chkEvento($_GET['id_evento']) ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>