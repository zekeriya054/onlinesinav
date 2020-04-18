<?php
/* @var $this SinavlarController */
/* @var $model Sinavlar */

$this->breadcrumbs=array(
	'Sinavlars'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Sinavlar', 'url'=>array('index')),
	array('label'=>'Create Sinavlar', 'url'=>array('create')),
	array('label'=>'Update Sinavlar', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Sinavlar', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Sinavlar', 'url'=>array('admin')),
);
?>

<h1>View Sinavlar #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'kat_id',
		'sinav_adi',
		'sinav_tanimi',
		'ekleme_tarihi',
		'parent_id',
		'acilis_mesaji_g',
		'acilis_mesaji',
	),
)); ?>
