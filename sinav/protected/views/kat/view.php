<?php
/* @var $this KatController */
/* @var $model Kategoriler */

$this->breadcrumbs=array(
	'Kategorilers'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Kategoriler', 'url'=>array('index')),
	array('label'=>'Create Kategoriler', 'url'=>array('create')),
	array('label'=>'Update Kategoriler', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Kategoriler', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Kategoriler', 'url'=>array('admin')),
);
?>
<div class="row-fluid">
<h1>Kategori #<?php echo $model->id; ?></h1>
</div>
<div class="row-fluid">
    <div class="span6">
<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'kat_adi',
	),'htmlOptions'=>array('class'=>'table table-bordered table-hover')
)); ?>
    </div>
</div>