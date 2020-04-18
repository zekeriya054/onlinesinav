<?php
/* @var $this KullanicilarController */
/* @var $model Kullanicilar */

$this->breadcrumbs=array(
	'Kullanicilars'=>array('index'),
	$model->KullaniciID=>array('view','id'=>$model->KullaniciID),
	'Update',
);

$this->menu=array(
	array('label'=>'List Kullanicilar', 'url'=>array('index')),
	array('label'=>'Create Kullanicilar', 'url'=>array('create')),
	array('label'=>'View Kullanicilar', 'url'=>array('view', 'id'=>$model->KullaniciID)),
	array('label'=>'Manage Kullanicilar', 'url'=>array('admin')),
);
?>

<h1>Kullanıcı Güncelleme <?php echo $model->KullaniciID; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
