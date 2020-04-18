<?php
/* @var $this KatController */
/* @var $model Kategoriler */

$this->breadcrumbs=array(
	'Kategorilers'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'Kategorileri Listele', 'url'=>array('index')),
	array('label'=>'Kategorileri Yönet', 'url'=>array('admin')),
);
?>

<h1>Yeni Kategori</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>