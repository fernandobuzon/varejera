<?php
/* @var $this MovContaController */
/* @var $model MovConta */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'mov-conta-form',
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
		<?php echo $form->labelEx($model,'id_conta_orig'); ?>
		<?php echo CHtml::activeDropDownList($model,'id_conta_orig',Conta::model()->listaContas(),array('empty'=>'Escolha a conta de origem')); ?>
		<?php echo $form->error($model,'id_conta_orig'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'id_conta_dest'); ?>
		<?php echo CHtml::activeDropDownList($model,'id_conta_dest',Conta::model()->listaContas(),array('empty'=>'Escolha a conta de destino')); ?>
		<?php echo $form->error($model,'id_conta_dest'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'valor'); ?>
		<?php echo $form->textField($model,'valor',array('size'=>11,'maxlength'=>11)); ?>
		<?php echo $form->error($model,'valor'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->