<?php
/* @var $this MovDespesaController */
/* @var $model MovDespesa */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'mov-despesa-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>
	
	<?php echo CHtml::hiddenField('MovDespesa[id_integrante]', Integrante::model()->chkId()); ?>

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
		<?php echo $form->labelEx($model,'id_despesa'); ?>
		<?php echo CHtml::activeDropDownList($model,'id_despesa',Despesa::model()->listaDespesas(),array('empty'=>'Escolha a despesa')); ?>
		<?php echo $form->error($model,'id_despesa'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'valor'); ?>
		<?php echo $form->textField($model,'valor',array('size'=>11,'maxlength'=>11)); ?>
		<?php echo $form->error($model,'valor'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'pg'); ?>
		<?php echo CHtml::activeDropDownList($model,'pg',array('1'=>'Sim','0'=>'Não')) ?>
		<?php echo $form->error($model,'pg'); ?>
	</div>

	<!-- <div class="row">
		<?php echo $form->labelEx($model,'id_saida'); ?>
		<?php echo $form->textField($model,'id_saida'); ?>
		<?php echo $form->error($model,'id_saida'); ?>
	</div> -->

	<div class="row">
		<?php echo $form->labelEx($model,'obs'); ?>
		<?php echo $form->textField($model,'obs',array('size'=>60,'maxlength'=>240)); ?>
		<?php echo $form->error($model,'obs'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->