<?php
/* @var $this SinavlarController */
/* @var $model Sinavlar */
$this->breadcrumbs=array(
	'Sinavlars'=>array('index'),
	'Manage',
);
$this->menu=array(
	array('label'=>'List Sinavlar', 'url'=>array('index')),
	array('label'=>'Create Sinavlar', 'url'=>array('create')),
);
Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#sinavlar-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>
<div class="row-fluid">
<h1>Sınavları Yönet</h1>
</div>
<p>
Seçimlik olarak belirtilen (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
veya <b>=</b>) operatörleri kullanarak arama yapabilirsiniz.
</p>
<div class="row-fluid">
<?php echo CHtml::link('Gelişmiş Arama','#',array('class'=>'search-button')); ?>
</div>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); 
?>
</div><!-- search-form -->
<div class="row-fluid">
 <div class="span9">
 <?php $this->widget('zii.widgets.grid.CGridView', array('itemsCssClass' => 'grid1',
	'id'=>'sinavlar-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		//'id',
		
		'sinav_adi',
		'sinav_tanimi',
		'ekleme_tarihi',
                array('class'=>'CButtonColumn','template'=>'{Sorular}','header' => 'Sorular','buttons' => array(
               'Sorular' => array( //the name {reply} must be same
                 'label' => 'Sorular', // text label of the button
                 'url' =>'CHtml::normalizeUrl(array("sorular/admin&s_id=".$data->id))'
                   ),
               
               )),

     
		//'parent_id',
		/*
		'acilis_mesaji_g',
		'acilis_mesaji',
		*/
		array(
			'class'=>'CButtonColumn','template' => '{update}{delete}','header' => 'İşlem','deleteConfirmation'=>"Silmek istediğinize emin misiniz?",
		),
		
            
	),'htmlOptions'=>array('class'=>'table table-bordered table-hover')
)); ?>
     <a class="btn btn-primary btn-lg active" href="index.php?r=sinavlar/create" role="button">Yeni Sınav</a>
</div>
</div>
