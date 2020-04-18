<?php
/* @var $this KullanicilarController */
/* @var $data Kullanicilar */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('KullaniciID')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->KullaniciID), array('view', 'id'=>$data->KullaniciID)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('KullaniciAdi')); ?>:</b>
	<?php echo CHtml::encode($data->KullaniciAdi); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Sifre')); ?>:</b>
	<?php echo CHtml::encode($data->Sifre); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Ad')); ?>:</b>
	<?php echo CHtml::encode($data->Ad); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Soyad')); ?>:</b>
	<?php echo CHtml::encode($data->Soyad); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('EklemeTarihi')); ?>:</b>
	<?php echo CHtml::encode($data->EklemeTarihi); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('KullaniciTipi')); ?>:</b>
	<?php echo CHtml::encode($data->KullaniciTipi); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('eposta')); ?>:</b>
	<?php echo CHtml::encode($data->eposta); ?>
	<br />

	*/ ?>

</div>