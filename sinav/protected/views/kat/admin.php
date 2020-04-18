<?php
/* @var $this KatController */
/* @var $model Kategoriler */

$this->breadcrumbs=array(
	'Kategorilers'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'Kategorileri Listele', 'url'=>array('index')),
	array('label'=>'Kategorileri Yönet', 'url'=>array('create')),
);
Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#kategoriler-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>
<div class="row-fluid">
<h1>Kategori Yönetimi</h1>
</div>
<p>
Seçimlik olarak belirtilen (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
veya <b>=</b>) operatörleri kullanarak arama yapabilirsiniz.
</p>
<div class="row-fluid">
<?php echo CHtml::link('Gelişmiş Arama','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->
</div>
<div class="row-fluid">
   <div class="span6">
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'kategoriler-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		//'id',
		'kat_adi',
		array(
			'class'=>'CButtonColumn','template' => '{update}{delete}','header' => 'İşlem','deleteConfirmation'=>"Silmek istediğinize emin misiniz?",
		),
	),'htmlOptions'=>array('class'=>'table table-bordered table-hover')
)); ?>
<a class="btn btn-primary btn-lg active" href="index.php?r=kat/create" role="button">Yeni Kategori</a>      
</div>
</div>
 