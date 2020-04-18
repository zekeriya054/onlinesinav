<?php
/* @var $this KullanicilarController */
/* @var $model Kullanicilar */

$this->breadcrumbs=array(
	'Kullanicilars'=>array('index'),
	$model->KullaniciID,
);

$this->menu=array(
	array('label'=>'Kullanıcıları Listele', 'url'=>array('index')),
	array('label'=>'Yeni Kullanıcı', 'url'=>array('create')),
	array('label'=>'Kullanıcı Güncelle', 'url'=>array('update', 'id'=>$model->KullaniciID)),
	array('label'=>'Kullanıcı Sil', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->KullaniciID),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Kullanıcıları Yönet', 'url'=>array('admin')),
);
?>

<h1>Kullanıcı #<?php echo $model->KullaniciID; ?></h1>
<div class="row-fluid">
    <div class="span6">
<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'KullaniciID',
		'KullaniciAdi',
		//'Sifre',
		'Ad',
		'Soyad',
		'EklemeTarihi',
		'KullaniciTipi',
		'eposta',
	),'htmlOptions'=>array('class'=>'table table-bordered table-hover')
)); ?>
</div>
         <div class="span2">
         <div class="sidebar-nav">
            
             <?php /*
                    $this->widget('zii.widgets.CMenu', array(
			'encodeLabel'=>false,
		        'items'=>$this->menu,
			));
   */
           ?>
         </div>
      </div>

</div>
