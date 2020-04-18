<?php

/**
 * This is the model class for table "kullanicilar".
 *
 * The followings are the available columns in table 'kullanicilar':
 * @property integer $KullaniciID
 * @property string $KullaniciAdi
 * @property string $Sifre
 * @property string $Ad
 * @property string $Soyad
 * @property string $EklemeTarihi
 * @property integer $KullaniciTipi
 * @property string $eposta
 * @property integer $cinsiyet
 * @property string $sinif
 * @property string $sube
 */
class Kullanicilar extends CActiveRecord
{
        /**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'kullanicilar';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('KullaniciAdi, Sifre, Ad, Soyad, KullaniciTipi', 'required'),
			//array('KullaniciTipi', 'numerical', 'integerOnly'=>true),
			array('KullaniciAdi, Sifre', 'length', 'max'=>50),
			array('Ad, Soyad', 'length', 'max'=>150),
                        array('cinsiyet','numerical','integerOnly'=>true),
                        array('sinif,sube','length','max'=>10), 
			array('eposta', 'length', 'max'=>200),
                        array('EklemeTarihi', 'default', 'value'=>date('d-m-Y H:i:s')),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('KullaniciID, KullaniciAdi, Sifre, Ad, Soyad, EklemeTarihi, KullaniciTipi, eposta, cinsiyet', 'safe', 'on'=>'search'),
		);
	}
protected function afterFind()
{
    // Format dates based on the locale
/*
    foreach($this->metadata->tableSchema->columns as $columnName => $column)
    {           
        if (!strlen($this->$columnName)) continue;
 
        if ($column->dbType == 'date')
        { 
           /*
            $this->$columnName = Yii::app()->dateFormatter->formatDateTime(
                   
                    CDateTimeParser::parse(
                        $this->$columnName, 
                        'MM-dd-yyyy hh:mm:ss'
                    ),
                    'short',null
                );
            $this->EklemeTarihi= strftime("%d.%m.%Y %H:%M", strtotime($this->EklemeTarihi));
        }
        elseif ($column->dbType == 'datetime' || $column->dbType == 'timestamp')
        {
           /*
            $this->$columnName = Yii::app()->dateFormatter->formatDateTime(
                    CDateTimeParser::parse(
                        $this->$columnName, 
                        'MM-dd-yyyy hh:mm:ss'
                    ),
                    'short','short'
                );
            
            $this->EklemeTarihi= strftime("%d.%m.%Y %H:%M", strtotime($this->EklemeTarihi));
     
        }
     //   if ($column->name=='KullaniciTipi')  
      //      if($this->KullaniciTipi==1) $this->KullaniciTipi='admin'; else $this->KullaniciTipi='user';
       
    }
    return parent::afterFind();*/
}
   public function beforeSave()
        {
          if ($_POST['onay'])  $pass = md5($this->Sifre);
          else $pass=  $this->Sifre;
          $this->Sifre = $pass;
          return true;
        }
	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'KullaniciID' => 'Kullanıcı ID',
			'KullaniciAdi' => 'Kullanıcı Adı',
			'Sifre' => 'Şifre',
			'Ad' => 'Ad',
			'Soyad' => 'Soyad',
			'EklemeTarihi' => 'Ekleme Tarihi',
			'KullaniciTipi' => 'Kullanıcı Tipi',
			'eposta' => 'Eposta',
                        'sinif'=>'Sınıf',
                        'sube'=>'Şube',
                        'cinsiyet'=>'Cinsiyet'
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('KullaniciID',$this->KullaniciID);
		$criteria->compare('KullaniciAdi',$this->KullaniciAdi,true);
		$criteria->compare('Sifre',$this->Sifre,true);
		$criteria->compare('Ad',$this->Ad,true);
		$criteria->compare('Soyad',$this->Soyad,true);
		$criteria->compare('EklemeTarihi',$this->EklemeTarihi,true);
		$criteria->compare('KullaniciTipi',$this->KullaniciTipi);
		$criteria->compare('eposta',$this->eposta,true);
                
              if( Yii::app()->controller->id=='kullanicilar') $p=10; else $p=10000;
             //exit();
		return new CActiveDataProvider($this, array(
		'criteria'=>$criteria,    'Pagination' => array (
                'PageSize' => $p
              ),

		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Kullanicilar the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
