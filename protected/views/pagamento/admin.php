<?php
/* @var $this PagamentoController */
/* @var $model Pagamento */

$this->breadcrumbs=array(
	'Gravações'=>array('Gravacao/admin'),
	Gravacao::model()->chkGravacao($_GET['id_gravacao'])=>array('Gravacao/view','id'=>$_GET['id_gravacao']),
	'Pagamentos',
);

echo "<br><h3>Efetuar novo pagamento:</h3>";

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

echo CHtml::button('Confirmar pagamento', array(
		'ajax' => array(
				'type'=>'POST',
				'url'=>CController::createUrl('gravacao/AjaxPagamento'),
				'success' => 'js:function(data) { $("#pagamento-grid").yiiGridView("update"); $("#restante").html(data);}',
		)
));

echo "<div id='restante'>";
$connection = Yii::app()->db;
$id_gravacao = $_GET['id_gravacao'];
$command = $connection->createCommand("select COALESCE(SUM(valor),0) from pagamento where id_gravacao = $id_gravacao and apagado <> 1");
$row = $command->queryRow();
foreach ($row as $key=>$val) {
	$restante = Gravacao::model()->chkValor($_GET['id_gravacao']) - $val;
	printf("&nbsp;Restante: %.2f", $restante);
}
echo "</div>";

$id_integrante = Integrante::model()->chkId();
echo CHtml::hiddenField('id_integrante' , $id_integrante, array('id' => 'id_integrante'));
echo CHtml::hiddenField('id_gravacao' , $_GET['id_gravacao'], array('id' => 'id_gravacao'));

$this->endWidget();
?>

<br><h3>Histórico de pagamentos:</h3>
<?php $this->widget('zii.widgets.grid.CGridView', array(
        'id'=>'pagamento-grid',
        'dataProvider'=>Pagamento::model()->searchByGravacao($_GET['id_gravacao']),
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
)); 

?>
