<?php
/* @var $this SorularController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Sorulars',
);

$this->menu=array(
	array('label'=>'Create Sorular', 'url'=>array('create')),
	array('label'=>'Manage Sorular', 'url'=>array('admin')),
);
?>

<h1>Sorulars</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
