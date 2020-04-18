<?php
/* @var $this SinavlarController */
/* @var $model Sinavlar */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id'); ?>
		<?php echo $form->textField($model,'id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'kat_id'); ?>
		<?php echo $form->textField($model,'kat_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'sinav_adi'); ?>
		<?php echo $form->textField($model,'sinav_adi',array('size'=>60,'maxlength'=>500)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'sinav_tanimi'); ?>
		<?php echo $form->textField($model,'sinav_tanimi',array('size'=>60,'maxlength'=>500)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ekleme_tarihi'); ?>
		<?php echo $form->textField($model,'ekleme_tarihi'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'parent_id'); ?>
		<?php echo $form->textField($model,'parent_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'acilis_mesaji_g'); ?>
		<?php echo $form->textField($model,'acilis_mesaji_g'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'acilis_mesaji'); ?>
		<?php echo $form->textField($model,'acilis_mesaji',array('size'=>60,'maxlength'=>3850)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->