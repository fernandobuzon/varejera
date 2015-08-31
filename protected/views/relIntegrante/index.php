<?php
/* @var $this RelIntegranteController */

$this->breadcrumbs=array(
	'Relatórios',
	'Integrantes'
);
?>

<?php
	$integrantes = Integrante::model()->findAll(array('condition'=>'apagado != 1'));
		
	$i = 0;
	foreach ($integrantes as $integrante)
	{	
		echo "<h3>" . $integrante->nome . ':</h3>';

		// V A L O R E S
		$integ[$i] = array();
		echo "Valores:<br>";
		
		// Vendas recebidas
		$connection = Yii::app()->db;
		$command = $connection->createCommand("select COALESCE(SUM(valor),0) as 'Vendas recebidas' from saida where id_integrante = $integrante->id and (fiado = 0 or (fiado = 1 and quitado is not null)) and apagado <> 1");
		$row = $command->queryRow();
		foreach ($row as $key=>$val) {
			$integ[$i]['vendasReceb'] = array('label'=>$key,'value'=>($val ? $val : "0.00"));
		}

		// Recebido com trocas
		$connection = Yii::app()->db;
		$command = $connection->createCommand("select COALESCE(SUM(recebido),0) as 'Recebido com trocas' from troca where id_integrante = $integrante->id and apagado <> 1");
		$row = $command->queryRow();
		foreach ($row as $key=>$val) {
			$integ[$i]['trocasReceb'] = array('label'=>$key,'value'=>($val ? $val : "0.00"));
		}
		
		// Fiados a receber
		$connection = Yii::app()->db;
		$command = $connection->createCommand("select COALESCE(SUM(valor),0) as 'Fiados a receber' from saida where id_integrante = $integrante->id and fiado = 1 and quitado is null and apagado <> 1");
		$row = $command->queryRow();
		foreach ($row as $key=>$val) {
			$integ[$i]['fiado'] = array('label'=>$key, 'type'=>'html', 'value'=>($val ? $val : "0.00"));
		}

		// Recebido de patrocinios
		$connection = Yii::app()->db;
		$command = $connection->createCommand("select COALESCE(SUM(valor),0) as 'Patrocinios receb.' from patrocinio where id_integrante = $integrante->id and pg = 1 and apagado <> 1");
		$row = $command->queryRow();
		foreach ($row as $key=>$val) {
			$integ[$i]['patroc'] = array('label'=>$key, 'type'=>'html', 'value'=>($val ? $val : "0.00"));
		}

		// Total Faturado
		$val = number_format((float)$integ[$i]['vendasReceb']['value'] + $integ[$i]['trocasReceb']['value'] + $integ[$i]['fiado']['value'], 2, '.', '');
		$integ[$i]['faturado'] = array('label'=>'Total Faturado','value'=>$val);
				
		// Despesas
		$connection = Yii::app()->db;
		$command = $connection->createCommand("select COALESCE(SUM(valor),0) as 'Despesas' from mov_despesa where id_integrante = $integrante->id and apagado <> 1");
		$row = $command->queryRow();
		foreach ($row as $key=>$val) {
			$integ[$i]['despesas'] = array('label'=>$key,'value'=>($val ? $val : "0.00"));
		}
		
		// Tarefas (Pago)
		$connection = Yii::app()->db;
		$command = $connection->createCommand("select COALESCE(SUM(valor_pg),0) as 'Tarefas de eventos (Pago)' from tarefa where id_integrante = $integrante->id and apagado <> 1");
		$row = $command->queryRow();
		foreach ($row as $key=>$val) {
			$integ[$i]['tarefasPg'] = array('label'=>$key,'value'=>($val ? $val : "0.00"));
		}
		
		// Tarefas (A pagar)
		$tarefasPg = $integ[$i]['tarefasPg']['value'];
		$connection = Yii::app()->db;
		$command = $connection->createCommand("select (select COALESCE(SUM(valor_total),0) from tarefa where id_integrante = $integrante->id and apagado <> 1) - $tarefasPg as 'Tarefas (a Pagar)'");
		$row = $command->queryRow();
		foreach ($row as $key=>$val) {
			$integ[$i]['tarefasAPg'] = array('label'=>$key,'value'=>($val ? $val : "0.00"));
		}
		
		// Compras
		$connection = Yii::app()->db;
		$command = $connection->createCommand("select COALESCE(SUM(valor),0) as 'Compras' from entrada where id_integrante = $integrante->id and apagado <> 1");
		$row = $command->queryRow();
		foreach ($row as $key=>$val) {
			$integ[$i]['compras'] = array('label'=>$key,'value'=>($val ? $val : "0.00"));
		}

		// Total Gasto
		$val = number_format((float)$integ[$i]['despesas']['value'] + $integ[$i]['compras']['value'], 2, '.', '');
		$integ[$i]['gasto'] = array('label'=>'Total Gasto','value'=>$val);
		
		// Faturado - gasto
		$val = number_format((float)$integ[$i]['faturado']['value'] - $integ[$i]['gasto']['value'], 2, '.', '');
		$integ[$i]['dif'] = array('label'=>'Balanço (Faturado - Gasto)', 'type'=>'html', 'value'=>'<b>' . $val . '</b>');
		
		// Investimentos
		$connection = Yii::app()->db;
		$command = $connection->createCommand("select COALESCE(SUM(valor),0) as 'Investimentos' from investimento where id_integrante = $integrante->id and apagado <> 1");
		$row = $command->queryRow();
		foreach ($row as $key=>$val) {
			$integ[$i]['investimentos'] = array('label'=>$key,'value'=>($val ? $val : "0.00"));
		}

		// Transferências repassadas
		$connection = Yii::app()->db;
		$command = $connection->createCommand("select COALESCE(SUM(valor),0) as 'Transferências repassadas' from mov_conta where id_conta_orig = $integrante->id_conta and apagado <> 1");
		$row = $command->queryRow();
		foreach ($row as $key=>$val) {
			$integ[$i]['transferenciasRep'] = array('label'=>$key,'value'=>($val ? $val : "0.00"));
		}
		
		// Transferências recebidas
		$connection = Yii::app()->db;
		$command = $connection->createCommand("select COALESCE(SUM(valor),0) as 'Transferências recebidas' from mov_conta where id_conta_dest = $integrante->id_conta and apagado <> 1");
		$row = $command->queryRow();
		foreach ($row as $key=>$val) {
			$integ[$i]['transferenciasRec'] = array('label'=>$key,'value'=>($val ? $val : "0.00"));
		}

		// Pago para Gravações
		$connection = Yii::app()->db;
		$command = $connection->createCommand("select COALESCE(SUM(valor),0) as 'Pago para Gravações' from pagamento where id_integrante = $integrante->id and apagado <> 1");
		$row = $command->queryRow();
		foreach ($row as $key=>$val) {
			$integ[$i]['pagoGrav'] = array('label'=>$key,'value'=>($val ? $val : "0.00"));
		}
	
		// Lucros de eventos em conta pessoal
                $connection = Yii::app()->db;
                $command = $connection->createCommand("select COALESCE(SUM(lucro),0) as 'Lucro de eventos em Conta' from evento where id_conta = $integrante->id_conta and apagado <> 1");
                $row = $command->queryRow();
                foreach ($row as $key=>$val) {
                        $lucroEvConta = ($val ? $val : "0.00");
                }
	
		// Em caixa
		$val = number_format((float)$integ[$i]['vendasReceb']['value'] + $integ[$i]['trocasReceb']['value'] - $integ[$i]['despesas']['value'] - $integ[$i]['compras']['value'] - $integ[$i]['transferenciasRep']['value'] + $integ[$i]['transferenciasRec']['value'] - $integ[$i]['pagoGrav']['value'] - $integ[$i]['tarefasPg']['value'] + $integ[$i]['investimentos']['value'], 2, '.', '') + $integ[$i]['patroc']['value'] + $lucroEvConta;
		$integ[$i]['caixa'] = array('label'=>'Em caixa', 'type'=>'html', 'value'=>'<b>' . $val . '</b>');
				
		// R E N D E R
		$this->widget('zii.widgets.CDetailView', array(
				'data' => array(), //to avoid error
				'attributes' => $integ[$i],
		));
		echo "<br>";
		
		// Q U A N T I D A D E S
		$integQ[$i] = array();
		echo "Quantidades:<br>";
		
		// Produtos Vendidos
		$connection = Yii::app()->db;
		$command = $connection->createCommand("select SUM(qtde) as 'Produtos Vendidos' from saida where valor <> 0 and id_integrante = $integrante->id and apagado <> 1");
		$row = $command->queryRow();
		foreach ($row as $key=>$val) {
			$integQ[$i]['vendidos'] = array('label'=>$key,'value'=>($val ? $val : "0"));
		}
		
		// Trocas realizadas
		$connection = Yii::app()->db;
		$command = $connection->createCommand("select count(*) as 'Trocas realizadas' from troca where id_integrante = $integrante->id and apagado <> 1");
		$row = $command->queryRow();
		foreach ($row as $key=>$val) {
			$integQ[$i]['totalTrocas'] = array('label'=>$key,'value'=>($val ? $val : "0"));
		}
		
		// Produtos enviados
		$connection = Yii::app()->db;
		$command = $connection->createCommand("select COALESCE(SUM(qtde),0) as 'Trocas (produtos enviados)' from saida where id_integrante = $integrante->id and id_troca is not null and apagado <> 1");
		$row = $command->queryRow();
		foreach ($row as $key=>$val) {
			$integQ[$i]['trocasEnv'] = array('label'=>$key,'value'=>($val ? $val : "0"));
		}
		
		// Produtos recebidos
		$connection = Yii::app()->db;
		$command = $connection->createCommand("select COALESCE(SUM(qtde),0) as 'Trocas (produtos receb.)' from entrada where id_integrante = $integrante->id and id_troca is not null and apagado <> 1");
		$row = $command->queryRow();
		foreach ($row as $key=>$val) {
			$integQ[$i]['trocasProdReceb'] = array('label'=>$key,'value'=>($val ? $val : "0"));
		}

		// Tarefas a fazer
		$connection = Yii::app()->db;
		$command = $connection->createCommand("select COALESCE(COUNT(*),0) as 'Tarefas a fazer' from tarefa where id_integrante = $integrante->id and conclusao is null and apagado <> 1");
		$row = $command->queryRow();
		foreach ($row as $key=>$val) {
			$integQ[$i]['tarefasAFazer'] = array('label'=>$key,'value'=>($val ? $val : "0"));
		}

		// Tarefas realizadas
		$connection = Yii::app()->db;
		$command = $connection->createCommand("select COALESCE(COUNT(*),0) as 'Tarefas realizadas' from tarefa where id_integrante = $integrante->id and conclusao is not null and apagado <> 1");
		$row = $command->queryRow();
		foreach ($row as $key=>$val) {
			$integQ[$i]['tarefasRealizadas'] = array('label'=>$key,'value'=>($val ? $val : "0"));
		}
		
		// Remessas em consignação
		$connection = Yii::app()->db;
		$command = $connection->createCommand("select count(*) as 'Remessas em consignação' from consig where id_integrante = $integrante->id and apagado <> 1");
		$row = $command->queryRow();
		foreach ($row as $key=>$val) {
			$integQ[$i]['consig'] = array('label'=>$key,'value'=>($val ? $val : "0"));
		}

		// Cortesias
		$connection = Yii::app()->db;
		$command = $connection->createCommand("select SUM(qtde) as 'Cortesias feitas' from saida where valor = 0 and id_integrante = $integrante->id and apagado <> 1");
		$row = $command->queryRow();
		foreach ($row as $key=>$val) {
			$integQ[$i]['cortesias'] = array('label'=>$key,'value'=>($val ? $val : "0"));
		}

		// Fiados a receber
		$connection = Yii::app()->db;
		$command = $connection->createCommand("select SUM(qtde) as 'Fiados a receber' from saida where fiado = 1 and quitado is null and id_integrante = $integrante->id and apagado <> 1");
		$row = $command->queryRow();
		foreach ($row as $key=>$val) {
			$integQ[$i]['fiados'] = array('label'=>$key,'value'=>($val ? $val : "0"));
		}
		
		// Aquisições
		$connection = Yii::app()->db;
		$command = $connection->createCommand("select SUM(qtde) as 'Aquisições de produtos' from entrada where id_integrante = $integrante->id and apagado <> 1");
		$row = $command->queryRow();
		foreach ($row as $key=>$val) {
			$integQ[$i]['aquisicoes'] = array('label'=>$key,'value'=>($val ? $val : "0"));
		}
		
		// Total de Baixas
		$connection = Yii::app()->db;
		$command = $connection->createCommand("select SUM(qtde) as 'Total de baixas' from baixa where id_integrante = $integrante->id and apagado <> 1");
		$row = $command->queryRow();
		foreach ($row as $key=>$val) {
			$integQ[$i]['baixas'] = array('label'=>$key,'value'=>($val ? $val : "0"));
		}
		
		// R E N D E R
		$this->widget('zii.widgets.CDetailView', array(
				'data' => array(), //to avoid error
				'attributes' => $integQ[$i],
		));
		echo "<br>";

		$i++;
	}
	
?>
		
		
		
		
		
