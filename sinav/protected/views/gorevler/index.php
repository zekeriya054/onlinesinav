<?php
/* @var $this GorevlerController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Gorevlers',
);

$this->menu=array(
	array('label'=>'Create Gorevler', 'url'=>array('create')),
	array('label'=>'Manage Gorevler', 'url'=>array('admin')),
);
?>

<h1>Gorevlers</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
