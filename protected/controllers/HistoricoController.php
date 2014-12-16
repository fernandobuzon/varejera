<?php

class HistoricoController extends Controller
{
	public function actionAjaxHistorico()
	{
		//$data=Produto::model()->findAll();
	
		//$data=CHtml::listData($data,'id','nome');
		//foreach($data as $value=>$nome)
		//{
		//	echo CHtml::tag('option',
		//			array('value'=>$value),CHtml::encode($nome),true);
		//}
		
//select * from (
//select e.data as 'data', e.id_produto as 'id_produto', e.qtde as 'qtde', e.id_troca as 'id_troca', e.valor as 'valor', 'e' as 'tipo'
//from entrada e where e.id_produto = 1 and apagado <> 1
//union all
//select s.data as 'data', s.id_produto as 'id_produto', s.qtde as 'qtde', s.id_troca as 'id_troca', s.valor as 'valor', 's' as 'tipo'
//from saida s where s.id_produto = 1 and apagado <> 1) f order by f.data,f.tipo
		
		
		if ($_POST)
		{
			//echo 'tem post' . $_POST['Produto']['id'];
			$connection = Yii::app()->db;
			$command = $connection->createCommand("
				select * from (
				select e.data as 'data', e.id_produto as 'id_produto', e.qtde as 'qtde', e.id_troca as 'id_troca', e.valor as 'valor', 'e' as 'tipo'
				from entrada e where e.id_produto = " . $_POST['Produto']['id'] . " and apagado <> 1
				union all
				select s.data as 'data', s.id_produto as 'id_produto', s.qtde as 'qtde', s.id_troca as 'id_troca', s.valor as 'valor', 's' as 'tipo'
				from saida s where s.id_produto = " . $_POST['Produto']['id'] . " and apagado <> 1) f order by f.data,f.tipo
			");
			$row = $command->queryAll();
			
			//Parceiro::model()->getname()
			
			$i = 1;
			foreach ($row as $row)
			{
				//$data = date("d/m/Y", $row[data]);
				//$data = strtotime($data);
				//$data = date_format($data, 'd/m/Y');
				$data = '123';
				if ($row['tipo'] == 'e')
				{
					if ($row['id_troca'])
						$tipo = 'Recebido via troca com ';
					elseif (!$row['id_troca'] && $row['valor'] > 0 )
						$tipo = 'Comprado de ';
					else
						$tipo = 'Recebido gratuitamente de ';
				}
				elseif ($row['tipo'] == 's')
				{
					if ($row['id_troca'])
						$tipo = 'Enviado através de troca para ';
					elseif (!$row['id_troca'] && $row['valor'] > 0 )
						$tipo = 'Vendido para ';
					else
						$tipo = 'Enviado gratuitamente para ';
				}
				echo "<b>$i. </b> $tipo $data <br>";
				
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