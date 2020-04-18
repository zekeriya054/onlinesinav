<?php
/* @var $this SorularController */
/* @var $model Sorular */

$this->breadcrumbs=array(
	'Sorulars'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Sorular', 'url'=>array('index')),
	array('label'=>'Create Sorular', 'url'=>array('create')),
	array('label'=>'Update Sorular', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Sorular', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Sorular', 'url'=>array('admin')),
);
?>

<h1>View Sorular #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'soru',
		'soru_tipi',
		'oncelik',
		'sinav_id',
		'puan',
		'ekleme_tarihi',
		'parent_id',
		'question_total',
		'check_total',
		'ust_metin',
		'alt_metin',
		'question_text_eng',
		'help_image',
	),
)); ?>
