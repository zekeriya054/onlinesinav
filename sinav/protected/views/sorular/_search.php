<?php
/* @var $this SorularController */
/* @var $model Sorular */
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
		<?php echo $form->label($model,'soru'); ?>
		<?php echo $form->textField($model,'soru',array('size'=>60,'maxlength'=>3800)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'soru_tipi'); ?>
		<?php echo $form->textField($model,'soru_tipi'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'oncelik'); ?>
		<?php echo $form->textField($model,'oncelik'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'sinav_id'); ?>
		<?php echo $form->textField($model,'sinav_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'puan'); ?>
		<?php echo $form->textField($model,'puan',array('size'=>18,'maxlength'=>18)); ?>
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
		<?php echo $form->label($model,'question_total'); ?>
		<?php echo $form->textField($model,'question_total',array('size'=>18,'maxlength'=>18)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'check_total'); ?>
		<?php echo $form->textField($model,'check_total'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ust_metin'); ?>
		<?php echo $form->textField($model,'ust_metin',array('size'=>60,'maxlength'=>1500)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'alt_metin'); ?>
		<?php echo $form->textField($model,'alt_metin',array('size'=>60,'maxlength'=>1500)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'question_text_eng'); ?>
		<?php echo $form->textField($model,'question_text_eng',array('size'=>60,'maxlength'=>1800)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'help_image'); ?>
		<?php echo $form->textField($model,'help_image',array('size'=>60,'maxlength'=>550)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->