<?php
/* @var $this SorularController */
/* @var $model Sorular */

$this->breadcrumbs=array(
	'Sorulars'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Sorular', 'url'=>array('index')),
	array('label'=>'Create Sorular', 'url'=>array('create')),
	array('label'=>'View Sorular', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Sorular', 'url'=>array('admin')),
);
?>

<h1>Soru Güncelle <?php echo $model->id; ?></h1>
<?php $this->renderPartial('_form', array('model'=>$model,'soruTipi'=>$soruTipi,'cmodel'=>$cmodel)); ?>