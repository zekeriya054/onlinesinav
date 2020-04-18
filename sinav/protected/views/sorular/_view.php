<?php
/* @var $this SorularController */
/* @var $data Sorular */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('soru')); ?>:</b>
	<?php echo CHtml::encode($data->soru); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('soru_tipi')); ?>:</b>
	<?php echo CHtml::encode($data->soru_tipi); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('oncelik')); ?>:</b>
	<?php echo CHtml::encode($data->oncelik); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('sinav_id')); ?>:</b>
	<?php echo CHtml::encode($data->sinav_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('puan')); ?>:</b>
	<?php echo CHtml::encode($data->puan); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ekleme_tarihi')); ?>:</b>
	<?php echo CHtml::encode($data->ekleme_tarihi); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('parent_id')); ?>:</b>
	<?php echo CHtml::encode($data->parent_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('question_total')); ?>:</b>
	<?php echo CHtml::encode($data->question_total); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('check_total')); ?>:</b>
	<?php echo CHtml::encode($data->check_total); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ust_metin')); ?>:</b>
	<?php echo CHtml::encode($data->ust_metin); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('alt_metin')); ?>:</b>
	<?php echo CHtml::encode($data->alt_metin); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('question_text_eng')); ?>:</b>
	<?php echo CHtml::encode($data->question_text_eng); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('help_image')); ?>:</b>
	<?php echo CHtml::encode($data->help_image); ?>
	<br />

	*/ ?>

</div>