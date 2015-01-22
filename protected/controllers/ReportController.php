<?php

class ReportController extends Controller
{
	public function filters()
	{
		return array(
				'accessControl', // perform access control for CRUD operations
				'postOnly + delete', // we only allow deletion via POST request
		);
	}
	
	public function accessRules()
	{
		return array(
				array('allow', // allow authenticated user to perform 'create' and 'update' actions
						'users'=>array('@'),
				),
				array('deny',  // deny all users
						'users'=>array('*'),
				),
		);
	}
	
	public function actionIndex()
	{
		// R E C E I T A S
		$receitas = array();		
		
		// Vendas à vista
		$connection = Yii::app()->db;
		$command = $connection->createCommand('select COALESCE(SUM(valor),0) as "Vendas a vista" from saida where fiado = 0 and quitado is null and apagado <> 1');
		$row = $command->queryRow();
		foreach ($row as $key=>$val) {
			$receitas['vendasAVista'] = array('label'=>$key,'value'=>($val ? $val : "0.00"));
		}

		// Vendas via consignação
		$connection = Yii::app()->db;
		$command = $connection->createCommand('select COALESCE(SUM(valor),0) as "Vendas via consignação" from saida where id_consig is not null and apagado <> 1');
		$row = $command->queryRow();
		foreach ($row as $key=>$val) {
			$receitas['vendasConsig'] = array('label'=>$key,'value'=>($val ? $val : "0.00"));
		}

		// Trocas
		$connection = Yii::app()->db;
		$command = $connection->createCommand('select COALESCE(SUM(recebido),0) as "Recebido de trocas" from troca where apagado <> 1');
		$row = $command->queryRow();
		foreach ($row as $key=>$val) {
			$receitas['recebidoTrocas'] = array('label'=>$key,'value'=>($val ? $val : "0.00"));
		}

		// Investimentos
		$connection = Yii::app()->db;
		$command = $connection->createCommand('select COALESCE(SUM(valor),0) as "Investimentos" from investimento where apagado <> 1');
		$row = $command->queryRow();
		foreach ($row as $key=>$val) {
			$receitas['investimentos'] = array('label'=>$key,'value'=>($val ? $val : "0.00"));
		}
		
		// Fiados pagos
		$connection = Yii::app()->db;
		$command = $connection->createCommand('select COALESCE(SUM(valor),0) as "Fiado (pagos)" from saida where fiado = 1 and quitado is not null and apagado <> 1');
		$row = $command->queryRow();
		foreach ($row as $key=>$val) {
			$receitas['fiadosPagos'] = array('label'=>$key,'value'=>($val ? $val : "0.00"));
		}
		
		// Fiados Pendentes
		$connection = Yii::app()->db;
		$command = $connection->createCommand('select COALESCE(SUM(valor),0) as "Fiado (pendentes)" from saida where fiado = 1 and quitado is null and apagado <> 1');
		$row = $command->queryRow();
		foreach ($row as $key=>$val) {
			$receitas['fiadosPendentes'] = array('label'=>$key,'value'=>($val ? $val : "0.00"));
		}
		
		// Total de Recebimentos
		$val = number_format((float)$receitas['vendasAVista']['value'] + $receitas['fiadosPagos']['value'] + $receitas['recebidoTrocas']['value'], 2, '.', '');
		$receitas['totalRecebimentos'] = array('label'=>'Total de Recebimentos','value'=>($val ? $val : "0.00"));

		// Total Faturado
		$val = number_format((float)$receitas['totalRecebimentos']['value'] + $receitas['fiadosPendentes']['value'], 2, '.', '');
		$receitas['totalFaturado'] = array('label'=>'Total Faturado','value'=>($val ? $val : "0.00"));
		
		// D E S P E S A S
		$despesas = array();		

		// Compras
		$connection = Yii::app()->db;
		$command = $connection->createCommand('select COALESCE(SUM(valor),0) as "Compra de produtos" from entrada where apagado <> 1');
		$row = $command->queryRow();
		foreach ($row as $key=>$val) {
			$despesas['compras'] = array('label'=>$key,'value'=>($val ? $val : "0.00"));
		}

		// Despesas
		$connection = Yii::app()->db;
		$command = $connection->createCommand('select COALESCE(SUM(valor),0) as "Despesas" from mov_despesa where apagado <> 1');
		$row = $command->queryRow();
		foreach ($row as $key=>$val) {
			$despesas['despesas'] = array('label'=>$key,'value'=>($val ? $val : "0.00"));
		}

		// Gravações (PG)
		$connection = Yii::app()->db;
		$command = $connection->createCommand('select COALESCE(SUM(valor),0) as "Gravações (Pago)" from pagamento where apagado <> 1');
		$row = $command->queryRow();
		foreach ($row as $key=>$val) {
			$despesas['gravacoesPg'] = array('label'=>$key,'value'=>($val ? $val : "0.00"));
		}

		// Gravações (a pagar)
		$gravacoesPg = $despesas['gravacoesPg']['value'];
		$connection = Yii::app()->db;
		$command = $connection->createCommand("select (select COALESCE(SUM(valor),0) from gravacao where apagado <> 1) - $gravacoesPg as 'Gravações (A pagar)'");
		$row = $command->queryRow();
		foreach ($row as $key=>$val) {
			$despesas['gravacoesAPg'] = array('label'=>$key,'value'=>($val ? $val : "0.00"));
		}
		
		// Tarefas (PG)
		$connection = Yii::app()->db;
		$command = $connection->createCommand('select COALESCE(SUM(valor_pg),0) as "Tarefas de eventos (Pago)" from tarefa where apagado <> 1');
		$row = $command->queryRow();
		foreach ($row as $key=>$val) {
			$despesas['tarefasPg'] = array('label'=>$key,'value'=>($val ? $val : "0.00"));
		}

		// Tarefas (a pagar)
		$tarefasPg = $despesas['tarefasPg']['value'];
		$connection = Yii::app()->db;
		$command = $connection->createCommand("select (select COALESCE(SUM(valor_total),0) from tarefa where apagado <> 1) - $tarefasPg as 'Tarefas (A pagar)'");
		$row = $command->queryRow();
		foreach ($row as $key=>$val) {
			$despesas['tarefasAPg'] = array('label'=>$key,'value'=>($val ? $val : "0.00"));
		}
		
		// Trocas
		$connection = Yii::app()->db;
		$command = $connection->createCommand('select COALESCE(SUM(pago),0) as "Pago com trocas" from troca where apagado <> 1');
		$row = $command->queryRow();
		foreach ($row as $key=>$val) {
			$despesas['pagoTrocas'] = array('label'=>$key,'value'=>($val ? $val : "0.00"));
		}

		// Total de Pagamentos
		$connection = Yii::app()->db;
		$command = $connection->createCommand('select (select COALESCE(SUM(valor),0) from entrada where apagado <> 1) + (select COALESCE(SUM(valor),0) from mov_despesa where apagado <> 1) + (select COALESCE(SUM(valor),0) from pagamento where apagado <> 1) as "Total de Pagamentos"');
		$row = $command->queryRow();
		foreach ($row as $key=>$val) {
			$despesas['totalPagamentos'] = array('label'=>$key,'value'=>($val ? $val : "0.00"));
		}
		
		// G E R A L
		$geral = array();
		
		// Caixa Atual
		$val = number_format((float)$receitas['totalRecebimentos']['value'] - $despesas['totalPagamentos']['value'] - $despesas['tarefasPg']['value'] + $receitas['investimentos']['value'], 2, '.', ''); 
		$geral['caixa'] = array('label'=>'Caixa Atual','value'=>$val);
		
		// Caixa Atual + fiados
		$val = number_format((float)$geral['caixa']['value'] + $receitas['fiadosPendentes']['value'], 2, '.', '');
		$geral['caixaMaisFiados'] = array('label'=>'Caixa Atual + Fiados','value'=>$val);

		// Balanço Atual (sem investimentos)
		$val = number_format((float)$geral['caixa']['value'] - $receitas['investimentos']['value'], 2, '.', '');
		$geral['balancoAtual'] = array('label'=>'Balanço atual sem invest.','value'=>$val);

		// Balanço Total (sem investimentos)
		$val = number_format((float)$geral['caixaMaisFiados']['value'] - $receitas['investimentos']['value'] - $despesas['gravacoesAPg']['value'] - $despesas['tarefasAPg']['value'], 2, '.', '');
		$geral['balancoTotal'] = array('label'=>'Balanço total sem invest.','value'=>$val);
		
		// S A L D O S
		$contas = Conta::model()->findAll(array('condition'=>'apagado != 1'));
		$integrantes = Integrante::model()->findAll(array('condition'=>'apagado != 1'));
		foreach ($contas as $conta)
		{
			$integranteID = "";
			foreach($integrantes as $integrante)
			{
				if ($conta->id == $integrante->id_conta)
				{
					$integranteID = $integrante->id;
					break;
				}
			}
		
			if ($integranteID != "")
			{
				$connection = Yii::app()->db;
				$command = $connection->createCommand("select
						(select COALESCE(SUM(valor),0) from saida where id_integrante = $integranteID and (fiado = 0 or (fiado = 1 and quitado is not null)) and apagado <> 1)
						+ (select COALESCE(SUM(recebido),0) from troca where id_integrante = $integranteID and apagado <> 1)
						- (select COALESCE(SUM(valor),0) from mov_despesa where id_integrante = $integranteID and apagado <> 1)
						- (select COALESCE(SUM(valor),0) from entrada where id_integrante = $integranteID and apagado <> 1)
						- (select COALESCE(SUM(valor),0) from mov_conta where id_conta_orig = $conta->id and apagado <> 1)
						- (select COALESCE(SUM(valor),0) from pagamento where id_integrante = $integranteID and apagado <> 1)
						- (select COALESCE(SUM(valor_pg),0) from tarefa where id_integrante = $integranteID and apagado <> 1)
						+ (select COALESCE(SUM(valor),0) from investimento where id_integrante = $integranteID and apagado <> 1)
						+ (select COALESCE(SUM(valor),0) from mov_conta where id_conta_dest = $conta->id and apagado <> 1) 
						as '$conta->nome'");				
				$row = $command->queryRow();
				foreach ($row as $key=>$val) {
					$saldos[] = array('label'=>$key,'value'=>($val ? $val : "0.00"));
				}
			}
			else
			{
				$connection = Yii::app()->db;
				$command = $connection->createCommand("select
						(select COALESCE(SUM(valor),0) from mov_conta where id_conta_dest = $conta->id and apagado <> 1)
						- (select COALESCE(SUM(valor),0) from mov_conta where id_conta_orig = $conta->id and apagado <> 1)
						as '$conta->nome'");
				$row = $command->queryRow();
				foreach ($row as $key=>$val) {
					$saldos[] = array('label'=>$key,'value'=>($val ? $val : "0.00"));
				}
			}
		}
		
		// R E N D E R
		$this->render('index',array(
				'geral'=>$geral,
				'receitas'=>$receitas,
				'despesas'=>$despesas,
				'saldos'=>$saldos
		));
	}

	// Uncomment the following methods and override them if needed
	/*
	public function filters()
	{
		// return the filter configuration for this controller, e.g.:
		return array(
			'inlineFilterName',
			array(
				'class'=>'path.to.FilterClass',
				'propertyName'=>'propertyValue',
			),
		);
	}

	public function actions()
	{
		// return external action classes, e.g.:
		return array(
			'action1'=>'path.to.ActionClass',
			'action2'=>array(
				'class'=>'path.to.AnotherActionClass',
				'propertyName'=>'propertyValue',
			),
		);
	}
	*/
}