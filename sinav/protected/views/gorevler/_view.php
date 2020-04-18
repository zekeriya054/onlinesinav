<?php
/* @var $this GorevlerController */
/* @var $data Gorevler */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('sinav_id')); ?>:</b>
	<?php echo CHtml::encode($data->sinav_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('baslama_tarihi')); ?>:</b>
	<?php echo CHtml::encode($data->baslama_tarihi); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('sinav_suresi')); ?>:</b>
	<?php echo CHtml::encode($data->sinav_suresi); ?>
	<br />
        
	<b><?php echo CHtml::encode($data->getAttributeLabel('basari_puani')); ?>:</b>
	<?php echo CHtml::encode($data->basari_puani); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('sinav_tipi')); ?>:</b>
	<?php echo CHtml::encode($data->sinav_tipi); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('durum')); ?>:</b>
	<?php echo CHtml::encode($data->durum); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('bitis_tarihi')); ?>:</b>
	<?php echo CHtml::encode($data->bitis_tarihi); ?>
	<br />

	*/ ?>

</div>