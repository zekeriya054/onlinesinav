<?php
/* @var $this GorevlerController */
/* @var $model Gorevler */

$this->breadcrumbs=array(
	'Gorevlers'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Gorevler', 'url'=>array('index')),
	array('label'=>'Create Gorevler', 'url'=>array('create')),
	array('label'=>'Update Gorevler', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Gorevler', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Gorevler', 'url'=>array('admin')),
);
?>

<h1>View Gorevler #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'sinav_id',
		//'sonuc_modu',
		'baslama_tarihi',
		'sinav_suresi',
		//'sonuclari_goster',
		'basari_puani',
		//'sinav_tipi',
		//'durum',
		'bitis_tarihi',
	),
)); ?>
