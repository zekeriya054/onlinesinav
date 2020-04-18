<?php /* @var $this Controller */ ?>
<?php $this->beginContent('//layouts/main'); ?>

  <div class="row-fluid">
	<div class="span2">
		<div class="sidebar-nav">
           	  <?php
                  if(Yii::app()->user->getState("KullaniciTipi")=="admin") {
                   $menu=array(
				array('label'=>'<i class="icon icon-th-list"></i> Sınav Yönetimi', 'url'=>array('#'),'itemOptions'=>array('class'=>'active'),'items'=>array(
                                    array('label'=>'Kategoriler', 'url'=>array('kat/admin')),
                                    array('label'=>'Sınavlar', 'url'=>array('sinavlar/admin')),
                                    array('label'=>'Yeni Sınav', 'url'=>array('sinavlar/create')),
                                   // array('label'=>'Soru Ekleme', 'url'=>array('client/admin')),
                                   // array('label'=>'Soru Bankası', 'url'=>array('client/admin')),
                             
              
                )),
				array('label'=>'<i class="icon icon-user"></i> Kullanıcı Yönetimi', 'url'=>'#','itemOptions'=>array('class'=>'active'),'items'=>array(
                                    array('label'=>'Kullanıcılar','url'=>array('kullanicilar/admin')),
                                    array('label'=>'Yeni Kullanıcı','url'=>array('kullanicilar/create')),
                               )),
				array('label'=>'<i class="icon  icon-ok"></i> Sınav Atamaları', 'url'=>'#','itemOptions'=>array('class'=>'active'),'items'=>array(
                                    array('label'=>'Atanmış Sınavlar','url'=>array('gorevler/admin')),
                                    array('label'=>'Yeni Sınav Atama','url'=>array('gorevler/create')),
                                    
                                )),
				// Include the operations menu
				
			);
                  } else if(!Yii::app()->user->isGuest){
                   $kullanici=Yii::app()->user->getState('KullaniciID');
                   $sql="select distinct(kategoriler.id),kategoriler.kat_adi from kullanici_sinavlari,kategoriler where kategoriler.id=kullanici_sinavlari.kat_id ".
                           "and kullanici_sinavlari.durum=1 and kullanici_sinavlari.kullanici_id=$kullanici order by kategoriler.kat_adi asc";   
                   $result = Yii::app()->db->createCommand($sql)->queryAll(); 
                   $sinavMenu=array();
                   foreach($result as $r)
                   {
                       array_push($sinavMenu,array('label'=>$r['kat_adi'],'url'=>array('sinavlar/cevapgoster','id'=>$r['id'],'gorev_id'=>-2)));
                   }

                   $menu=array(array('label'=>'<i class="icon  icon-ok"></i> Kategoriler', 'url'=>'#','itemOptions'=>array('class'=>'active'),'items'=>
                                    $sinavMenu,                                  
                                    
                                ));
                  }
                  /*
                  if(Yii::app()->user->getState("KullaniciTipi")=="admin") $menu=$adminMenu;
                   else $menu=$userMenu;
                   
                   */
                   if(!Yii::app()->user->isGuest) {
                   $this->widget('zii.widgets.CMenu', array(
			'encodeLabel'=>false,
			'items'=>$menu,
			));
                   }
                  ?>
                
		</div>
        <br>


    </div><!--/span-->
    <div class="span10">
 
    <!-- Include content pages -->
    <?php echo $content; ?>


  </div><!--/row-->


<?php $this->endContent(); ?>