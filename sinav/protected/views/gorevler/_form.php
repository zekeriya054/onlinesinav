<?php
/* @var $this GorevlerController */
/* @var $model Gorevler */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'gorevler-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>
	<div class="row">
		<?php echo $form->labelEx($katmodel,'kat_adi'); ?>
		<?php echo $form->dropDownList($katmodel,'id',$kategori,array( 'empty' => 'Kategori Seçiniz ',
                    'ajax'=>array(
                        'type'=>'POST',
                        'url'=>CController::createUrl('gorevler/sinavlar'),
                        'update'=>'#Sinavlar_id',
                        'data'=>array('kat_id'=>'js:this.value'),

                    )));  //echo $model->sinav_id;exit();
         ?>
		<?php echo $form->error($katmodel,'kat_id'); ?>
	</div>

        <div class="row">
		<?php echo $form->labelEx($sinavmodel,'sinav_adi'); ?>
		<?php  
                    if($model->isNewRecord) echo $form->dropDownList($model,'sinav_id', array('empty'=>'Sınav Seçiniz'),array('id'=>'Sinavlar_id')); 
                    else {
                        echo $form->dropDownList($model,'sinav_id',$sinavlar,array('id'=>'Sinavlar_id'));

                    }

                ?>
	        <?php echo $form->error($model,'sinav_id'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'baslama_tarihi'); ?>
		<?php $this->widget('zii.widgets.jui.CJuiDatePicker',array(
                'model'=>$model,
                'attribute' => 'baslama_tarihi',
                'name'=>'baslamaTarihi',
                
                // additional javascript options for the date picker plugin
                'options'=>array(
                    'dateFormat'=>'dd.mm.yy',
                    //'altFormat' => 'dd.mm.yy',
                'showAnim'=>'fold',
                 ),'htmlOptions'=>array('style'=>'height:20px;'),));
                ?>
		<?php echo $form->error($model,'baslama_tarihi'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'bitis_tarihi'); ?>
		<?php $this->widget('zii.widgets.jui.CJuiDatePicker',array(
                'model'=>$model,
                'attribute' => 'bitis_tarihi',
                'name'=>'bitisTarihi',
                
                // additional javascript options for the date picker plugin
                'options'=>array(
                    'dateFormat'=>'dd.mm.yy',
                    //'altFormat' => 'dd.mm.yy',
                'showAnim'=>'fold',
                 ),'htmlOptions'=>array('style'=>'height:20px;'),));
                ?>
		<?php echo $form->error($model,'bitis_tarihi'); ?>
            <?php

            ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'sinav_suresi'); ?>
		<?php echo $form->textField($model,'sinav_suresi'); ?>
		<?php echo $form->error($model,'sinav_suresi'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'basari_puani'); ?>
		<?php echo $form->textField($model,'basari_puani',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'basari_puani'); ?>
	</div>


        <div class="row">
            <hr>
            
        </div>
 </div>
<div class="row-fluid">
    <div class="span6">

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'kullanicilar-grid2',
   
	'dataProvider'=>$kulmodel->search(),
	'filter'=>$kulmodel,
           'pager'=>array(
            'class'=>'CLinkPager',
            'nextPageLabel'=>'Sonraki',
            'prevPageLabel'=>'Önceki',
            'header'=>'',
        ),
        'enablePagination'=>true, 
	'columns'=>array(
		//'KullaniciID',
               array(
                'id'=>'users',
                'class'=>'CCheckBoxColumn',
                'selectableRows' => $kulmodel->search()->getTotalItemCount(), 
                   'checked'=>$model->isNewRecord ?' ': '(Yii::app()->db->createCommand("select id from kullanici_gorevleri where gorev_id=$_GET[id] and kullanici_id=$data->KullaniciID")->query()->rowCount)?(1):(0)'
              ),
		'KullaniciAdi',
		//'Sifre',
		'Ad',
		'Soyad',
		//'EklemeTarihi',
		//'KullaniciTipi',
		//'eposta',

	),'htmlOptions'=>array('class'=>'table table-bordered table-hover'),

   
)); ?>


    </div>
</div>
	<div class="row buttons">
	        <?php echo CHtml::submitButton($model->isNewRecord ? 'Kaydet' : 'Kaydet',array('class'=>'btn btn-primary')); ?>
                <?php echo CHtml::link('İptal',array('gorevler/admin'),array('class'=>'btn btn-primary')); ?>
	</div>
<?php $this->endWidget(); ?>