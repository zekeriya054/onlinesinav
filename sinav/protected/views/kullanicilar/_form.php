<script>
    $(document).ready(function(){
    
        $('#onay').change(function(){
           if($('#onay').is(':checked')) { 
           $('#sifre').attr('readonly', false);
           $('#sifre').val('');
       } else {
         $('#sifre').attr('readonly', true);  
         $('#sifre').val('*********************************');
       }
        });
    });
</script>
<?php
/* @var $this KullanicilarController */
/* @var $model Kullanicilar */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'kullanicilar-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'KullaniciAdi'); ?>
		<?php echo $form->textField($model,'KullaniciAdi',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'KullaniciAdi'); ?>
	</div>

	<div class="row">
                <?php echo $form->labelEx($model,'Sifre'); ?>
                <?php 
                    echo $form->passwordField($model,'Sifre',array('size'=>50,'maxlength'=>50,'id'=>'sifre'));
                    if(!$model->isNewRecord) {
                      echo $form->error($model,'Sifre');  
                      echo CHtml::checkbox('onay',false,array('id'=>'onay','style'=>'margin-left:5px'));
                      echo'<script>$("#sifre").attr("readonly", true);</script>';
                    }
                    else echo'<script>$("#sifre").attr("readonly", false);</script>';
                    
                ?>
                <? ?>
                <?php ?>
           
	</div>
 
	<div class="row">
		<?php echo $form->labelEx($model,'Ad'); ?>
		<?php echo $form->textField($model,'Ad',array('size'=>60,'maxlength'=>150)); ?>
		<?php echo $form->error($model,'Ad'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Soyad'); ?>
		<?php echo $form->textField($model,'Soyad',array('size'=>60,'maxlength'=>150)); ?>
		<?php echo $form->error($model,'Soyad'); ?>
	</div>

    	<div class="row">
            
	<div class="row">
		<?php echo $form->labelEx($model,'KullaniciTipi'); ?>
		<?php echo $form->dropDownList($model,'KullaniciTipi',array('1'=>'admin','2'=>'user'));?>
		<?php echo $form->error($model,'KullaniciTipi'); ?>
	</div>            
	<?php echo $form->labelEx($model,'cinsiyet'); ?>
		<?php echo $form->dropDownList($model,'cinsiyet',array('1'=>'Erkek','2'=>'Kadın'));?>
		<?php echo $form->error($model,'cinsiyet'); ?>
	</div>

    	<div class="row">
		<?php echo $form->labelEx($model,'sinif'); ?>
		<?php echo $form->textField($model,'sinif',array('size'=>60,'maxlength'=>5)); ?>
		<?php echo $form->error($model,'sinif'); ?>
	</div>

    	<div class="row">
		<?php echo $form->labelEx($model,'sube'); ?>
		<?php echo $form->textField($model,'sube',array('size'=>60,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'sube'); ?>
	</div>


	<div class="row">
		<?php echo $form->labelEx($model,'eposta'); ?>
		<?php echo $form->textField($model,'eposta',array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'eposta'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Kaydet' : 'Kaydet'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->