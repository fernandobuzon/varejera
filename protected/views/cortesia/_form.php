<?php
/* @var $this CortesiaController */
/* @var $model Saida */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'saida-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'data'); ?>
		<?php $this->widget('zii.widgets.jui.CJuiDatePicker', array(
        	'model'=>$model,
        	'attribute'=>'data',
			'language' => 'pt-BR',
			'options'=>array(
				'dateFormat'=>'dd/mm/yy'
			)	
    	)); ?>
		<?php echo $form->error($model,'data'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'qtde'); ?>
		<?php echo $form->textField($model,'qtde'); ?>
		<?php echo $form->error($model,'qtde'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'id_integrante'); ?>
		<?php echo CHtml::activeDropDownList($model,'id_integrante',Integrante::model()->listaIntegrantes(),array('empty'=>'Escolha o integrante')); ?>
		<?php echo $form->error($model,'id_integrante'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'id_produto'); ?>
		<?php echo CHtml::activeDropDownList($model,'id_produto',Produto::model()->listaProdutos(),array('empty'=>'Escolha o produto')); ?>
		<?php echo $form->error($model,'id_produto'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ocasiao'); ?>
		<?php echo $form->textField($model,'ocasiao',array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'ocasiao'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'id_parceiro'); ?>
		<?php echo CHtml::activeDropDownList($model,'id_parceiro',Parceiro::model()->listaParceiros(),array('empty'=>'Escolha o parceiro')); ?>
		<?php echo $form->error($model,'id_parceiro'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'obs'); ?>
		<?php echo $form->textField($model,'obs',array('size'=>60,'maxlength'=>300)); ?>
		<?php echo $form->error($model,'obs'); ?>
	</div>

	<!-- 
		<div class="row">
		<?php echo $form->labelEx($model,'id_troca'); ?>
		<?php echo $form->textField($model,'id_troca'); ?>
		<?php echo $form->error($model,'id_troca'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'id_consig'); ?>
		<?php echo $form->textField($model,'id_consig'); ?>
		<?php echo $form->error($model,'id_consig'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'apagado'); ?>
		<?php echo $form->textField($model,'apagado'); ?>
		<?php echo $form->error($model,'apagado'); ?>
	</div>
	-->
	
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->