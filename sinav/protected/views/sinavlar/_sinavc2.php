<script>
$(document).ready(function() {
    //   $(".container-fluid").css("padding-top","0px");
    
     window.onbeforeunload = null;
     $("#preloader").hide();
 //    $('yw0').css('width','200');
  //   $('yw0').css('height','200');
  
 });

</script>
<div class="row-fluid scale">
    <div class="span-10">
         
<?php

for($k=0;$k<count($result);$k++) {
    $sql="select sinav_adi from sinavlar where id=".$result[$k]['sinav_id'];
    $snv=  Yii::app()->db->createCommand($sql)->queryAll();
    echo'<h3 class="snv_adi">Sınav : '.$snv[0]['sinav_adi'].'</h3>';
    $kat_id=$result[$k]['kat_id']; 
    $gorev1=$result[$k]['gorev_id'];

   // if(count($result)>1) {
        //$onceki_id=$result[1]['sinav_id'];
       $ss=$result[$k]['soru_sayisi'];
       $ds=$result[$k]['dogru_sayisi'];
       $ys=$result[$k]['yanlis_sayisi']; 
       $baslangic=$result[$k]['baslama_tarihi'];
       $bitis=$result[$k]['bitis_tarihi'];
       $sure= strtotime($bitis)-strtotime($baslangic);  
       if(($k+1)<count($result)) {
         $o_ss=$result[$k+1]['soru_sayisi'];
         $o_ds=$result[$k+1]['dogru_sayisi'];
         $o_ys=$result[$k+1]['yanlis_sayisi'];
    //   }
    } else $onceki_ss=-1;


?>

<div class="row-fluid sinav">
<div>
    <div class="span3">
        <h3> Verdiğin Cevaplar </h3>
<?php
   // $kullanici=Yii::app()->user->getState('KullaniciID');    
    $sql = "SELECT * FROM sorular where sinav_id=".$result[$k]['sinav_id'];
    $sorular=Yii::app()->db->createCommand($sql)->queryAll();
    //print_r($sorular);
    foreach ($sorular as $j=>$s) 
    {
        if($j%2==0) echo '<div class="row-fluid">';
        //echo'<div class="span6">';
        echo $s['ust_metin'].'<br><b>';
        echo ($j+1).'.'.$s['soru'].'</b>';
        echo $s['alt_metin'];
        $sql="select * from cevaplar where soru_id=".$s['id'];
        $cevaplar=Yii::app()->db->createCommand($sql)->queryAll();
        $sql='SELECT * FROM cevaplar where dogru_cevap=1 and soru_id='.$s['id'];
        $dcevap = Yii::app()->db->createCommand($sql)->queryAll(); 
       echo'<table class="table table-bordered">';
       foreach($cevaplar as $i=>$c) {
            $sql="SELECT * FROM kullanici_cevaplari where kullanici_id=".$kullanici." and cevap_id=".$c['id']." and soru_id=".$s['id'];
            $kcevap=Yii::app()->db->createCommand($sql)->queryAll(); 
            switch($s['soru_tipi']){
                case 0:
                    if(count($kcevap)>0) $checked='checked';else $checked='unchecked';
                    if($c['dogru_cevap']==1 && count($kcevap)>0){
                            $html='<input type="checkbox" disabled name="cevap" id="cevap'.$i.'" value="'.$c['id'].'" '.$checked.'>  Cevabınız Doğru';
                            $satir='<tr class="info"><td>';
                    }
                    else if($c['dogru_cevap']==1 && count($kcevap==0)) {
                           $html='<input type="checkbox" disabled name="cevap" id="cevap'.$i.'" value="'.$c['id'].'" '.$checked.'>  Doğru Cevap';
                           $satir='<tr class="success"><td class="text-right">';
                    }
                    else if($c['dogru_cevap']==0 && count($kcevap)>0) {
                         $html='<input type="checkbox" disabled name="cevap" id="cevap'.$i.'" value="'.$c['id'].'" '.$checked.'>  Cevabınız Yanlış';
                         $satir='<tr class="warning"><td>';
                    }
                    else {
                        $html='<input type="checkbox" disabled name="cevap" id="cevap'.$i.'" value="'.$c['id'].'" '.$checked.'>';
                        $satir='<tr><td>';
                    }
                        break; 
                        case 1:
                            if(count($kcevap)>0) $checked='checked';else $checked='unchecked';
                            if($c['dogru_cevap']==1 && count($kcevap)>0){
                                $html='<input type="radio" disabled name="cevap" id="cevap'.$i.'" value="'.$c['id'].'" '.$checked.'>  Cevabınız Doğru';
                                $satir='<tr class="info"><td>';
                            }
                            else if($c['dogru_cevap']==1 && count($kcevap==0)) {
                                $html='<input type="radio" disabled name="cevap" id="cevap'.$i.'" value="'.$c['id'].'" '.$checked.'>  Doğru Cevap';
                                $satir='<tr class="success"><td>';                               
                            }
                            else if($c['dogru_cevap']==0 && count($kcevap)>0) {
                                $html='<input type="radio" disabled name="cevap" id="cevap'.$i.'" value="'.$c['id'].'" '.$checked.'>  Cevabınız Yanlış';
                                $satir='<tr class="warning"><td>';                                   
                            }
                            else {
                                $html='<input type="radio" disabled name="cevap" id="cevap'.$i.'" value="'.$c['id'].'" '.$checked.'>';
                                $satir='<tr><td>';                                
                            }
                            break;
                            
                        case 2:
                            if(trim($c['dogru_cevap_metni'])==trim($kcevap[0]['cevap_metni'])) {
                                $html='<input type="text" disabled name="cevap" value="'.$kcevap[0]['cevap_metni'].'" id="cevap">'.'<input type="hidden" name="cevap_id" value="'.$c['id'].'">  Cevabınız Doğru';
                                $satir='<tr class="success"><td>'; 
                            } else 
                            {
                                $html='<input type="text" disabled name="cevap" value="'.$kcevap[0]['cevap_metni'].'" id="cevap">'.'<input type="hidden" name="cevap_id" value="'.$c['id'].'">  Doğru Cevap : '.$c['dogru_cevap_metni'];
                                $satir='<tr class="warning"><td>';
                            }
                            break;
                        case 3:
                            if(trim($c['dogru_cevap_metni'])==trim($kcevap[0]['cevap_metni'])) {
                                $html='<input type="text" disabled name="cevap" value="'.$kcevap[0]['cevap_metni'].'" id="cevap">'.'<input type="hidden" name="cevap_id" value="'.$c['id'].'">  Cevabınız Doğru';
                                $satir='<tr class="success"><td>';
                            }
                            else {
                                $html='<input type="text" disabled name="cevap" value="'.$kcevap[0]['cevap_metni'].'" id="cevap">'.'<input type="hidden" name="cevap_id" value="'.$c['id'].'">  Doğru Cevap : '.$c['dogru_cevap_metni'];
                                $satir='<tr class="warning"><td>';
                            }
                            break;
                    }
                    echo $satir.$c['cevap_metni'].'</td><td>'.$html.'</td></tr>';                 
    

                }

              echo'</table>';
              if($j%2) echo '</div>';

    }
    
?>
</div>
</div>
<?php
        $dakika= floor($sure/60);
        $saniye=$sure%60;
        if($ss>0) {
            echo'<div class="span5 basari">';
            echo '<h4>Başarı Düzeyin</h4>';
            echo "Toplam $ss sorunun $ds ini doğru cevapladın.<br><br>";
            echo 'Başarı Yüzdesi: % <strong class="yuzde">'.  number_format(($ds*100/$ss),2).'</strong><br><br>';   
        }
        
//if($k==0) {  
  $snc=array();
  $ktg=array();
 // print_r($result);
   for($x=count($result);$x>=$k;$x--) {
      // $sql="select sinav_adi from sinavlar where id=".$result[$x]['sinav_id'];
      // $snv=  Yii::app()->db->createCommand($sql)->queryAll();
    if($result[$x]) {
       $s=$result[$x]['soru_sayisi'];
       $d=$result[$x]['dogru_sayisi'];  
       $bas_yuz=$d/$s*100;
       $basari=round($bas_yuz,2);
       array_push($snc,$basari);
       array_push($ktg,count($result)-$x);
    }
    }
echo'<pre>';
$this->Widget('ext.highcharts.HighchartsWidget', array(
   'options'=>array(
       
      'title' => array('text' => 'Grafiksel Analiz'),
      'xAxis' => array(
         'categories' => $ktg
      ),
      'yAxis' => array(
         'title' => array('text' => 'Başarı Yüzdesi')
      ),
             'colors'=>array('#6AC36A', '#FFD148', '#0563FE', '#FF2F2F'),
      'gradient' => array('enabled'=> true),
      'credits' => array('enabled' => false),
      'exporting' => array('enabled' => false),
      'chart' => array(
        'plotBackgroundColor' => '#ffffff',
        'plotBorderWidth' => null,
        'plotShadow' => false,
        'height' => 400,
        'type'=>'column'
      ),
      'title' => false,

      'series' => array(
         array('name' => '', 'data' => $snc),
         //array('name' => 'John', 'data' => array(5, 7, 3))
      )
   )
));
echo'</pre>' ; 


//}
      echo 'Harcadığı süre:'.$dakika.' <strong class="s1">dakika</strong> '.$saniye.' <strong class="s1">saniye</strong><br>';
        $seviye=($ds*100)/$ss;
        if(($k+1)<count($result)) {
            $o_seviye=($o_ds*100)/$o_ss;
            echo'<h4>Son İki Teste Göre Başarı Gelişimin</h4>';
            echo 'Bir önceki test : % '.number_format($o_seviye, 2).'<br>';
            echo 'Şimdiki test : % '.number_format($seviye, 2).'<br><br>';
            if($seviye>$o_seviye) echo 'Performansında artış var tebrikler :)';
             else if($seviye==$o_seviye) 'Performansın aynı...';
                 else echo'Performansında düşüş var :( Daha çok çalışmalısın!!!';
        }
        echo'</div>';

        echo'<div class="span4">';
        echo'<h4>Sınıfa Göre Başarı Düzeyin</h4>';
 //       $sql="select kullanicilar.KullaniciID,kullanicilar.KullaniciAdi,kullanici_sinavlari.puan from kullanici_sinavlari,kullanicilar "
 //               . "where kullanicilar.KullaniciID=kullanici_sinavlari.kullanici_id and kullanici_sinavlari.gorev_id=".$gorev[0]['id']
 //               ." order by kullanici_sinavlari.puan desc";
 //       $ogrenciler=Yii::app()->db->createCommand($sql)->queryAll();
        echo '<table class="table table-bordered">';
        $sql="select kullanicilar.KullaniciID,kullanicilar.KullaniciAdi,kullanicilar.Ad,kullanicilar.Soyad,kullanicilar.sinif,kullanicilar.sube,kullanici_sinavlari.puan,".
                "kullanici_sinavlari.dogru_sayisi,kullanici_sinavlari.yanlis_sayisi,kullanici_sinavlari.soru_sayisi ".
                "from kullanici_sinavlari,kullanicilar "
                . "where kullanicilar.KullaniciID=kullanici_sinavlari.kullanici_id and kullanici_sinavlari.kat_id=".$kat_id." and kullanici_sinavlari.gorev_id=".$gorev1
                ." order by kullanici_sinavlari.puan desc";
        $ogrenciler=Yii::app()->db->createCommand($sql)->queryAll();        
        foreach($ogrenciler as $i=>$ogr) {

             $ss=$ogr['soru_sayisi'];
             $ds=$ogr['dogru_sayisi'];
             $ys=$ogr['yanlis_sayisi']; 
            if($ss) $seviye=($ds*100)/$ss;
            
              if($ogr['KullaniciID']==Yii::app()->user->getState('KullaniciID')) 
                 echo '<tr class="success"><td>'.($i+1).'</td><td>'.$ogr['sinif'].$ogr['sube'].'</td><td>'.$ogr['Ad'].' '.$ogr['Soyad'].'</td><td> % '.number_format($seviye,2).'</td></tr>'; 
             else 
                echo '<tr><td>'.($i+1).'</td><td>'.$ogr['sinif'].$ogr['sube'].'</td><td>'.$ogr['Ad'].' '.$ogr['Soyad'].'</td><td> % '.number_format($seviye,2).'</td></tr>';
            
        }
        echo'</table>'; 
   echo'</div>';
   echo'</div>';
        
echo '</div>';
 ?>
    

<?php

}
?>
    </div>
</div>
</div>