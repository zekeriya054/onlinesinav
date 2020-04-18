<div class="row-fluid">
<h1>Sınav Bilgileri</h1>
</div>
<div class="row-fluid">
    <hr>
<div class="view">
    <table style="border: 0px">
        <tr>
        <td><b>Kategori:</b></td><td><?php echo $kat[0]['kat_adi'];?></td>
        </tr>
        <tr>
        <td><b>Sınav:</b></td><td><?php echo $sinav[0]['sinav_adi'];?></td>
        </tr>
        <tr>
        <td><b>Sınav Süresi:</b></td><td><?php echo $sinav[0]['sinav_suresi'];?></td>
        </tr>       
        <tr>
        <td><b>Başarı Puanı:</b></td><td><?php echo $sinav[0]['basari_puani'];?></td>
        </tr>  
        <tr>
            <td><b>Başlama Tarihi:</b></td><td><?php echo strftime("%d.%m.%Y %H:%M", strtotime($sinav[0]['baslama_tarihi']));?></td>
        </tr>  
        <tr>
            <td><b>Bitiş Tarihi:</b></td><td><?php echo strftime("%d.%m.%Y %H:%M", strtotime($sinav[0]['bitis_tarihi']));?></td>
        </tr>        
    </table>
</div>
</div>
<hr>
<?php $snv=$sinav[0]["sinav_id"];

// print_r($s);
?>
<div class="row-fluid">
    <div class="span6">
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'gorevler-grid',
	'dataProvider'=>$gorev,
	'columns'=>array(
            'KullaniciAdi','Ad','Soyad',
            array('name'=>'Başarı','value'=>array($this,'BasariHesapla')),
            array('name'=>'Dogru','value'=>array($this,'DogruCevap')),
            array('name'=>'Yanlış','value'=>array($this,'YanlisCevap')),
            array('name'=>'Süre','value'=>array($this,'SureHesapla')),
           // array('class'=>'CButtonColumn','template'=>'{Basari}','header'=>'','buttons'=>array(
           //    'Basari'=>array('label'=>'Başarı','value'=>'kjk') 
           // )),
           // array('name'=>'Durum','value'=>array($this,'Durum')),
array('class'=>'CButtonColumn','template'=>'{Cevaplar}','header' => '','buttons' =>array(
                    'Cevaplar' => array( //the name {reply} must be same
                    'label' => 'Detaylar', // text label of the button
                    'url' =>'CHtml::normalizeUrl(array("sinavlar/cevapgoster","id"=>-1,"gorev_id"=>$data["gorev_id"],"kullanici"=>$data["KullaniciID"]))'
                  ),)),

            )
    

	,'htmlOptions'=>array('class'=>'table table-bordered table-hover')
)); ?>
    </div>
</div>