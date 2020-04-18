<?php
/* @var $this KatController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Kategorilers',
);

$this->menu=array(
	array('label'=>'Yeni Kategori', 'url'=>array('create')),
	array('label'=>'Kategorileri Yönet', 'url'=>array('admin')),
);
?>
<div class="row-fluid">
<h1>Kategoriler</h1>
</div>
<div class="row-fluid">
    <div class="span6">
     <?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?> 
     </div>
     <div class="span2">
         <div class="sidebar-nav">
             <?php
                    $this->widget('zii.widgets.CMenu', array(
			'encodeLabel'=>false,
		        'items'=>$this->menu,
			));
 
             ?>
         </div>
      </div>
    
   
         
</div>

