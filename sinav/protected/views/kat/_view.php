<?php
/* @var $this KatController */
/* @var $data Kategoriler */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('kat_adi')); ?>:</b>
	<?php echo CHtml::encode($data->kat_adi); ?>
	<br />


</div>