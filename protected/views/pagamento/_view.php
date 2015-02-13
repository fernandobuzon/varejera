<?php
/* @var $this PagamentoController */
/* @var $data Pagamento */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_gravacao')); ?>:</b>
	<?php echo CHtml::encode($data->id_gravacao); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_integrante')); ?>:</b>
	<?php echo CHtml::encode($data->id_integrante); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('data')); ?>:</b>
	<?php echo CHtml::encode($data->data); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('valor')); ?>:</b>
	<?php echo CHtml::encode($data->valor); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('obs')); ?>:</b>
	<?php echo CHtml::encode($data->obs); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('apagado')); ?>:</b>
	<?php echo CHtml::encode($data->apagado); ?>
	<br />


</div>