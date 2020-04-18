<?php
/* @var $this SorularController */
/* @var $model Sorular */

$this->breadcrumbs=array(
	'Sorulars'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Sorular', 'url'=>array('index')),
	array('label'=>'Manage Sorular', 'url'=>array('admin')),
);
?>

<h1>Yeni Soru</h1>

<?php $this->renderPartial('_form', array('model'=>$model,'soruTipi'=>$soruTipi,'cmodel'=>$cmodel)); ?>