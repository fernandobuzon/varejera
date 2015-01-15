<?php
/* @var $this PagamentoController */
/* @var $model Pagamento */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'pagamento-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'id_gravacao'); ?>
		<?php echo $form->textField($model,'id_gravacao'); ?>
		<?php echo $form->error($model,'id_gravacao'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'id_integrante'); ?>
		<?php echo $form->textField($model,'id_integrante'); ?>
		<?php echo $form->error($model,'id_integrante'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'data'); ?>
		<?php echo $form->textField($model,'data'); ?>
		<?php echo $form->error($model,'data'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'valor'); ?>
		<?php echo $form->textField($model,'valor',array('size'=>11,'maxlength'=>11)); ?>
		<?php echo $form->error($model,'valor'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'apagado'); ?>
		<?php echo $form->textField($model,'apagado'); ?>
		<?php echo $form->error($model,'apagado'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->