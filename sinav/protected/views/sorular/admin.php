<?php
/* @var $this SorularController */
/* @var $model Sorular */

$this->breadcrumbs=array(
	'Sorulars'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Sorular', 'url'=>array('index')),
	array('label'=>'Create Sorular', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#sorular-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Soruları Yönet</h1>

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
 <div class="span7">  
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'sorular-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		//'id',
		array('name'=>'soru','value'=>'strip_tags($data[soru])'),
		//'soru_tipi',
		//'oncelik',
		//'sinav_id',
		'puan',
		/*
		'ekleme_tarihi',
		'parent_id',
		'question_total',
		'check_total',
		'ust_metin',
		'alt_metin',
		'question_text_eng',
		'help_image',
		
		array(
			'class'=>'CButtonColumn','template' => '{Yukarı}{Aşağı}{update}{delete}','header' => 'İşlem',
                        'buttons'=>array('Yukarı'=>array('label'=>'<i class="icon-chevron-up"></i>','options'=>array('style'=>'padding:0 5px 0 0;','title'=>'Yukarı Taşı'),'url'=>'CHtml::normalizeUrl(array("sorular/admin&s_id=".$data->id))'),
                                         'Aşağı'=>array('label'=>'<i class="icon-chevron-down"></i>','options'=>array('style'=>'padding:0 5px 0 0;','title'=>'Aşağı Taşı'),'url'=>'CHtml::normalizeUrl(array("sorular/admin&s_id=".$data->id))'))
		),*/
            		array(
			'class'=>'CButtonColumn','template' => '{update}{delete}','header' => 'İşlem',
                        
		),
	),'htmlOptions'=>array('class'=>'table table-bordered table-hover')
)); ?>
<?php $link="index.php?r=sorular/create&s_id=$_GET[s_id]";?>
<a class="btn btn-primary btn-lg active" href="<?php echo $link; ?>" role="button">Yeni Soru</a>
 </div>
</div>