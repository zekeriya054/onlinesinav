<?php

/**
 * This is the model class for table "cevaplar".
 *
 * The followings are the available columns in table 'cevaplar':
 * @property integer $id
 * @property integer $soru_id
 * @property string $cevap_metni
 * @property integer $dogru_cevap
 * @property string $dogru_cevap_metni
 */
class Cevaplar extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'cevaplar';
	}

	/**
	 * @return array validation rules for model attributes.
	 */

	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('soru_id, dogru_cevap', 'required'),
			array('soru_id, dogru_cevap', 'numerical', 'integerOnly'=>true),
			array('cevap_metni, dogru_cevap_metni', 'length', 'max'=>800),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, soru_id, cevap_metni, dogru_cevap, dogru_cevap_metni', 'safe', 'on'=>'search'),
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
			'soru_id' => 'Soru ID',
			'cevap_metni' => 'Cevap Metni',
			'dogru_cevap' => 'Doğru Cevap',
			'dogru_cevap_metni' => 'Dogru Cevap Metni',
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
		$criteria->compare('soru_id',$this->soru_id);
		$criteria->compare('cevap_metni',$this->cevap_metni,true);
		$criteria->compare('dogru_cevap',$this->dogru_cevap);
		$criteria->compare('dogru_cevap_metni',$this->dogru_cevap_metni,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Cevaplar the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
