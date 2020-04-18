<?php

/**
 * This is the model class for table "kullanici_cevaplari".
 *
 * The followings are the available columns in table 'kullanici_cevaplari':
 * @property integer $id
 * @property integer $kullanici_sinav_id
 * @property integer $soru_id
 * @property integer $cevap_id
 * @property integer $kullanici_cevap_id
 * @property string $cevap_metni
 * @property string $kullanici_cevap_metni
 * @property string $ekleme_tarihi
 */
class KullaniciCevaplari extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'kullanici_cevaplari';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('kullanici_sinav_id, soru_id, cevap_id, kullanici_cevap_id', 'numerical', 'integerOnly'=>true),
			array('cevap_metni, kullanici_cevap_metni', 'length', 'max'=>3800),
			array('ekleme_tarihi', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, kullanici_sinav_id, soru_id, cevap_id, kullanici_cevap_id, cevap_metni, kullanici_cevap_metni, ekleme_tarihi', 'safe', 'on'=>'search'),
		);
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
			'kullanici_sinav_id' => 'Kullanici Sinav',
			'soru_id' => 'Soru',
			'cevap_id' => 'Cevap',
			'kullanici_cevap_id' => 'Kullanici Cevap',
			'cevap_metni' => 'Cevap Metni',
			'kullanici_cevap_metni' => 'Kullanici Cevap Metni',
			'ekleme_tarihi' => 'Ekleme Tarihi',
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
		$criteria->compare('kullanici_sinav_id',$this->kullanici_sinav_id);
		$criteria->compare('soru_id',$this->soru_id);
		$criteria->compare('cevap_id',$this->cevap_id);
		$criteria->compare('kullanici_cevap_id',$this->kullanici_cevap_id);
		$criteria->compare('cevap_metni',$this->cevap_metni,true);
		$criteria->compare('kullanici_cevap_metni',$this->kullanici_cevap_metni,true);
		$criteria->compare('ekleme_tarihi',$this->ekleme_tarihi,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return KullaniciCevaplari the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
