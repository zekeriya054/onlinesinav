<?php
/* @var $this SinavlarController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Sınavlar',
);

$this->menu=array(
	array('label'=>'Create Sinavlar', 'url'=>array('create')),
	array('label'=>'Manage Sinavlar', 'url'=>array('admin')),
);
?>

<div class="row-fluid">
    <div class="span8">
        <h1>
            Testler
        </h1>
<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
        'viewData'=>array('sinav'=>$sinav,'islem'=>$islem),

)); 
//print_r($sinav);
?>
</div>
</div>