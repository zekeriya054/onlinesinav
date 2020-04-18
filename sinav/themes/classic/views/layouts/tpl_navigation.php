<div class="navbar navbar-inverse navbar-fixed-top">
	<div class="navbar-inner">
    <div class="container">
        <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
     
          <!-- Be sure to leave the brand out there if you want it shown -->
          <a class="brand" href="index.php?r=site/index">Online Sınav Sistemi <small> v1.0</small></a>
            <div class="nav-collapse">
			<?php 
                     if(Yii::app()->user->getState("KullaniciTipi")!="admin") {
                        $adminMenu=array(
                            array('label'=>'Ana Sayfa', 'url'=>'index.php?r=site/index'), 
                            array('label'=>'Testler', 'url'=>'index.php?r=sinavlar/ogrencisinavlar&islem=1'),
			    array('label'=>'Sonuçlar', 'url'=>array('sinavlar/cevapgoster')),
			    array('label'=>'İletişim', 'url'=>'index.php?r=site/contact'),
                            array('label'=>'Giriş', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
                            array('label'=>'Hoşgeldin, '.Yii::app()->user->name.' (Çıkış Yap)', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest),
                         );
                     } else {
                         $adminMenu=array(
                            //array('label'=>'Ana Sayfa', 'url'=>'index.php?r=site/login'), 
                            //array('label'=>'Testler', 'url'=>'index.php?r=sinavlar/ogrencisinavlar&islem=1'),
			    //array('label'=>'Sonuçlar', 'url'=>array('sinavlar/cevapgoster')),
			    //array('label'=>'İletişim', 'url'=>'index.php?r=site/contact'),
                            //array('label'=>'Giriş', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
                            array('label'=>'Hoşgeldin, '.Yii::app()->user->name.' (Çıkış Yap)', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest),);                        
                     } 
                /*        
                    $userMenu=  array(array('label'=>'Sınavlarım <span class="caret"></span>', 'url'=>'#','visible'=>!Yii::app()->user->isGuest,'itemOptions'=>array('class'=>'dropdown','tabindex'=>"-1"),'linkOptions'=>array('class'=>'dropdown-toggle','data-toggle'=>"dropdown"), 
                        'items'=>array(
                            array('label'=>'Aktif Sınavlarım', 'url'=>'#'),
			    array('label'=>'Eski Sınavlarım', 'url'=>'#'),
                        )),
                          
                        array('label'=>'Giriş', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
                        array('label'=>'Çıkış ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest)); 
                        $userMenu=$adminMenu;  
                    if(Yii::app()->user->getState("KullaniciTipi")=="admin") $menu=$adminMenu;
                    else $menu=$userMenu;*/
                    $menu=$adminMenu;    
                        $this->widget('zii.widgets.CMenu',array(
                    'htmlOptions'=>array('class'=>'pull-right nav'),
                    'submenuHtmlOptions'=>array('class'=>'dropdown-menu'),
					'itemCssClass'=>'item-test',
                    'encodeLabel'=>false,
                    'items'=>$menu,
                )); ?>
    	</div>
    </div>
	</div>
</div>
