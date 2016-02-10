<?php
/* @var $this ResumoController */

$this->breadcrumbs=array(
		'Eventos'=>array('Evento/admin'),
		Evento::model()->chkEvento($_GET['id_evento'])=>array('Evento/view','id'=>$_GET['id_evento']),
		'Resumo',
);

$id_evento = $_GET['id_evento'];
$connection = Yii::app()->db;

$command = $connection->createCommand("select COALESCE(SUM(valor),0) as 'Total de Patrocínios' from patrocinio where id_evento = $id_evento and apagado <> 1");
$row = $command->queryRow();
foreach ($row as $key=>$val) {
	$geral['totalPatrocinios'] = array('label'=>$key,'value'=>($val ? $val : "0.00"));
}

$command = $connection->createCommand("select COALESCE(SUM(valor_total),0) as 'Total de Gastos' from tarefa where id_evento = $id_evento and apagado <> 1");
$row = $command->queryRow();
foreach ($row as $key=>$val) {
	$geral['totalGastos'] = array('label'=>$key,'value'=>($val ? $val : "0.00"));
}

$command = $connection->createCommand("select COALESCE(SUM(lucro),0) as 'Lucro (no dia)' from evento where id = $id_evento and apagado <> 1");
$row = $command->queryRow();
foreach ($row as $key=>$val) {
	$geral['lucroDia'] = array('label'=>$key,'value'=>($val ? $val : "0.00"));
}

$geral['diferenca']['label'] = 'Diferença';
$geral['diferenca']['value'] = $geral['totalPatrocinios']['value'] - $geral['totalGastos']['value'];
$geral['diferenca']['value'] = money_format('%i', $geral['diferenca']['value']);

$geral['lucroReal']['label'] = 'Lucro previsto';
$geral['lucroReal']['value'] = $geral['lucroDia']['value'] + $geral['diferenca']['value'];
$geral['lucroReal']['value'] = money_format('%i', $geral['lucroReal']['value']);

$command = $connection->createCommand("select COALESCE(SUM(valor),0) as 'Patrocínios já recebidos' from patrocinio where id_evento = $id_evento and pg = 1 and apagado <> 1");
$row = $command->queryRow();
foreach ($row as $key=>$val) {
	$atual['totalPatrociniosReceb'] = array('label'=>$key,'value'=>($val ? $val : "0.00"));
}

$command = $connection->createCommand("select COALESCE(SUM(valor_pg),0) as 'Gastos quitados' from tarefa where id_evento = $id_evento and apagado <> 1");
$row = $command->queryRow();
foreach ($row as $key=>$val) {
	$atual['totalGastosQuitados'] = array('label'=>$key,'value'=>($val ? $val : "0.00"));
}

$command = $connection->createCommand("select COALESCE(SUM(valor),0) as 'Patrocínios a receber' from patrocinio where id_evento = $id_evento and pg = 0 and apagado <> 1");
$row = $command->queryRow();
foreach ($row as $key=>$val) {
	$atual['PatrociniosAReceber'] = array('label'=>$key,'value'=>($val ? $val : "0.00"));
}

$atual['gastosAPagar']['label'] = 'Gastos a pagar';
$atual['gastosAPagar']['value'] = $geral['totalGastos']['value'] - $atual['totalGastosQuitados']['value'];
$atual['gastosAPagar']['value'] = money_format('%i', $atual['gastosAPagar']['value']);

// R E N D E R
echo '<h3>Total:</h3>';
$this->widget('zii.widgets.CDetailView', array(
		'data' => array(), //to avoid error
		'attributes' => $geral,
));

echo '<br><h3>Situação atual:</h3>';
$this->widget('zii.widgets.CDetailView', array(
		'data' => array(), //to avoid error
		'attributes' => $atual,
));


$integrantes = Integrante::model()->findAll(array('condition'=>'apagado != 1'));

$i = 0;
foreach ($integrantes as $integrante)
{
	echo "<br><h3>" . $integrante->nome . ':</h3>';
	
	$command = $connection->createCommand("select COALESCE(SUM(valor),0) as 'Total de patrocínios' from patrocinio where id_evento = $id_evento and id_integrante = $integrante->id and apagado <> 1");
	$row = $command->queryRow();
	foreach ($row as $key=>$val) {
		$integ[$i]['totalPatrocinios'] = array('label'=>$key,'value'=>($val ? $val : "0.00"));
	}

	$command = $connection->createCommand("select COALESCE(SUM(valor_total),0) as 'Total de gastos' from tarefa where id_evento = $id_evento and id_integrante = $integrante->id and apagado <> 1");
	$row = $command->queryRow();
	foreach ($row as $key=>$val) {
		$integ[$i]['totalGastos'] = array('label'=>$key,'value'=>($val ? $val : "0.00"));
	}
	
	$integ[$i]['diferenca']['label'] = 'Diferença';
	$integ[$i]['diferenca']['value'] = $integ[$i]['totalPatrocinios']['value'] - $integ[$i]['totalGastos']['value'];
	$integ[$i]['diferenca']['value'] = money_format('%i', $integ[$i]['diferenca']['value']);

	$command = $connection->createCommand("select COALESCE(SUM(valor),0) as 'Patrocínios já recebidos' from patrocinio where id_evento = $id_evento and id_integrante = $integrante->id and pg = 1 and apagado <> 1");
	$row = $command->queryRow();
	foreach ($row as $key=>$val) {
		$integ[$i]['totalPatrociniosReceb'] = array('label'=>$key,'value'=>($val ? $val : "0.00"));
	}

	$command = $connection->createCommand("select COALESCE(SUM(valor_pg),0) as 'Gastos quitados' from tarefa where id_evento = $id_evento and id_integrante = $integrante->id and apagado <> 1");
	$row = $command->queryRow();
	foreach ($row as $key=>$val) {
		$integ[$i]['totalGastosQuitados'] = array('label'=>$key,'value'=>($val ? $val : "0.00"));
	}

	$command = $connection->createCommand("select COALESCE(SUM(valor),0) as 'Patrocínios a receber' from patrocinio where id_evento = $id_evento and id_integrante = $integrante->id and pg = 0 and apagado <> 1");
	$row = $command->queryRow();
	foreach ($row as $key=>$val) {
		$integ[$i]['PatrociniosAReceb'] = array('label'=>$key,'value'=>($val ? $val : "0.00"));
	}

	$integ[$i]['gastosAPagar']['label'] = 'Gastos a pagar';
	$integ[$i]['gastosAPagar']['value'] = $integ[$i]['totalGastos']['value'] - $integ[$i]['totalGastosQuitados']['value'];
	$integ[$i]['gastosAPagar']['value'] = money_format('%i', $integ[$i]['gastosAPagar']['value']);
	
	// R E N D E R
	$this->widget('zii.widgets.CDetailView', array(
			'data' => array(), //to avoid error
			'attributes' => $integ[$i],
	));
	
	$i++;
}
?>
