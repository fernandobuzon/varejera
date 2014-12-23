<?php
/* @var $this TrocaController */
/* @var $model Troca */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'troca-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<?php echo CHtml::hiddenField('Troca[id_integrante]', Integrante::model()->chkId()); ?>
	
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
		<?php echo $form->labelEx($model,'id_parceiro'); ?>
		<?php echo CHtml::activeDropDownList($model,'id_parceiro',Parceiro::model()->listaParceiros(),array('empty'=>'Escolha o parceiro')); ?>
		<?php echo $form->error($model,'id_integrante'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'pago'); ?>
		<?php echo $form->textField($model,'pago',array('size'=>11,'maxlength'=>11)); ?>
		<?php echo $form->error($model,'pago'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'recebido'); ?>
		<?php echo $form->textField($model,'recebido',array('size'=>11,'maxlength'=>11)); ?>
		<?php echo $form->error($model,'recebido'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->