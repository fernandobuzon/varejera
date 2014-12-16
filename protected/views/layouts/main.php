<?php /* @var $this Controller */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />

	<!-- blueprint CSS framework -->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print" />
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection" />
	<![endif]-->

	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/cmenu.css" />

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>

<div class="container" id="page">

	<div id="header">
		<div id="logo"><?php echo CHtml::encode(Yii::app()->name); ?></div>
	</div><!-- header -->

	<div id="mainmenu">
		<?php $this->widget('zii.widgets.CMenu',array(
			'items'=>array(
				//array('label'=>'Início', 'url'=>array('/site/index')),
				//array('label'=>'About', 'url'=>array('/site/page', 'view'=>'about')),
				//array('label'=>'Contact', 'url'=>array('/site/contact')),
				array('label'=>'Login', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),

				array('label'=>'Cadastros', 'url'=>'',
					'items'=>array(
						array('label'=>'Parceiros', 'url'=>array('/Parceiro/admin')),
						array('label'=>'Contas', 'url'=>array('/Conta/admin')),
						array('label'=>'Despesas', 'url'=>array('/Despesa/admin')),
						array('label'=>'Gêneros', 'url'=>array('/Genero/admin')),
						array('label'=>'Bandas', 'url'=>array('/Banda/admin')),
						array('label'=>'Tipo de Produtos', 'url'=>array('/Tipo/admin')),
						array('label'=>'Produtos', 'url'=>array('/Produto/admin')),
						array('label'=>'Integrantes', 'url'=>array('/Integrante/admin')),
					), 'visible'=>!Yii::app()->user->isGuest),

				array('label'=>'Mov. de Produtos', 'url'=>'',
					'items'=>array(
						array('label'=>'Trocas', 'url'=>array('/Troca/admin')),
						array('label'=>'Vendas', 'url'=>array('/Venda/admin')),
						array('label'=>'Cortesias (envio)', 'url'=>array('/Cortesia/admin')),
						array('label'=>'Consignações', 'url'=>array('/Consig/admin')),
						array('label'=>'Compras', 'url'=>array('/Compra/admin')),
						array('label'=>'Cortesias (receb)', 'url'=>array('/Gratis/admin')),
						array('label'=>'Retiradas', 'url'=>array('/Retirada/admin')),
						array('label'=>'Baixas', 'url'=>array('/Baixa/admin')),
					), 'visible'=>!Yii::app()->user->isGuest),

				array('label'=>'Financeiro', 'url'=>'',
					'items'=>array(
						array('label'=>'Mov. Contas', 'url'=>array('/MovConta/admin')),
						array('label'=>'Pag. Despesas', 'url'=>array('/MovDespesa/admin')),
						array('label'=>'Investimentos', 'url'=>array('/Investimento/admin')),
					), 'visible'=>!Yii::app()->user->isGuest),

				array('label'=>'Relatórios', 'url'=>'',
					'items'=>array(
						array('label'=>'Geral', 'url'=>array('/Report/index')),
						array('label'=>'Integrantes', 'url'=>array('/RelIntegrante/index')),
						array('label'=>'Estoque', 'url'=>array('/Estoque/admin')),
					), 'visible'=>!Yii::app()->user->isGuest),

				array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest)
			)
		)); ?>
	</div><!-- mainmenu -->
	<?php if(isset($this->breadcrumbs)):?>
		<?php $this->widget('zii.widgets.CBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
		)); ?><!-- breadcrumbs -->
	<?php endif?>

	<?php echo $content; ?>

	<div class="clear"></div>

	<div id="footer">
		Copyright &copy; <?php echo date('Y'); ?> by Varejera Records.<br/>
		All Rights are Mother Fucker!<br/>
		<!-- <?php echo Yii::powered(); ?> -->
	</div><!-- footer -->

</div><!-- page -->

</body>
</html>
