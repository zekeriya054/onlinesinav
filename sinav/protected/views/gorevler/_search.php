<?php
/* @var $this GorevlerController */
/* @var $model Gorevler */
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
		<?php echo $form->label($model,'sinav_id'); ?>
		<?php echo $form->textField($model,'sinav_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'baslama_tarihi'); ?>
		<?php echo $form->textField($model,'baslama_tarihi'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'sinav_suresi'); ?>
		<?php echo $form->textField($model,'sinav_suresi'); ?>
	</div>


	<div class="row">
		<?php echo $form->label($model,'basari_puani'); ?>
		<?php echo $form->textField($model,'basari_puani',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'bitis_tarihi'); ?>
		<?php echo $form->textField($model,'bitis_tarihi'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->