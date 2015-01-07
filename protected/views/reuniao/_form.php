<?php
/* @var $this ReuniaoController */
/* @var $model Reuniao */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'reuniao-form',
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
		<?php echo $form->labelEx($model,'ata'); ?>
		<?php echo $form->textArea($model,'ata',array('style'=>'width:700px;height:340px;','maxlength'=>10000)); ?>
		<?php echo $form->error($model,'ata'); ?>
	</div>

	<?php echo CHtml::hiddenField('Reuniao[id_evento]' , $_GET['id_evento'], array('id' => 'reuniao_id_evento')); ?>
	
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->