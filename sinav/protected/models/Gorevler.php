<?php

/**
 * This is the model class for table "gorevler".
 *
 * The followings are the available columns in table 'gorevler':
 * @property integer $id
 * @property integer $sinav_id
 * @property integer $sonuc_modu
 * @property string $baslama_tarihi
 * @property integer $sinav_suresi
 * @property integer $sonuclari_goster
 * @property string $basari_puani
 * @property integer $sinav_tipi
 * @property integer $durum
 * @property string $bitis_tarihi
 */
class Gorevler extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'gorevler';
	}
      public $isaret;
	/**
	 * @return array validation rules for model attributes.
	 */
        
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('bitis_tarihi,bitis_tarihi,sinav_suresi,basari_puani', 'required'),
			array('sinav_id, sinav_suresi', 'numerical', 'integerOnly'=>true),
			array('basari_puani', 'length', 'max'=>10),
			array('baslama_tarihi', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, sinav_id,  baslama_tarihi, sinav_suresi, basari_puani, bitis_tarihi', 'safe', 'on'=>'search'),
		);
	}
protected function afterFind()
{
    // Format dates based on the locale

    foreach($this->metadata->tableSchema->columns as $columnName => $column)
    {           
        if (!strlen($this->$columnName)) continue;
       /*
        if ($column->name=='sinav_id') {
            $sinav=Sinavlar::model()->findByPk($this->sinav_id);
            $this->sinav_id=$sinav->sinav_adi;
        }
*/
       //     if($this->KullaniciTipi==1) $this->KullaniciTipi='admin'; else $this->KullaniciTipi='user';
         
        
    
    }

            $this->baslama_tarihi=strftime("%d.%m.%Y %H:%M", strtotime($this->baslama_tarihi));
            $this->bitis_tarihi=strftime("%d.%m.%Y %H:%M", strtotime($this->bitis_tarihi)); 
            return parent::afterFind();
}
protected function beforeSave()
{ 
     $this->baslama_tarihi=strftime("%Y.%m.%d %H:%M", strtotime($this->baslama_tarihi)); 
     $this->bitis_tarihi=strftime("%Y.%m.%d %H:%M", strtotime($this->bitis_tarihi));
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
                     
			'id' => 'ID',
			'sinav_id' => 'Sınav',
			//'sonuc_modu' => 'Sonuç Modu',
			'baslama_tarihi' => 'Başlama Tarihi',
			'sinav_suresi' => 'Sınav Süresi',
			//'sonuclari_goster' => 'Sonuçları Göster',
			'basari_puani' => 'Başari Puanı',
			//'sinav_tipi' => 'Sınav Tipi',
			//'durum' => 'Durum',
			'bitis_tarihi' => 'Bitiş Tarihi',
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

		$criteria->compare('id',$this->id);
		$criteria->compare('sinav_id',$this->sinav_id);
		//$criteria->compare('sonuc_modu',$this->sonuc_modu);
		$criteria->compare('baslama_tarihi',$this->baslama_tarihi,true);
		$criteria->compare('sinav_suresi',$this->sinav_suresi);
		//$criteria->compare('sonuclari_goster',$this->sonuclari_goster);
		$criteria->compare('basari_puani',$this->basari_puani,true);
		//$criteria->compare('sinav_tipi',$this->sinav_tipi);
		//$criteria->compare('durum',$this->durum);
		$criteria->compare('bitis_tarihi',$this->bitis_tarihi,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
              
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Gorevler the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
