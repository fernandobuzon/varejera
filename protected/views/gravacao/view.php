<?php
/* @var $this GravacaoController */
/* @var $model Gravacao */

$this->breadcrumbs=array(
	'Gravacões'=>array('admin'),
	$model->nome,
);

$this->menu=array(
	//array('label'=>'List Gravacao', 'url'=>array('index')),
	array('label'=>'Nova Gravacão', 'url'=>array('create')),
	array('label'=>'Editar', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Apagar', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Lista', 'url'=>array('admin')),
);
?>

<h1>Gravacão: <?php echo $model->nome; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		//'id',
		array(
			'label' => 'Estúdio',
			'type' => 'raw',
			'value' => $model->idEstudio->nome
		),
		array(
			'label' => 'Banda',
			'type' => 'raw',
			'value' => $model->idBanda->nome
		),
		'nome',
		'data_i',
		'data_f',
		'valor',
		array(
			'name'=>'obs',
			'value'=>nl2br($model->obs),
			'type' => 'html',
		),
		//'apagado',
	),
)); ?>


<div class="row">

<?php

$form=$this->beginWidget('CActiveForm', array(
	'id'=>'gravacao-form',
	'enableAjaxValidation'=>false,
));

$now = date('d/m/Y');
$modelp = new Pagamento;

$this->widget('zii.widgets.jui.CJuiDatePicker', array(
		'model'=>$modelp,
		'attribute'=>'data',
		'language' => 'pt-BR',
		'options'=>array(
				'dateFormat'=>'dd/mm/yy'
		),'htmlOptions'=>array('value'=>"$now")
));

echo $form->textField($modelp,'valor',array('size'=>11,'maxlength'=>11));

echo $form->textField($modelp,'obs',array('size'=>60,'maxlength'=>240,'placeholder'=>'Obs.'));

echo CHtml::button('Efetuar novo pagamento', array(
		'ajax' => array(
				'type'=>'POST',
				'url'=>CController::createUrl('gravacao/AjaxPagamento'),
				'success' => 'js:function(data) { $("#pagamento-grid").yiiGridView("update"); $("#restante").html(data);}',
		)
));

echo "<div id='restante'>";
$connection = Yii::app()->db;
$command = $connection->createCommand("select COALESCE(SUM(valor),0) from pagamento where id_gravacao = $model->id and apagado <> 1");
$row = $command->queryRow();
foreach ($row as $key=>$val) {
	$restante = $model->valor - $val;
	printf("&nbsp;Restante: %.2f", $restante);
}
echo "</div>";

$id_integrante = Integrante::model()->chkId();
echo CHtml::hiddenField('id_integrante' , $id_integrante, array('id' => 'id_integrante'));
echo CHtml::hiddenField('id_gravacao' , $model->id, array('id' => 'id_gravacao'));

$this->endWidget();
?>
</div>

<div class="row">
<br><h3>Histórico de pagamentos:</h3>
<?php $this->widget('zii.widgets.grid.CGridView', array(
        'id'=>'pagamento-grid',
        'dataProvider'=>Pagamento::model()->searchByGravacao($model->id),
        'columns'=>array(
			'data',
			array(
				'name' => 'id_integrante',
				'header' => 'Integrante',
				'value' => '$data->idIntegrante->nome'
			),
        	'valor',
        	'obs',
        	array(
        		'class'=>'CButtonColumn',
				'template'=>'{delete}',
				'buttons'=>array(
					'delete'=>array(
						'url'=>'Yii::app()->createUrl("pagamento/delete", array("id"=>$data->id))',
						'visible'=>'$data->id_integrante=="' . Integrante::model()->chkId() . '"'
					)
				)
        	),
        ),
)); ?>
</div>