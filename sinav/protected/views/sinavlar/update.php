<?php
/* @var $this SinavlarController */
/* @var $model Sinavlar */

$this->breadcrumbs=array(
	'Sinavlars'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Sinavlar', 'url'=>array('index')),
	array('label'=>'Create Sinavlar', 'url'=>array('create')),
	array('label'=>'View Sinavlar', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Sinavlar', 'url'=>array('admin')),
);
?>

<h1>Sınavı Güncelle <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model,'kategori'=>$kategori)); ?>