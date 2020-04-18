<script>
$(document).ready(function() {
    $("#yt1").attr("disabled","disabled");
    $("#yt2").attr("disabled","disabled");
    $("#preloader").hide();

    $("form input:radio").change(function () {
       $("#yt1").removeAttr('disabled');
       $("#yt2").removeAttr('disabled');
    });

    $("form input:checkbox").change(function () {
       var n = $('form input:checkbox:checked').length;
      if(n>0){
          $("#yt1").removeAttr('disabled');
          $("#yt2").removeAttr('disabled');
      }
        else {
            $("#yt1").attr("disabled","disabled");
            $("#yt2").attr("disabled","disabled");

        }
    });
    $("form input:text").keyup(function () {
       var n = $('form input:text').length;
       var i=1;

       $("form input:text").each(function() {
         if($(this).val().length==0) i=0;
       })
        if(i==1) {
            $("#yt1").removeAttr('disabled');
            $("#yt2").removeAttr('disabled');
        }
        else {
            $("#yt1").attr("disabled","disabled");
            $("#yt2").attr("disabled","disabled");
        }
    });
  window.onbeforeunload = confirmExit;
  function confirmExit()
  {
    return "Sınavı bitirmeden sayfadan ayrılmak istediğinize eminmisiniz ?";
  }
   $('#yt2').click(function(){

       // $("#preloader").show();
        $("#sinavBitti").attr("value","1");
        window.onbeforeunload = null;
   })
});
</script>
<?php
    $kullanici=Yii::app()->user->getState('KullaniciID');
    $sql="select baslama_tarihi from kullanici_sinavlari where gorev_id=$gorev_id and kullanici_id='$kullanici' and durum=0";
    $t=Yii::app()->db->createCommand($sql)->queryAll();
    if(count($t)==0) {
                    $tarih=date('Y-m-d H:i:s');
                    Yii::app()->db->createCommand()->delete('kullanici_sinavlari','gorev_id=:gorev_id and kullanici_id=:kullanici_id',array(':gorev_id'=>$gorev[0]['id'],':kullanici_id'=>$kullanici));
                    $update = Yii::app()->db->createCommand()
                       ->insert('kullanici_sinavlari', array('baslama_tarihi'=>$tarih,'kullanici_id'=>$kullanici,'gorev_id'=>$gorev_id,'kat_id'=>$kat_id));
    } /*
    else
    $tarih=$t[0]['baslama_tarihi'];
    $gecenSure=time()-strtotime($tarih);
    $kalanSure=($sinavSuresi*60)-$gecenSure;
    $kalanDakika=floor($kalanSure/60);
    $kalanSaniye=$kalanSure%60;
    if($kalanSure<0) {
            $update = Yii::app()->db->createCommand()
                ->update('kullanici_sinavlari', array('bitis_tarihi'=>date('Y-m-d H:i:s'),'durum'=>1),
                 'gorev_id=:gorev_id and kullanici_id=:kullanici_id',array(':gorev_id'=>$gorev_id,':kullanici_id'=>  $kullanici));
                   throw new CHttpException(404,'Sınav süreniz daha önce dolmuştur...');
    }*/

?>
<div id="preloader"> <center> <div id="yukleniyor">Lütfen bekleyin işlemler devam ediyor...</div></center> </div>

<div class="row-fluid">
  <div class="span8">
      <span style="font-size: 12pt; font-weight: bold;">Sınav :  <?php echo $sinavAdi;?></span>
  </div>

</div>
<div class="row-fluid" id="sb">
<div class="row-fluid" id="sorular">
<div class="row-fluid" >
<hr>
<div class="span2">
<b>Soru : <?php echo Yii::app()->session['soruID']+1;?></b>
</div>

</div>
    <hr>
    <div class="span4">
             <script type="text/javascript">

        TimerRunning = false;
        function Init_Timer(quiz_time, seconds) //call the Init function when u need to start the timer
        {
            mins = quiz_time;
            secs = seconds;
            StopTimer();
            StartTimer();
        }

        function StopTimer() {
            if (TimerRunning)
                clearTimeout(TimerID);
            TimerRunning = false;
        }

        function StartTimer() {

            TimerRunning = true;
            document.getElementById('lblTimer').innerHTML = Pad(mins) + ":" + Pad(secs);
            TimerID = setTimeout("StartTimer()", 1000);

            Check();

            if (mins == 0 && secs == 0)
                StopTimer();

            if (secs == 0) {
                mins--;
                secs = 60;
            }
            secs--;

        }

        function Check() {
            if (mins == 5 && secs == 0) {

            }
            else if (mins == 0 && secs == 0)
            {

                alert("Sinav süresi doldu...!");
                StopTimer();
                TimerRunning = false;
                Bitti();


               // HideTable();
             //  alert('before reload');
               // window.location.reload(false);

              // alert('after reload');
             //  window.location.href='index.php?module=start_quiz&id=8&tmend=true';
            }
        }

        function Pad(number) //pads the mins/secs with a 0 if its less than 10
        {
            if (number < 10)
                number = 0 + "" + number;
            return number;
        }
     function Bitti()
     {
         $('#yt2').click();
     }
</script>
        <script language="javascript"><?php //echo 'Init_Timer('.$kalanDakika.','.$kalanSaniye.')';?></script>
        <?php //if(Yii::app()->session['soruID']==0) {
            echo'<script>'.
           '$(function(){'.
           '$("#yt0").hide();'.
            '$("#yt2").hide();'.
            '$("#yt1").attr("disabled","disabled");'.
                    '})'.
           '</script>';
        //}
        if(Yii::app()->session['soruID']+1==Yii::app()->session['soruSayisi']) {
            echo'<script>'.
           '$(function(){'.
           '$("#yt2").show();'.
           '$("#sinavBitti").val(1);'.
           '$("#islem").val("sonraki");'.
           '$("#yt1").hide();})'.
           '</script>';
        }
        else {
            echo'<script>'.
           '$(function(){'.

           '$("#yt2").hide();'.
           '$("#yt1").show();})'.
           '</script>';
        }
            echo $soru[0]['ust_metin'];
            echo $soru[0]['soru'];
            echo $soru[0]['alt_metin'];
            $form=$this->beginWidget('CActiveForm', array(
            'id'=>'post-form',
             'action'=>Yii::app()->createUrl('sinavlar/sorugoster',array('id'=>$id)),
            'enableAjaxValidation'=>false,
             ));
            echo'<input type="hidden" name="islem" id="islem" value="sonraki">';
            echo'<input type="hidden" name="sinavBitti" id="sinavBitti" value="">';
            echo'<input type="hidden" name="soru_id" value="'.$soru[0]['id'].'">';
            echo'<input type="hidden" name="soru_tipi" value="'.$soru[0]['soru_tipi'].'">';
            echo '<table class="table table-striped table-bordered">';
            $checked='unchecked';
            foreach($cevap as $i=>$c) {

                   // $sql="SELECT * FROM kullanici_cevaplari where kullanici_id=".$kullanici." and cevap_id=".$c['id']." and soru_id=".$soru[0]['id'];
                    //$kcevap=Yii::app()->db->createCommand($sql)->queryAll();

                    switch($soru[0]['soru_tipi']){
                        case 0:
                        //    if(count($kcevap)>0) $checked='checked';else $checked='unchecked';
                            $html='<input type="checkbox" name="cevap[]" id="cevap'.$i.'" value="'.$c['id'].'">';
                        break;
                        case 1:
                            if(count($kcevap)>0) $checked='checked'; else $checked='unchecked';                           
                            $html='<input type="radio" name="cevap[]" id="cevap'.$i.'" value="'.$c['id'].'" '.$checked.'>';
                            break;

                        case 2:
                            $html='<input type="text" name="cevap[]" value="'.$kcevap[0]['cevap_metni'].'" id="cevap">'.'<input type="hidden" name="cevap_id[]" value="'.$c['id'].'">';
                            break;
                        case 3:
                            $html='<input type="text" name="cevap[]" value="'.$kcevap[0]['cevap_metni'].'" id="cevap">'.'<input type="hidden" name="cevap_id[]" value="'.$c['id'].'">';
                            break;
                    }

                   if($soru[0]['soru_tipi']<2) echo '<tr><td style="width:20px;">'.$html.'</td><td>'.$c['cevap_metni'].'</td></tr>';
                     else echo '<tr><td>'.$c['cevap_metni'].'</td><td>'.$html.'</td></tr>';

                }
              echo'</table>';

     ?>

</div>
     <div class="span5">

    </div>
</div>

    <div class="row-fluid">
        <hr>

    </div>

<div class="row-fluid">
    <div class="span1">

    </div>
</div>

<div class="span2">
<div class="row buttons">

        <?php

            echo CHtml::ajaxSubmitButton ("< Önceki",
                array('sinavlar/sorugoster','id'=>$id),
                array('update' => '#sb','type'=>'post','data'=>array('ce'=>'js:$("#post-form").serializeArray()','islem'=>'onceki')));//'data'=>array('cevaplar'=>'js:$("input[type=\"checkbox\",name=\"cevap\"]").val()')

        ?>
        <?php echo CHtml::ajaxSubmitButton ("Kaydet & Sonraki >",
                array('sinavlar/sorugoster','id'=>$id),
                array('update' => '#sb','type'=>'post','data'=>array('ce'=>'js:$("#post-form").serializeArray()','islem'=>'sonraki')));//'data'=>array('cevaplar'=>'js:$("input[type=\"checkbox\",name=\"cevap\"]").val()')

        ?>
                <?php
         /*
                echo CHtml::ajaxSubmitButton ("Bitir",
                array('sinavlar/sorugoster','id'=>$id),
                array('update' => '.main-body','type'=>'post','data'=>array('ce'=>'js:$("#post-form").serializeArray()','islem'=>'sonraki','sinavBitti'=>1)));
           */
            echo CHtml::SubmitButton('Bitir',array('id'=>'yt2','name'=>'Bitir'));

        ?>
        <?php $this->endWidget(); ?>

    </div>
 </div>
</div>
