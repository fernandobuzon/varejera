<?php
/* @var $this ParceiroController */
/* @var $model Parceiro */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'parceiro-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'nome'); ?>
		<?php echo $form->textField($model,'nome',array('size'=>60,'maxlength'=>240)); ?>
		<?php echo $form->error($model,'nome'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'contato'); ?>
		<?php echo $form->textField($model,'contato',array('size'=>60,'maxlength'=>240)); ?>
		<?php echo $form->error($model,'contato'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'endereco'); ?>
		<?php echo $form->textField($model,'endereco',array('size'=>60,'maxlength'=>240)); ?>
		<?php echo $form->error($model,'endereco'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'cidade'); ?>
		<?php echo $form->textField($model,'cidade',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'cidade'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'cep'); ?>
		<?php echo $form->textField($model,'cep'); ?>
		<?php echo $form->error($model,'cep'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'distro'); ?>
		<?php echo CHtml::activeDropDownList($model,'distro',array('1'=>'Sim','0'=>'Não')) ?>
		<?php echo $form->error($model,'distro'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
