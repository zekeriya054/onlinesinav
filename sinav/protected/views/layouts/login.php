<?php /* @var $this Controller */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=<?php echo Yii::app()->charset;?>" />
	<meta name="language" content="en" />
        <link href="<?php echo Yii::app()->request->baseUrl; ?>/css/login.css" type="text/css" rel="stylesheet"/>
	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>

<div class="container" id="ana_yerlesim">

	<div id="baslik">
		<div id="logo"><strong><?php echo CHtml::encode(Yii::app()->name); ?> - Giriş Yap</strong></div>
                
	</div><!-- header -->
        <div class="giris">
            <div>
                <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/login.png">
                <strong>Öğrenci veya yönetici olarak giriş yap</strong>
            </div>
           <?php echo $content; ?> 
        </div>
	
	<div class="clear"></div>

	<div id="footer">
	</div><!-- footer -->

</div><!-- page -->

</body>
</html>
