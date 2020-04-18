<?php

class GorevlerController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';
        public $sinavmodel;

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
				'actions'=>array('index','view','sinavlar',),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update','delete','admin','index','bilgi'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('create','update','delete','admin','index'),
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

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Gorevler;
                $katmodel=new Kategoriler;
                $sinavmodel=new Sinavlar;
                $kullanicilar=new Kullanicilar;
                $kul=$kullanicilar->findAll();
                $kul=CHtml::listData($kul, 'KullaniciAdi', 'Ad','Soyad');
                $records = $katmodel->findAll();
                $list = CHtml::listData($records, 'id', 'kat_adi');
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Gorevler']))
		{

                    $model->attributes=$_POST['Gorevler'];
                    $kategori=$_POST['Kategoriler'];
			if($model->save()) {
                            Yii::app()->db->createCommand()->delete('kullanici_gorevleri','gorev_id=:id',array('id'=>$model->id));
                            if(isset($_POST['users'])) {
                                $kull=$_POST['users'];
                                foreach ($kull as $k) {
                                      Yii::app()->db->createCommand()->insert('kullanici_gorevleri', array(
                                        'gorev_id'=>$model->id,
                                        'kullanici_tipi'=>1,
                                        'kullanici_id'=>$k,
                                        'kat_id'=>$kategori['id']
                                       
                                    ));
                                }
                                
                            }
			$this->redirect(array('admin'));	
                        }
		}

		$this->render('create',array(
			'model'=>$model,'kategori'=>$list,'katmodel'=>$katmodel,'sinavmodel'=>$sinavmodel,'kulmodel'=>$kullanicilar,'kul'=>$kul
		));
	}
       public function actionBilgi($id)
       {
           $userID=Yii::app()->user->getState('KullaniciID');
           $sql="select kullanicilar.*,kullanici_gorevleri.* from kullanicilar,kullanici_gorevleri where kullanici_gorevleri.kullanici_id=kullanicilar.KullaniciID and ".
                   "kullanici_gorevleri.gorev_id=$id";
           $count= Yii::app()->db->createCommand($sql)->queryAll();
           $dataProvider=new CSqlDataProvider($sql, array('totalItemCount'=>count($count),'keyField' => 'KullaniciID',
        'sort'=>array(
        'attributes'=>array(
             'KullaniciAdi', 'Ad', 'Soyad',),),'pagination'=>array(
        'pageSize'=>10,
    ),
));
             $gorev=$dataProvider;
             $sql="select gorevler.*,sinavlar.* from gorevler,sinavlar where gorevler.sinav_id=sinavlar.id".
            " and gorevler.id=$id";
           $sinav=Yii::app()->db->createCommand($sql)->queryAll();           
           $sql="select * from kategoriler where id=".$sinav[0]['kat_id'];
           $kat=Yii::app()->db->createCommand($sql)->queryAll(); 
           $this->render('gorevler',array('g_id'=>$id,'gorev'=>$gorev,'sinav'=>$sinav,'kat'=>$kat));
          
       }
       public function SinavPuani($data, $row) 
       {
           
            $sql="select puan from kullanici_sinavlari where gorev_id=".$data['gorev_id']." and kullanici_id=".$data['KullaniciID'];
            $s=Yii::app()->db->createCommand($sql)->queryAll();
            //$sonuc='Doğru: '.$s[0]['puan'].' Doğru: '.$s[0]['dogru_sayisi'].' Yanlış: '.$s[0]['yanlis_sayisi'];
            if($s) return $s[0]['puan'];
       }
       public function DogruCevap($data,$row)
       {
            $sql="select dogru_sayisi from kullanici_sinavlari where gorev_id=".$data['gorev_id']." and kullanici_id=".$data['KullaniciID'];
            $s=Yii::app()->db->createCommand($sql)->queryAll();
            if($s) return $s[0]['dogru_sayisi'];           
       }
       public function YanlisCevap($data,$row)
       {
            $sql="select yanlis_sayisi from kullanici_sinavlari where gorev_id=".$data['gorev_id']." and kullanici_id=".$data['KullaniciID'];
            $s=Yii::app()->db->createCommand($sql)->queryAll();
            if($s) return $s[0]['yanlis_sayisi'];           
       } 
       public function BasariHesapla($data,$row)
       {
            $sql="select durum,dogru_sayisi,yanlis_sayisi,soru_sayisi from kullanici_sinavlari where gorev_id=".$data['gorev_id']." and kullanici_id=".$data['KullaniciID'];
            $s=Yii::app()->db->createCommand($sql)->queryAll();
            if($s && $s[0]['durum']==1 && $s[0]['soru_sayisi']!=0)
              return (' % '.number_format ($s[0]['dogru_sayisi']/$s[0]['soru_sayisi']*100,2));              
       }
       public function SureHesapla($data,$row)
       {
           $sql="select baslama_tarihi,bitis_tarihi from kullanici_sinavlari where gorev_id=".$data['gorev_id']." and kullanici_id=".$data['KullaniciID'];
           $result=Yii::app()->db->createCommand($sql)->queryAll();
           if($result) {
            $baslangic=$result[0]['baslama_tarihi'];
            $bitis=$result[0]['bitis_tarihi'];
            $sure= strtotime($bitis)-strtotime($baslangic); 
            $dakika= floor($sure/60);
            $saniye=$sure%60;           
            return ($dakika.' dak. '.$saniye. ' san.');
           }
       }

       public function Durum($data,$row)
       {
            $sql="select durum from kullanici_sinavlari where gorev_id=".$data['gorev_id']." and kullanici_id=".$data['KullaniciID'];
            $s=Yii::app()->db->createCommand($sql)->queryAll();
            if($s[0]['durum']==0) return 'Aktif';
            else if($s[0]['durum']==1) return 'Pasif';           
       }

       public function actionSinavlar()
       {
            if(isset($_POST['kat_id']) && $_POST['kat_id']!=''){
                $kat_id=$_POST['kat_id'];
                $data=Sinavlar::model()->findAll(array('select'=>'id,sinav_adi','condition'=>'kat_id='.$kat_id));
                $data = CHtml::listData($data,'id','sinav_adi');
                echo CHtml::tag('option',array('value' => ''),
                CHtml::encode('Sınav Seçiniz'),true);
                foreach($data as $id => $value)
                {
                 echo CHtml::tag('option',array('value'=>$id),CHtml::encode($value),true);
                }    
            }

       }
	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);
                $katmodel=$this->loadKat($id);
                $sinavmodel=$this->loadSinav($id);
                $kullanicilar=new Kullanicilar;
                $kul=$kullanicilar->findAll();
                $kul=CHtml::listData($kul, 'KullaniciAdi', 'Ad','Soyad');
                $records = $katmodel->findAll();
                $list = CHtml::listData($records, 'id', 'kat_adi');
                $sql="select id,sinav_adi from sinavlar where kat_id=".$katmodel->id;
                $sin=yii::app()->db->createCommand($sql)->queryAll();
                //$sinavlar=Sinavlar::model()->findAll(array('select'=>'id,sinav_adi','condition'=>'kat_id='.$katmodel->id));
                $sinavlar = CHtml::listData($sin,'id','sinav_adi');
         
		if(isset($_POST['Gorevler']))
		{
			$model->attributes=$_POST['Gorevler'];
                        $kategori=$_POST['Kategoriler'];
			if($model->save()) {
                          Yii::app()->db->createCommand()->delete('kullanici_gorevleri','gorev_id=:id',array('id'=>$model->id));
                            if(isset($_POST['users'])) {
                                $kull=$_POST['users'];
                                foreach ($kull as $k) {
                                      Yii::app()->db->createCommand()->insert('kullanici_gorevleri', array(
                                        'gorev_id'=>$model->id,
                                        'kullanici_tipi'=>1,
                                        'kullanici_id'=>$k,
                                         'kat_id'=>$kategori['id'] 
                                       // 'baslama_tarihi'=>$_POST['']
                                       
                                    ));
                                }
                                
                            }
			$this->redirect(array('admin'));			
                            
                        }
		}

		$this->render('update',array(
			'model'=>$model,'kategori'=>$list,'katmodel'=>$katmodel,'sinavmodel'=>$sinavmodel,'kulmodel'=>$kullanicilar,'kul'=>$kul,'sinavlar'=>$sinavlar,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
               // $userID=Yii::app()->user->getState('KullaniciID');
                $this->loadModel($id)->delete();
               // Yii::app()->db->createCommand()->delete('gorevler', 'id=:id', array(':id' => $id));
                Yii::app()->db->createCommand()->delete('kullanici_gorevleri', 'gorev_id=:gorev_id', array(':gorev_id' => $id));
             //   Yii::app()->db->createCommand()->delete('kullanici_sinavlari', 'gorev_id=:gorev_id', array(':gorev_id' => $id));
		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
            
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Gorevler');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Gorevler('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Gorevler']))
			$model->attributes=$_GET['Gorevler'];

                $this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Gorevler the loaded model
	 * @throws CHttpException
	 */
	public function loadKat($id)
        {
            //$data=Sinavlar::model()->findAll(array('select'=>'id,sinav_id','condition'=>'id='.$id));
            //$data= Gorevler::model()->findByPk($id);
            $sql = "SELECT sinav_id FROM gorevler WHERE id=$id";
            $data = Yii::app()->db->createCommand($sql)->query();
            $data=$data->readAll();
            $sinav_id=$data[0]['sinav_id'];
            $sql = "SELECT kat_id FROM sinavlar WHERE id=$sinav_id";
            $data = Yii::app()->db->createCommand($sql)->query();
            $data=$data->readAll();
            $kat_id=$data[0]['kat_id'];   
            $model= Kategoriler::model()->findByPk($kat_id);
            if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
        }
        public function loadSinav($id)
        {
            $model= Gorevler::model()->findByPk($id);
            if($model===null)
                    throw new CHttpException(404,'The requested page does not exist.');
		return $model;
        }
        public function loadModel($id)
	{
		$model=Gorevler::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Gorevler $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='gorevler-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
