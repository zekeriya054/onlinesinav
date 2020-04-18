<?php
/* @var $this SinavlarController */
/* @var $model Sinavlar */

$this->breadcrumbs=array(
	'Sinavlars'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Sinavlar', 'url'=>array('index')),
	array('label'=>'Manage Sinavlar', 'url'=>array('admin')),
);
?>

<h1>Yeni Sınav</h1>

<?php $this->renderPartial('_form', array('model'=>$model,'kategori'=>$kategori)); ?>