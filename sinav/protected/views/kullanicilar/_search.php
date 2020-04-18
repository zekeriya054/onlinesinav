<?php
/* @var $this KullanicilarController */
/* @var $model Kullanicilar */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'KullaniciID'); ?>
		<?php echo $form->textField($model,'KullaniciID'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'KullaniciAdi'); ?>
		<?php echo $form->textField($model,'KullaniciAdi',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Sifre'); ?>
		<?php echo $form->textField($model,'Sifre',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Ad'); ?>
		<?php echo $form->textField($model,'Ad',array('size'=>60,'maxlength'=>150)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Soyad'); ?>
		<?php echo $form->textField($model,'Soyad',array('size'=>60,'maxlength'=>150)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'EklemeTarihi'); ?>
		<?php echo $form->textField($model,'EklemeTarihi'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'KullaniciTipi'); ?>
		<?php echo $form->textField($model,'KullaniciTipi'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'eposta'); ?>
		<?php echo $form->textField($model,'eposta',array('size'=>60,'maxlength'=>200)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->