<?php
/* @var $this ReportController */

$this->breadcrumbs=array(
	'Relatórios',
	'Financeiro'
);
?>

<?php

echo "Geral:";
$this->widget('zii.widgets.CDetailView', array(
		'data' => array(), //to avoid error
		'attributes' => $geral,
));
echo "<br>";

echo "Saldos:";
$this->widget('zii.widgets.CDetailView', array(
		'data' => array(), //to avoid error
		'attributes' => $saldos,
));
echo "<br>";

echo "Receitas:";
$this->widget('zii.widgets.CDetailView', array(
		'data' => array(), //to avoid error
		'attributes' => $receitas,
));
echo "<br>";

echo "Despesas:";
$this->widget('zii.widgets.CDetailView', array(
		'data' => array(), //to avoid error
		'attributes' => $despesas,
));
echo "<br>";

?>
