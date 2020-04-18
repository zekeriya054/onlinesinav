<?php
/* @var $this GorevlerController */
/* @var $model Gorevler */

$this->breadcrumbs=array(
	'Gorevlers'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Gorevler', 'url'=>array('index')),
	array('label'=>'Manage Gorevler', 'url'=>array('admin')),
);
?>

<h1>Yeni Sınav Atama</h1>

<?php $this->renderPartial('_form', array('model'=>$model,'kategori'=>$kategori,'katmodel'=>$katmodel,'sinavmodel'=>$sinavmodel,'kulmodel'=>$kulmodel,'kul'=>$kul)); ?>
