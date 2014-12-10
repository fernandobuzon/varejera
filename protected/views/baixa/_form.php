<?php
/* @var $this BaixaController */
/* @var $model Baixa */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'baixa-form',
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
		<?php echo $form->labelEx($model,'id_integrante'); ?>
		<?php echo CHtml::activeDropDownList($model,'id_integrante',Integrante::model()->listaIntegrantes(),array('empty'=>'Escolha o integrante')); ?>
		<?php echo $form->error($model,'id_integrante'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'qtde'); ?>
		<?php echo $form->textField($model,'qtde'); ?>
		<?php echo $form->error($model,'qtde'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'id_produto'); ?>
		<?php echo CHtml::activeDropDownList($model,'id_produto',Produto::model()->listaProdutos(),array('empty'=>'Escolha o produto')); ?>
		<?php echo $form->error($model,'id_produto'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'motivo'); ?>
		<?php echo $form->textField($model,'motivo',array('size'=>60,'maxlength'=>250)); ?>
		<?php echo $form->error($model,'motivo'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->