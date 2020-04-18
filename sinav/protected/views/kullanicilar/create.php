<?php
/* @var $this KullanicilarController */
/* @var $model Kullanicilar */

$this->breadcrumbs=array(
	'Kullanicilars'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Kullanicilar', 'url'=>array('index')),
	array('label'=>'Manage Kullanicilar', 'url'=>array('admin')),
);
?>

<h1>Yeni Kullanıcı</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>