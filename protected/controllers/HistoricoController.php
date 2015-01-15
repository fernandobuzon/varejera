<?php

class HistoricoController extends Controller
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
	
	public function actionAjaxHistorico()
	{		
		if ($_POST)
		{
			$connection = Yii::app()->db;
			$command = $connection->createCommand("
				select * from (
				select e.id as 'id', e.data as 'data', e.id_produto as 'id_produto', e.id_integrante as 'id_integrante', e.qtde as 'qtde', e.id_troca as 'id_troca', e.valor as 'valor', 'e' as 'tipo'
				from entrada e where e.id_produto = " . $_POST['Produto']['id'] . " and apagado <> 1
				union all
				select s.id as 'id', s.data as 'data', s.id_produto as 'id_produto', s.id_integrante as 'id_integrante', s.qtde as 'qtde', s.id_troca as 'id_troca', s.valor as 'valor', 's' as 'tipo'
				from saida s where s.id_produto = " . $_POST['Produto']['id'] . " and apagado <> 1) f order by f.data,f.tipo
			");
			$rows = $command->queryAll();
			
			echo "<br>";
			
			$i = 1;
			foreach ($rows as $row)
			{
				$valor = $row['valor'];
				$qtde = $row['qtde'];
				$id = $row['id'];
				$data = date('d/m/Y', strtotime($row['data']));
				if ($row['tipo'] == 'e')
				{
					$command = $connection->createCommand("
						select p.nome as 'nome' from parceiro p
						inner join entrada e on p.id = e.id_parceiro
						where e.id = $id
					");
					$parceiro = $command->queryRow();
					$parceiro = $parceiro['nome'];
					
					$command = $connection->createCommand("
						select i.nome as 'nome' from integrante i
						inner join entrada e on i.id = e.id_integrante
						where e.id = $id
					");
					$integrante = $command->queryRow();
					$integrante = $integrante['nome'];
					
					if ($row['id_troca'])
						$inicio = "$integrante recebeu $qtde unidade(s) via troca com ";
					elseif (!$row['id_troca'] && $row['valor'] > 0 )
						$inicio = "$integrante comprou $qtde unidade(s) por $valor de ";
					else
						$inicio = "$integrante recebeu $qtde unidade(s) gratuitamente de ";
				}
				elseif ($row['tipo'] == 's')
				{
					$command = $connection->createCommand("
						select p.nome as 'nome' from parceiro p
						inner join saida s on p.id = s.id_parceiro
						where s.id = $id
					");
					$parceiro = $command->queryRow();
					$parceiro = $parceiro['nome'];
					
					$command = $connection->createCommand("
							select i.nome as 'nome' from integrante i
							inner join saida s on i.id = s.id_integrante
							where s.id = $id
							");
					$integrante = $command->queryRow();
					$integrante = $integrante['nome'];
					
					if ($row['id_troca'])
						$inicio = "$integrante enviou $qtde unidade(s) através de troca para ";
					elseif (!$row['id_troca'] && $row['valor'] > 0 )
						$inicio = "$integrante vendeu $qtde unidade(s) por $valor para ";
					else
						$inicio = "$integrante enviou $qtde unidade(s) gratuitamente para ";
				}
				echo "<b>$i. </b> $inicio $parceiro dia $data <br>";
				
				$i++;
			}
		}
		else
			echo 'nao tem post';
	}
	
	public function actionIndex()
	{
		$this->render('index');
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