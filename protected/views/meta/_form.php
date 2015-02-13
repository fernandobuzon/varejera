<?php
/* @var $this MetaController */
/* @var $model Meta */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'meta-form',
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
		<?php echo $form->labelEx($model,'previsao'); ?>
		<?php $this->widget('zii.widgets.jui.CJuiDatePicker', array(
        	'model'=>$model,
        	'attribute'=>'previsao',
			'language' => 'pt-BR',
			'options'=>array(
				'dateFormat'=>'dd/mm/yy'
			)	
    	)); ?>
		<?php echo $form->error($model,'previsao'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'nome'); ?>
		<?php echo $form->textField($model,'nome',array('size'=>60,'maxlength'=>240)); ?>
		<?php echo $form->error($model,'nome'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'andamento'); ?>
		<?php echo $form->textArea($model,'andamento',array('style'=>'width:700px;height:340px;','maxlength'=>10000)); ?>
		<?php echo $form->error($model,'andamento'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'valor_pg'); ?>
		<?php echo $form->textField($model,'valor_pg',array('size'=>11,'maxlength'=>11)); ?>
		<?php echo $form->error($model,'valor_pg'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'valor_total'); ?>
		<?php echo $form->textField($model,'valor_total',array('size'=>11,'maxlength'=>11)); ?>
		<?php echo $form->error($model,'valor_total'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'conclusao'); ?>
		<?php $this->widget('zii.widgets.jui.CJuiDatePicker', array(
        	'model'=>$model,
        	'attribute'=>'conclusao',
			'language' => 'pt-BR',
			'options'=>array(
				'dateFormat'=>'dd/mm/yy'
			)	
    	)); ?>
		<?php echo $form->error($model,'conclusao'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->