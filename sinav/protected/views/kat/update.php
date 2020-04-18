<?php
/* @var $this KatController */
/* @var $model Kategoriler */

$this->breadcrumbs=array(
	'Kategorilers'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Kategoriler', 'url'=>array('index')),
	array('label'=>'Create Kategoriler', 'url'=>array('create')),
	array('label'=>'View Kategoriler', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Kategoriler', 'url'=>array('admin')),
);
?>

<h1>Kategori Güncelleme <?php/* echo $model->id; */?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>