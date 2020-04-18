<?php

/**
 * This is the model class for table "sorular".
 *
 * The followings are the available columns in table 'sorular':
 * @property integer $id
 * @property string $soru
 * @property integer $soru_tipi
 * @property integer $oncelik
 * @property integer $sinav_id
 * @property string $puan
 * @property string $ekleme_tarihi
 * @property integer $parent_id
 * @property string $question_total
 * @property integer $check_total
 * @property string $ust_metin
 * @property string $alt_metin
 * @property string $question_text_eng
 * @property string $help_image
 */
class Sorular extends CActiveRecord
{
    public $s_id;	
    /**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'sorular';
	}


 /**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('soru,soru_tipi,puan', 'required'),
			array('soru_tipi, oncelik, sinav_id, parent_id, check_total', 'numerical', 'integerOnly'=>true),
			array('soru', 'length', 'max'=>3800),
			array('puan, question_total', 'length', 'max'=>18),
			array('ust_metin, alt_metin', 'length', 'max'=>1500),
			array('question_text_eng', 'length', 'max'=>1800),
			array('help_image', 'length', 'max'=>550),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, soru, soru_tipi, oncelik, sinav_id, puan, ekleme_tarihi, parent_id, question_total, check_total, ust_metin, alt_metin, question_text_eng, help_image', 'safe', 'on'=>'search'),
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
			'soru' => 'Soru',
			'soru_tipi' => 'Soru Tipi',
			'oncelik' => 'Öncelik',
			'sinav_id' => 'Sınav ID',
			'puan' => 'Puan',
			'ekleme_tarihi' => 'Ekleme Tarihi',
			'parent_id' => 'Parent',
			'question_total' => 'Question Total',
			'check_total' => 'Check Total',
			'ust_metin' => 'Üst Metin',
			'alt_metin' => 'Alt Metin',
			'question_text_eng' => 'Question Text Eng',
			'help_image' => 'Help Image',
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
		$criteria->compare('soru',$this->soru,true);
		$criteria->compare('soru_tipi',$this->soru_tipi);
		$criteria->compare('oncelik',$this->oncelik);
		$criteria->compare('sinav_id',$this->s_id);
		$criteria->compare('puan',$this->puan,true);
		$criteria->compare('ekleme_tarihi',$this->ekleme_tarihi,true);
		$criteria->compare('parent_id',$this->parent_id);
		$criteria->compare('question_total',$this->question_total,true);
		$criteria->compare('check_total',$this->check_total);
		$criteria->compare('ust_metin',$this->ust_metin,true);
		$criteria->compare('alt_metin',$this->alt_metin,true);
		$criteria->compare('question_text_eng',$this->question_text_eng,true);
		$criteria->compare('help_image',$this->help_image,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}


	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Sorular the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
