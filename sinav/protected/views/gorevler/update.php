<?php
/* @var $this GorevlerController */
/* @var $model Gorevler */

$this->breadcrumbs=array(
	'Gorevlers'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Gorevler', 'url'=>array('index')),
	array('label'=>'Create Gorevler', 'url'=>array('create')),
	array('label'=>'View Gorevler', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Gorevler', 'url'=>array('admin')),
);
?>

<h1>Atanmış Sınavları Düzenleme</h1>

<?php $this->renderPartial('_form',array('model'=>$model,'kategori'=>$kategori,'katmodel'=>$katmodel,'sinavmodel'=>$sinavmodel,'kulmodel'=>$kulmodel,'kul'=>$kul,'sinavlar'=>$sinavlar)); ?>