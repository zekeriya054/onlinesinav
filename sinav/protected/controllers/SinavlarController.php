<script>
$(document).ready(function() {
    $("#yt0").hide();
    $("#yt1").attr("disabled","disabled");
    $("#yt2").attr("disabled","disabled");
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
       $('#yt2').click(function(){
 
       // $("#preloader").show();
        $("#sinavBitti").attr("value","1");
        window.onbeforeunload = null;
   })

});
</script>
<?php

class SinavlarController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	
    public $layout='//layouts/column2';
    public $yanlisSayisi=0;
    public $dogruSayisi=0;
    public $bosSayisi=0;
    public $puan=0;
    public $sorular;
    public $ID;
    public $sure=0;
	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('view'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('ogrencisinavlar','sinavbasla','sorugoster','cevapgoster','sinavbasla2'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('view','create','update','admin','delete'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

      /*
        public function KullaniciGorevleri($islem)
        {
            $userID=Yii::app()->user->getState('KullaniciID');
            if($islem==1) {
             $sql="select * from kullanici_gorevleri where kullanici_id=$userID";           
             
            }
            if($islem==0){
             $sql="select kullanici_gorevleri.*,kullanici_sinavlari.durum from kullanici_gorevleri,kullanici_sinavlari ".
                     "where kullanici_gorevleri.gorev_id=kullanici_sinavlari.gorev_id and ".
                     "kullanici_gorevleri.kullanici_id=kullanici_sinavlari.kullanici_id and kullanici_sinavlari.durum=1 and kullanici_gorevleri.kullanici_id=$userID";
                
            }
            $result = Yii::app()->db->createCommand($sql)->queryAll(); 
            //print_r($result);exit();         
            if(count($result)==0) {
                $result[0]['id']=-1;
                $result[0]['gorev_id']=-1;
                $result[0]['kullanici_tipi']=-1;
                $result[0]['kullanici_id']=-1;
                $result[0]['durum']=-1;
            }           

            return $result;
        }

        public function GorevlerSorguHazirla($result,$islem)
        {
            $userID=Yii::app()->user->getState('KullaniciID');
            $sql="select * from gorevler where id in(";
           foreach ($result as $r)
            {
               if($islem==1) {
                   $s="select gorev_id from kullanici_sinavlari where durum=1 and kullanici_id=$userID and gorev_id=".$r['gorev_id'];
                   $sonuc=Yii::app()->db->createCommand($s)->queryAll();
                   if(count($sonuc)==0) $sql=$sql.$r['gorev_id'].',';
               }else 
                   if($islem==0) $sql=$sql.$r['gorev_id'].',';
               
               // $gorevler[$i++]=$r['gorev_id'];
            }

            $sql=rtrim($sql,","); 
            if($islem==1)
                $sql=$this->AktifSinavlar($sql);
            else 
                if($islem==0) $sql=$this->PasifSinavlar ($sql);
            else throw new CHttpException(404,'Hatalı işlem'); 
            $result = Yii::app()->db->createCommand($sql)->queryAll();  

            return $result;
        }
        public function AktifSinavlar($sql)
        {
            $sql=$sql.') and baslama_tarihi<="'.date('Y-m-d H:i').'" and bitis_tarihi>="'.date('Y-m-d H:i').'"';
            return $sql;
        }
        public function PasifSinavlar($sql)
        {
            $sql=$sql.') or baslama_tarihi>"'.date('Y-m-d H:i').'" or bitis_tarihi<"'.date('Y-m-d H:i').'"';
            return $sql;
        }
        public function BitenSinavlar()
        {
            $gorev=$this->SınavBul($this->ID);
            $sql='select durum from kullanici_sinavlari where gorev_id='.$gorev[0]['id'];
        }
       
		*/
	public function actionOgrenciSinavlar($islem)
	{
		$userID=Yii::app()->user->getState('KullaniciID');;
            
		// $sql = "SELECT KullaniciID,KullaniciTipi FROM kullanicilar WHERE KullaniciAdi='$user'";
		// $result = Yii::app()->db->createCommand($sql)->queryAll();
		// $userID= $result[0]['KullaniciID'];
		// $userType=$result[0]['KullaniciTipi'];
		/*  
		$result1=$this->KullaniciGorevleri(1);
		$result2= $this->KullaniciGorevleri(0);
		$result=  array_merge($result1,$result2);
		if($result){
		$result=$this->GorevlerSorguHazirla($result,0);
		*/
		$sql="select kullanici_gorevleri.*,gorevler.* from kullanici_gorevleri,gorevler where kullanici_gorevleri.kullanici_id=$userID". " and gorevler.id=kullanici_gorevleri.gorev_id";
		$result = Yii::app()->db->createCommand($sql)->queryAll(); 
		//$sql="select * from sinavlar where id in(";
		if($result) 
		{
				$i=0;
				foreach ($result as $r)
				{
					//$sql=$sql.$r['gorev_id'].',';
					$sinavlar[$i++]=$r['sinav_id'];
				}
  
				$dataProvider=new CActiveDataProvider('Sinavlar',array('criteria'=>array(
					'condition'=>'id in('.implode(',',$sinavlar).')'),
				));
                     
					$this->layout='column1';
					$this->render('index',array(
						'dataProvider'=>$dataProvider,
						'sinav'=>$result,
						'islem'=>$islem
                    ));
			}  
			else throw new CHttpException(404,'Sınav bulunamadı.');
            //} else throw new CHttpException(404,'Sınav bulunamadı.');
		}
	/**
	* Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function SınavBul($id)
	{
		$sql="SELECT gorevler.*,kullanici_gorevleri.kat_id FROM gorevler,kullanici_gorevleri where gorevler.sinav_id=$id and gorevler.id=kullanici_gorevleri.gorev_id";
		$gorev = Yii::app()->db->createCommand($sql)->queryAll();
		return $gorev;
	}
        
	public function actionSinavBasla2($id)
	{
          $sql="select sinav_adi,acilis_mesaji from sinavlar where id=".$id;
          $s=Yii::app()->db->createCommand($sql)->queryAll();
          $this->renderPartial('mesaj',array('sinav_adi'=>$s[0]['sinav_adi'],'mesaj'=>$s[0]['acilis_mesaji'],'id'=>$id));
	}
	public function actionSinavBasla($id)
	{
          $gorev= $this->SınavBul($id);
          $kullanici=Yii::app()->user->getState('KullaniciID');
          $sql="select * from kullanici_sinavlari where gorev_id=".$gorev[0]['id']." and kullanici_id=$kullanici and durum=1";
          $t=Yii::app()->db->createCommand($sql)->queryAll();
          if(count($t)==0) {
            $sinav=Sinavlar::model()->findByPk($id);
            $sinavAdi=$sinav->sinav_adi;
            $sinavSuresi=$gorev[0]['sinav_suresi'];
            $sql="SELECT * FROM sorular where sinav_id=$id";
            $soruSayisi = Yii::app()->db->createCommand($sql)->query()->rowCount;
            Yii::app()->session['soruSayisi'] = $soruSayisi;
            if(!isset(Yii::app()->session['soruID']) || Yii::app()->session['soruID']<0) Yii::app()->session['soruID']= 0;
            $x= Yii::app()->session['soruID'];
            if($soruSayisi!=0) {
            $sql = "SELECT * FROM sorular where sinav_id=$id limit $x,1 ";
            $soru = Yii::app()->db->createCommand($sql)->queryAll();
            $soru_id=$soru[0]['id'];
            $sql="SELECT * FROM cevaplar where soru_id=".$soru[0]['id'];
            $cevap=Yii::app()->db->createCommand($sql)->queryAll();
            $this->layout='column1';
            $this->render('sinav',array(
			'id'=>$id,'soru'=>$soru,'cevap'=>$cevap,'i'=>0,'model'=>$model,'sinavAdi'=>$sinavAdi,'sinavSuresi'=>$sinavSuresi,'gorev_id'=>$gorev[0]['id'],'kat_id'=>$gorev[0]['kat_id']
		));
            } else throw new CHttpException(404,'Sınava sorusu bulunamadı...');
           } else throw new CHttpException(404,'Sınav tamamlanmış...');
        }
        public function actionSoruGoster($id)
        {
          
            $kullanici=Yii::app()->user->getState('KullaniciID');
            if($_POST['islem']=='sonraki') 
                Yii::app()->session['soruID']=Yii::app()->session['soruID']+1;
            else Yii::app()->session['soruID']=Yii::app()->session['soruID']-1;
             $i=Yii::app()->session['soruID'];
       if($_POST['sinavBitti']!=1)   {  
            $sql = "SELECT * FROM sorular where sinav_id=$id limit $i,1";
            $soru = Yii::app()->db->createCommand($sql)->queryAll();
            $sql="SELECT * FROM cevaplar where soru_id=".$soru[0]['id'];
            $cevap=Yii::app()->db->createCommand($sql)->queryAll();
            
            
            echo'<div class="row-fluid">'.
'<hr>'.
'<div class="span2">'.
'<b>Soru : '.(Yii::app()->session['soruID']+1).'</b>'.
'</div>'.
'</div>'.
    '<hr>'.
    '<div class="span4">';

        if(Yii::app()->session['soruID']==0) {
            echo'<script>'.
           '$(function(){'.
           '$("#yt0").hide();'.
            '$("#yt2").hide();})'.        
           '</script>';
        } 
        if(Yii::app()->session['soruID']+1==Yii::app()->session['soruSayisi']) {
            echo'<script>'.
           '$(function(){'.
           '$("#yt2").show();'.
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
                foreach($cevap as $i=>$c) {
                  //  $sql="SELECT * FROM kullanici_cevaplari where kullanici_id=".$kullanici." and cevap_id=".$c['id']." and soru_id=".$soru[0]['id'];
                   // $kcevap=Yii::app()->db->createCommand($sql)->queryAll(); 
                   // $kcevap2=Yii::app()->db->createCommand($sql)->queryAll();  
                    $checked='';
                    switch($soru[0]['soru_tipi']){
                        case 0:
                          
                            // if(count($kcevap)>0) $checked='checked';else $checked='unchecked';
                            $html='<input type="checkbox" name="cevap[]" id="cevap'.$i.'" value="'.$c['id'].'">';
                        break; 
                        case 1:
                            if(count($kcevap)>0) $checked='checked';else $checked='unchecked';
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
echo'<div class="row-fluid">'.
        '<hr>'.
  '</div>'.
'<div class="row-fluid">'.
    '<div class="span1">'.
'</div>'.
'</div>';              
              echo'<div class="span2">';
              echo '<div class="row buttons">';
 
            
            echo CHtml::ajaxSubmitButton ("< Önceki",
                array('sinavlar/sorugoster','id'=>$id),
                array('update' => '#sb','type'=>'post','data'=>array('ce'=>'js:$("#post-form").serializeArray()','islem'=>'onceki')));//'data'=>array('cevaplar'=>'js:$("input[type=\"checkbox\",name=\"cevap\"]").val()')
               
   echo CHtml::ajaxSubmitButton ("Kaydet & Sonraki >",
                array('sinavlar/sorugoster','id'=>$id),
                array('update' => '#sb','type'=>'post','data'=>array('ce'=>'js:$("#post-form").serializeArray()','islem'=>'sonraki')));//'data'=>array('cevaplar'=>'js:$("input[type=\"checkbox\",name=\"cevap\"]").val()')

         /*
                echo CHtml::ajaxSubmitButton ("Bitir",
                array('sinavlar/sorugoster','id'=>$id),
                array('update' => '.main-body','type'=>'post','data'=>array('ce'=>'js:$("#post-form").serializeArray()','islem'=>'sonraki','sinavBitti'=>1)));
           */    
            echo CHtml::SubmitButton('Bitir',array('id'=>'yt2','name'=>'Bitir')); 
                
      $this->endWidget(); 
              
              
              
       } 
        if($_POST['islem']=='sonraki')   { 
           if($_POST['sinavBitti']!=1) {
                $soru_id=$_POST['ce'][2]['value'];
                $soru_tipi=$_POST['ce'][3]['value'];
                $n=count($_POST['ce']);
                $b=4;
           } else {
               $soru_id=$_POST['soru_id'];
               $soru_tipi=$_POST['soru_tipi'];
               $n=count($_POST['cevap']);
               $b=0;
           }
           Yii::app()->db->createCommand()->delete('kullanici_cevaplari','soru_id=:id and kullanici_id=:kullanici_id',array('id'=>$soru_id,'kullanici_id'=>Yii::app()->user->getState('KullaniciID')));
           for($i=$b;$i<$n;$i++) {
               if($soru_tipi<2) {
                     if($_POST['sinavBitti']!=1) {
                         $cevap_id=$_POST['ce'][$i]['value'];
                     }  
                     else {
                         $cevap_id=$_POST['cevap'][$i];
                     }
                     Yii::app()->db->createCommand()->insert('kullanici_cevaplari', array(
                                       'kullanici_id'=>Yii::app()->user->getState('KullaniciID'),
                                       'soru_id'=>$soru_id,
                                       'cevap_id'=>$cevap_id,
                                       'ekleme_tarihi'=>date('Y-m-d H:i:s')
               
                                       
                 )); 
                
               } 
               else {
                     if($_POST['sinavBitti']!=1) {
                         $cevap_id=$_POST['ce'][$i+1]['value'];
                         $cevap_metni=$_POST['ce'][$i]['value'];
                     }  
                     else {
                         $cevap_id=$_POST['cevap_id'][$i];
                         $cevap_metni=$_POST['cevap'][$i];
                     }                   
                     Yii::app()->db->createCommand()->insert('kullanici_cevaplari', array(
                                       'kullanici_id'=>Yii::app()->user->getState('KullaniciID'),                                      
                                       'soru_id'=>$soru_id,
                                       'cevap_id'=>$cevap_id,
                                       'cevap_metni'=>$cevap_metni,
                                       'ekleme_tarihi'=>date('Y-m-d H:i:s')
                     ));  
                 //    $i++;
               }
 
           }
        if($_POST['sinavBitti']==1) {
            $bitis=date('Y-m-d H:i:s');
            $sql="SELECT * FROM gorevler where sinav_id=$id";
            $gorev = Yii::app()->db->createCommand($sql)->queryAll();
            $kullanici=Yii::app()->user->getState('KullaniciID');
           // $sql="select baslama_tarihi from kullanici_sinavlari where gorev_id=".$gorev[0]['id']." and kullanici_id=".$kullanici;
            //$baslama=Yii::app()->db->createCommand($sql)->queryAll();
            $update = Yii::app()->db->createCommand()
                ->update('kullanici_sinavlari', array('bitis_tarihi'=>$bitis,'durum'=>1),
                 'gorev_id=:gorev_id and kullanici_id=:kullanici_id',array(':gorev_id'=>$gorev[0]['id'],':kullanici_id'=>  $kullanici)); 
            unset(Yii::app()->session['soruID']);
            $this->BasariHesapla($id);

            $ds= $this->dogruSayisi;
            $ys=$this->yanlisSayisi;
            $p=$this->puan;
            $this->sure=$t;
            $update = Yii::app()->db->createCommand()
                ->update('kullanici_sinavlari', array('dogru_sayisi'=>$ds,'yanlis_sayisi'=> $ys,'soru_sayisi'=>count($this->sorular),'puan'=>$p),
                'gorev_id=:gorev_id and kullanici_id=:kullanici_id',array(':gorev_id'=>  $gorev[0]['id'],':kullanici_id'=>  $kullanici));
           
                $this->actionCevapGoster(-1,$gorev[0]['id'],$kullanici);
           //$this->layout='column2';
         // $this->redirect(array('cevapgoster'));
      }
     }
  }
     
    public function actionCevapGoster($id=-1,$gorev_id=-1,$kullanici=-1)
    {

        if($kullanici==-1) $kullanici=Yii::app()->user->getState('KullaniciID');
        if($gorev_id==-2)
        {
             $sql="select gorevler.sinav_id,kullanici_sinavlari.gorev_id,kullanici_sinavlari.kat_id,kullanici_sinavlari.soru_sayisi,kullanici_sinavlari.baslama_tarihi,kullanici_sinavlari.bitis_tarihi,".
             "kullanici_sinavlari.dogru_sayisi,kullanici_sinavlari.yanlis_sayisi ".
             "from kullanici_sinavlari,gorevler where gorevler.id=kullanici_sinavlari.gorev_id and ".
             "kullanici_sinavlari.durum=1 and kullanici_sinavlari.kullanici_id=$kullanici and kullanici_sinavlari.kat_id=$id order by kullanici_sinavlari.bitis_tarihi desc";
        }
        
        else if($gorev_id==-1) {
           $sql="select distinct(kat_id) from kullanici_sinavlari where kullanici_id=$kullanici";
           $kat=Yii::app()->db->createCommand($sql)->queryAll();
           $kat_id=$kat[0]['kat_id'];
           if($kat_id)
            $sql="select gorevler.sinav_id,kullanici_sinavlari.gorev_id,kullanici_sinavlari.kat_id,kullanici_sinavlari.soru_sayisi,kullanici_sinavlari.baslama_tarihi,kullanici_sinavlari.bitis_tarihi,".
             "kullanici_sinavlari.dogru_sayisi,kullanici_sinavlari.yanlis_sayisi ".
             "from kullanici_sinavlari,gorevler where gorevler.id=kullanici_sinavlari.gorev_id and ".
             "kullanici_sinavlari.durum=1 and kullanici_sinavlari.kullanici_id=$kullanici and kullanici_sinavlari.kat_id=$kat_id order by kullanici_sinavlari.bitis_tarihi desc";   
             
       } else{
             
             $sql="select distinct(kat_id) from kullanici_sinavlari where kullanici_id=$kullanici and gorev_id=$gorev_id";
             $kat=Yii::app()->db->createCommand($sql)->queryAll();
             $kat_id=$kat[0]['kat_id'];
             if($kat_id)
             $sql="select gorevler.sinav_id,kullanici_sinavlari.gorev_id,kullanici_sinavlari.kat_id,kullanici_sinavlari.soru_sayisi,kullanici_sinavlari.baslama_tarihi,kullanici_sinavlari.bitis_tarihi,".
                     "kullanici_sinavlari.dogru_sayisi,kullanici_sinavlari.yanlis_sayisi ".
                     "from kullanici_sinavlari,gorevler where gorevler.id=kullanici_sinavlari.gorev_id and ".
             "kullanici_sinavlari.durum=1 and kullanici_sinavlari.kullanici_id=$kullanici and kullanici_sinavlari.kat_id=$kat_id order by kullanici_sinavlari.bitis_tarihi desc";  
             
       }

       $result = Yii::app()->db->createCommand($sql)->queryAll(); 

       if($result){
           /*
            if($id==-1) $id=$result[0]['sinav_id']; 
            if($gorev==-1) $gorev=$result[0]['gorev_id'];
            if(count($result)==2) {
        //$onceki_id=$result[1]['sinav_id'];
             $onceki_ss=$result[1]['soru_sayisi'];
             $onceki_ds=$result[1]['dogru_sayisi'];
             $onceki_ys=$result[1]['yanlis_sayisi'];
       } else $onceki_ss=-1;
       $ss=$result[0]['soru_sayisi'];
       $ds=$result[0]['dogru_sayisi'];
       $ys=$result[0]['yanlis_sayisi'];
       $baslangic=$result[0]['baslama_tarihi'];
       $bitis=$result[0]['bitis_tarihi'];
       $t= strtotime($bitis)-strtotime($baslangic);
        $sql="select kullanicilar.KullaniciID,kullanicilar.KullaniciAdi,kullanicilar.Ad,kullanicilar.Soyad,kullanicilar.sinif,kullanicilar.sube,kullanici_sinavlari.puan,".
                "kullanici_sinavlari.dogru_sayisi,kullanici_sinavlari.yanlis_sayisi,kullanici_sinavlari.soru_sayisi ".
                "from kullanici_sinavlari,kullanicilar "
                . "where kullanicilar.KullaniciID=kullanici_sinavlari.kullanici_id and kullanici_sinavlari.gorev_id=".$gorev
                ." order by kullanici_sinavlari.puan desc";
        $ogrenciler=Yii::app()->db->createCommand($sql)->queryAll();
       
            //$kullanici=Yii::app()->user->getState('KullaniciID');*/
 //      if($id) {
   
                      
           $this->layout='column2';
                 //$this->render('_sinavc',array('id'=>$id,'kullanici'=>$kullanici,'gorev'=>$gorev,'result'=>$result,'ds'=> $ds,'ys'=>$ys,'ss'=>$ss,'sure'=>$t,'o_ds'=>$onceki_ds,'o_ys'=>$onceki_ys,'o_ss'=>$onceki_ss,'ogrenciler'=>$ogrenciler));           
                 $this->render('_sinavc1',array('id'=>$id,'kullanici'=>$kullanici,'gorev'=>$gorev,'result'=>$result));           
  //          } else throw new CHttpException(404,'Bitirilmiş sınav yok...');
       } else throw new CHttpException(404,'Bitirilmiş sınav yok...');              
    }
    public function BasariHesapla($id)
    {
       $kullanici=Yii::app()->user->getState('KullaniciID');
        $sql="SELECT * FROM sorular where sinav_id=$id";
        $this->sorular = Yii::app()->db->createCommand($sql)->queryAll();
            foreach ($this->sorular as $s){
              $dogru=1;
              if($s['soru_tipi']<2) {  
                $sql='SELECT * FROM cevaplar where dogru_cevap=1 and soru_id='.$s['id'];
                $cevap = Yii::app()->db->createCommand($sql)->queryAll();
                foreach ($cevap as $c) {
                      $sql='SELECT * FROM kullanici_cevaplari where kullanici_id='.$kullanici.' and soru_id='.$s['id'].' and cevap_id='.$c['id'];
                      $kcevap = Yii::app()->db->createCommand($sql)->query();
                      if($kcevap->rowCount==0) {
                          $this->yanlisSayisi++;
                          $dogru=0;
                          break;
                      }
                }
                $sql='SELECT * FROM kullanici_cevaplari where kullanici_id='.$kullanici.' and soru_id='.$s['id'];
                $kcevap = Yii::app()->db->createCommand($sql)->queryAll();
                if(count($cevap)!=count($kcevap) && $dogru!=0){
                    $dogru=0;
                    $this->yanlisSayisi++;
                }
                if($dogru==1) {
                    $this->dogruSayisi++;
                    $this->puan=  $this->puan+$s['puan'];
                    
                }
            } 
            else {
                $sql='SELECT * FROM cevaplar where soru_id='.$s['id'];
                $cevap=Yii::app()->db->createCommand($sql)->queryAll();
                foreach ($cevap as $c) {
                      $sql='SELECT * FROM kullanici_cevaplari where kullanici_id='.$kullanici.' and soru_id='.$s['id'].' and cevap_id='.$c['id'];
                      $kcevap = Yii::app()->db->createCommand($sql)->queryAll();
                      if(trim($c['dogru_cevap_metni'])!=trim($kcevap[0]['cevap_metni'])) {
                          $this->yanlisSayisi++;
                          $dogru=0;
                          break;
                      }
                }
                if($dogru==1) {
                    $this->dogruSayisi++;
                    $this->puan=  $this->puan+$s['puan'];
                } 
            }
          }
    }
   
	
       
        public function actionCreate()
	{
		$model=new Sinavlar;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Sinavlar']))
		{
			$model->attributes=$_POST['Sinavlar'];
			if($model->save())
				$this->redirect(array('admin'));
		}
                $records = Kategoriler::model()->findAll();
                $list = CHtml::listData($records, 'id', 'kat_adi');

		$this->render('create',array(
			'model'=>$model,'kategori'=>$list,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);
                
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
                $records = Kategoriler::model()->findAll();
                $list = CHtml::listData($records, 'id', 'kat_adi');
  
		if(isset($_POST['Sinavlar']))
		{
			$model->attributes=$_POST['Sinavlar'];
			if($model->save())
				$this->redirect(array('admin'));
		}

		$this->render('update',array(
			'model'=>$model,'kategori'=>$list,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{

                $dataProvider=new CActiveDataProvider('Sinavlar');
         	$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Sinavlar('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Sinavlar']))
			$model->attributes=$_GET['Sinavlar'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}


/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Sinavlar the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Sinavlar::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Sinavlar $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='sinavlar-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
