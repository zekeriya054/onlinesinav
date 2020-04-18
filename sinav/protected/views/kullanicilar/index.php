<?php
/* @var $this KullanicilarController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Kullanicilars',
);

$this->menu=array(
	array('label'=>'Yeni Kullanıcı', 'url'=>array('create')),
	array('label'=>'Kullanıcıları Yönet', 'url'=>array('admin')),
);
?>

<h1>Kullanıcılar</h1>
<div class="span6">
<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
    
</div>