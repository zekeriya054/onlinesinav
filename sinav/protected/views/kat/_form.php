<?php
/* @var $this KatController */
/* @var $model Kategoriler */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'kategoriler-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'kat_adi'); ?>
		<?php echo $form->textField($model,'kat_adi',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'kat_adi'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Kaydet' : 'Kaydet'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->