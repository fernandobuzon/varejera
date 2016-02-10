<?php
/* @var $this HistoricoController */

$this->breadcrumbs=array(
	'Historico',
);
?>

<?php

$form=$this->beginWidget('CActiveForm', array(
	'id'=>'historico-form',
	'enableAjaxValidation'=>false,
)); 

$model = new Produto;
echo CHtml::activeDropDownList(
	$model,'id',Produto::model()->listaProdutos(),array(
		'empty'=>'Escolha o produto',
		'ajax' => array(
			'type'=>'POST',
			'url'=>CController::createUrl('historico/ajaxHistorico'),
			'update'=>'#result_id',
		)
	)
);

$this->endWidget();
?>

<div id='result_id'></div>