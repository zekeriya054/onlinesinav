<div class="navbar navbar-inverse navbar-fixed-top">
	<div class="navbar-inner">
    <div class="container">
        <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
     
          <!-- Be sure to leave the brand out there if you want it shown -->
          <a class="brand" href="#">online sinav sistemi <small> v1.0</small></a>
            <div class="nav-collapse">
			<?php 
                        $adminMenu=array(
                            /*
                       array('label'=>'Sınav Yönetimi <span class="caret"></span>', 'url'=>'#','itemOptions'=>array('class'=>'dropdown','tabindex'=>"-1"),'linkOptions'=>array('class'=>'dropdown-toggle','data-toggle'=>"dropdown"), 
                        'items'=>array(
                            array('label'=>'Kategoriler', 'url'=>'index.php?r=kat/index'),
			    array('label'=>'Sınavlar', 'url'=>'#'),
			    array('label'=>'Yeni Sınav', 'url'=>'#'),
			    array('label'=>'Soru Ekleme', 'url'=>'#'),
			    array('label'=>'Soru Bankası', 'url'=>'#'),
                        )),
                        array('label'=>'Kullanıcı Yönetimi <span class="caret"></span>', 'url'=>'#','itemOptions'=>array('class'=>'dropdown','tabindex'=>"-1"),'linkOptions'=>array('class'=>'dropdown-toggle','data-toggle'=>"dropdown"), 
                        'items'=>array(
                            array('label'=>'Kullanıcılar', 'url'=>'#'),
			    array('label'=>'Yeni Kullanıcı', 'url'=>'#'),
                        )),
                
                       array('label'=>'Sınav Atamaları <span class="caret"></span>', 'url'=>'#','itemOptions'=>array('class'=>'dropdown','tabindex'=>"-1"),'linkOptions'=>array('class'=>'dropdown-toggle','data-toggle'=>"dropdown"), 
                        'items'=>array(
                            array('label'=>'Atamalar', 'url'=>'#'),
			    array('label'=>'Yen Atama', 'url'=>'#'),
                        )),

                          array('label'=>'Giriş', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
                        array('label'=>'Çıkış ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest),
                    );
                        
                    $userMenu=  array(array('label'=>'Sınavlarım <span class="caret"></span>', 'url'=>'#','visible'=>!Yii::app()->user->isGuest,'itemOptions'=>array('class'=>'dropdown','tabindex'=>"-1"),'linkOptions'=>array('class'=>'dropdown-toggle','data-toggle'=>"dropdown"), 
                        'items'=>array(
                            array('label'=>'Aktif Sınavlarım', 'url'=>'#'),
			    array('label'=>'Eski Sınavlarım', 'url'=>'#'),
                        )),*/
                          
                        array('label'=>'Giriş', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
                        array('label'=>'Çıkış ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest)); 
                        $userMenu=$adminMenu;  
                    if(Yii::app()->user->getState("KullaniciTipi")=="admin") $menu=$adminMenu;
                    else $menu=$userMenu;
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
