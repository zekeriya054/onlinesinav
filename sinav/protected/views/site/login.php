<?php
/* @var $this SiteController 
/* @var $model LoginForm */
/* @var $form CActiveForm  */
/*
$this->pageTitle=Yii::app()->name . ' - Login';
$this->breadcrumbs=array(
	'Login',
);*/
?>


<div class="giris_frm">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'login-form',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
)); ?>

    <ul>
        <li><?php echo $form->labelEx($model,'username'); ?> </li>
        <li><?php echo $form->textField($model,'username',array('size'=>'30')); ?></li>
        <li class="hata"><?php echo $form->error($model,'username'); ?>   </li>	
        <li class="bosluk"><?php echo $form->labelEx($model,'password'); ?> </li>
        <li><?php echo $form->passwordField($model,'password',array('size'=>'30')); ?></li>
        <li class="hata"><?php echo $form->error($model,'password'); ?>  </li>
        <li><?php echo $form->checkBox($model,'rememberMe'); ?>
        <?php echo $form->label($model,'rememberMe'); ?></li>
        <li class="hata"><?php echo $form->error($model,'rememberMe'); ?> </li>
        <li class="bosluk"><?php echo CHtml::submitButton('Giriş İçin Tıklayınız',array('class'=>'btn')); ?>  </li>
    </ul>
<?php $this->endWidget(); ?>
</div><!-- form -->
