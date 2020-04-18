<?php
/* @var $this SinavlarController */
/* @var $model Sinavlar */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'sinavlar-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'kat_id'); ?>
		<?php echo $form->dropDownList($model,'kat_id',$kategori);//echo $form->textField($model,'kat_id'); ?>
		<?php echo $form->error($model,'kat_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'sinav_adi'); ?>
		<?php echo $form->textField($model,'sinav_adi',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'sinav_adi'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'sinav_tanimi'); ?>
		<?php echo $form->textField($model,'sinav_tanimi',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'sinav_tanimi'); ?>
	</div>
        
	<div class="row">
       
        	<?php echo $form->labelEx($model,'acilis_mesaji_g',array('class'=>'span3')); ?>
                <?php echo $form->checkBox($model,'acilis_mesaji_g', array('checked'=>($model->acilis_mesaji_g)? 'checked':''),array('label'=>'deneme')); ?>
		<?php echo $form->error($model,'acilis_mesaji_g'); ?>
	</div>
   
	<div class="row">
         
		<?php echo $form->labelEx($model,'acilis_mesaji'); ?>
		<?php   $this->widget('application.extensions.ckeditor.CKEditor', array('model'=>$model, 
    'attribute'=>'acilis_mesaji',
    'language'=>'english',
    'editorTemplate'=>'full',
    ));?><?php //echo $form->textField($model,'acilis_mesaji',array('size'=>60,'maxlength'=>3850)); ?>
		<?php echo $form->error($model,'acilis_mesaji'); ?>
   
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Kaydet' : 'Kaydet'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->