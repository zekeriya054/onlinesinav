<?php
/* @var $this SinavlarController */
/* @var $data Sinavlar */
?>

<div class="view">
	<b><?php echo CHtml::encode($data->getAttributeLabel('sinav_adi')); ?>:</b>
        <?php $sql='select count(*) as n from sorular where sinav_id='.$sinav[$index]['sinav_id'];
              $s=Yii::app()->db->createCommand($sql)->queryAll();
              $soruSayisi=$s[0]['n'];

        ?>

        <?php /*
          $sql="select durum from kullanici_sinavlari where kullanici_sinavlari.gorev_id=".$sinav[$index]['gorev_id'].
                  " and kullanici_sinavlari.kullanici_id=".$sinav[$index]['kullanici_id'];
          $s=Yii::app()->db->createCommand($sql)->queryAll();
          $d=$s[0]['durum'];*/
          if($sinav[$index]['baslama_tarihi']<=date('Y-m-d H:i') and $sinav[$index]['bitis_tarihi']>=date('Y-m-d H:i')) $d2=0;
          else $d2=1;
          $sql="select sinav_adi,acilis_mesaji_g from sinavlar where id=".$sinav[$index]['sinav_id'];
          $s=Yii::app()->db->createCommand($sql)->queryAll();
          $sinavAdi=$s[0]['sinav_adi'];
          $a_mesaj=$s[0]['acilis_mesaji_g'];
          if($d2==0) {
              if($a_mesaj!=1)
                echo '<a class="badge badge-warning" href="'.$this->createUrl('sinavlar/sinavbasla',array('id'=>$sinav[$index]['sinav_id'])).'">'.$sinavAdi.'-Sınava Başla</a>';
              else
                  if($d==0)
                  echo '<a class="badge badge-warning" href="'.$this->createUrl('sinavlar/sinavbasla2',array('id'=>$sinav[$index]['sinav_id'])).'">'.$sinavAdi.'-Sınava Başla</a>';
                  else echo '<a class="badge badge-warning" href="'.$this->createUrl('sinavlar/sinavbasla',array('id'=>$sinav[$index]['sinav_id'])).'">'.$sinavAdi.'-Sınava Başla</a>';
          }
          else echo '<span class="badge badge-danger" href="#">'.$sinavAdi.'-Sınav Pasif</span>';
        ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('sinav_tanimi')); ?>:</b>
	<?php echo CHtml::encode($data->sinav_tanimi); ?>
	<br />

        <b><?php echo CHtml::encode(Gorevler::model()->getAttributeLabel('baslama_tarihi')); ?>:</b>
	<?php echo CHtml::encode(strftime("%d.%m.%Y %H:%M",strtotime($sinav[$index]['baslama_tarihi'])));//CHtml::encode($data->ekleme_tarihi); ?>
	<br />
        <b><?php echo CHtml::encode(Gorevler::model()->getAttributeLabel('bitis_tarihi')); ?>:</b>
	<?php echo CHtml::encode(strftime("%d.%m.%Y %H:%M",strtotime($sinav[$index]['bitis_tarihi'])));//CHtml::encode($data->ekleme_tarihi); ?>
        <br />
        <b><?php echo 'Soru Sayısı' ?>:</b>
	<?php echo CHtml::encode($soruSayisi);//CHtml::encode($data->ekleme_tarihi); ?>
        <br />
        <b><?php echo CHtml::encode(Gorevler::model()->getAttributeLabel('sinav_suresi')); ?>:</b>
	<?php echo CHtml::encode($sinav[$index]['sinav_suresi']. ' dakika');//CHtml::encode($data->ekleme_tarihi); ?>
        <br />
        <b><?php echo CHtml::encode(Gorevler::model()->getAttributeLabel('basari_puani')); ?>:</b>
	<?php echo CHtml::encode($sinav[$index]['basari_puani']);//CHtml::encode($data->ekleme_tarihi); ?>
        <br />
	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('acilis_mesaji')); ?>:</b>
	<?php echo CHtml::encode($data->acilis_mesaji); ?>
	<br />

	*/ ?>

</div>
