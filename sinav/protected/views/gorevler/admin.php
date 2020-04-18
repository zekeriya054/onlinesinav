<?php
/* @var $this GorevlerController */
/* @var $model Gorevler */

$this->breadcrumbs=array(
	'Gorevlers'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Gorevler', 'url'=>array('index')),
	array('label'=>'Create Gorevler', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#gorevler-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>
<div class="row-fluid">
<h1>Sınav Atama İşlemleri</h1>
</div>
<p>
Seçimlik olarak belirtilen (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
veya <b>=</b>) operatörleri kullanarak arama yapabilirsiniz.
</p>
<div class="row-fluid">
<?php echo CHtml::link('Gelişmiş Arama','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->
</div>
<div class="row-fluid">
    <div class="span7">
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'gorevler-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		//'id',
		array('name'=>'sinav_id','value'=>'Sinavlar::model()->findByPk($data->sinav_id)->sinav_adi'),
		//'sonuc_modu',
		array('name'=>'baslama_tarihi','value'=>'strftime("%d.%m.%Y %H:%M", strtotime($data->baslama_tarihi))'),
                'bitis_tarihi',
		//'sinav_suresi',
		//'sonuclari_goster',
		//'basari_puani',
		//'sinav_tipi',
		//'durum',
             array('class'=>'CButtonColumn','template'=>'{Bilgi}','header' => 'Bilgi','buttons' => array(
               'Bilgi' => array( //the name {reply} must be same
                 'label' => 'Bilgi', // text label of the button
                 'url' =>'CHtml::normalizeUrl(array("gorevler/bilgi&id=".$data->id))'
                   ),
               
               )),
		

		array(
			'class'=>'CButtonColumn','template' => '{update}{delete}','header' => 'İşlem','deleteConfirmation'=>"Silmek istediğinize emin misiniz?",
		),
	),'htmlOptions'=>array('class'=>'table table-bordered table-hover')
)); ?>
        <a class="btn btn-primary btn-lg active" href="index.php?r=gorevler/create" role="button">Yeni Sınav Atama</a>   
    </div>
</div>