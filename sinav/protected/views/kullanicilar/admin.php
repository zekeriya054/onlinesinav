<?php
/* @var $this KullanicilarController */
/* @var $model Kullanicilar */

$this->breadcrumbs=array(
	'Kullanicilars'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Kullanicilar', 'url'=>array('index')),
	array('label'=>'Create Kullanicilar', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#kullanicilar-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Kullanıcı Yönetimi</h1>

<p>
Seçimlik olarak belirtilen (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
veya <b>=</b>) operatörleri kullanarak arama yapabilirsiniz.
</p>

<?php echo CHtml::link('Gelişmiş Arama','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->
<div class="row-fluid">
    <div class="span10">
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'kullanicilar-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		//'KullaniciID',
		'KullaniciAdi',
		//'Sifre',
		'Ad',
		'Soyad',
		//'EklemeTarihi',
                array('name'=>'EklemeTarihi','value'=>'strftime("%d.%m.%Y %H:%M", strtotime($data->EklemeTarihi))'),
		array('name'=>'KullaniciTipi','value'=>'($data->KullaniciTipi==1) ? "admin":"user"'),
		'eposta',
		
		array(
			'class'=>'CButtonColumn','template'=>'{update}{delete}','deleteConfirmation'=>"Silmek istediğinize emin misiniz?",'htmlOptions' => array('width' => 40),
		),
	),'htmlOptions'=>array('class'=>'table table-bordered table-hover')
)); ?>
     <a class="btn btn-primary btn-lg active" href="index.php?r=kullanicilar/create" role="button">Yeni Kullanıcı</a>
</div>
</div>
