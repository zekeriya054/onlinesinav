<?php

/**
 * This is the model class for table "sinavlar".
 *
 * The followings are the available columns in table 'sinavlar':
 * @property integer $id
 * @property integer $kat_id
 * @property string $sinav_adi
 * @property string $sinav_tanimi
 * @property string $ekleme_tarihi
 * @property integer $parent_id
 * @property integer $acilis_mesaji_g
 * @property string $acilis_mesaji
 */
class Sinavlar extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'sinavlar';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
protected function afterFind()
{
    // Format dates based on the locale

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
                );*/
            $this->ekleme_tarihi= strftime("%d.%m.%Y %H:%M", strtotime($this->ekleme_tarihi));
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
                );*/
            
            $this->ekleme_tarihi= strftime("%d.%m.%Y %H:%M", strtotime($this->ekleme_tarihi));
     
        }
       // if ($column->name=='KullaniciTipi')  
       //     if($this->KullaniciTipi==1) $this->KullaniciTipi='admin'; else $this->KullaniciTipi='user';
       
    }
    return parent::afterFind();
}
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('kat_id, sinav_adi,', 'required'),
			array('kat_id, parent_id, acilis_mesaji_g', 'numerical', 'integerOnly'=>true),
			array('sinav_adi, sinav_tanimi', 'length', 'max'=>500),
			array('acilis_mesaji', 'length', 'max'=>3850),
                        array('ekleme_tarihi','default', 'value'=>date('Y-m-d H:i:s')),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, kat_id, sinav_adi, sinav_tanimi, ekleme_tarihi, parent_id, acilis_mesaji_g, acilis_mesaji', 'safe', 'on'=>'search'),
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
			'kat_id' => 'Kategori',
			'sinav_adi' => 'Sınav Adı',
			'sinav_tanimi' => 'Sınav Tanımı',
			'ekleme_tarihi' => 'Ekleme Tarihi',
			'parent_id' => 'Parent',
			'acilis_mesaji_g' => 'Sınava başlama mesajinı göster',
			'acilis_mesaji' => 'Sınav Mesajı',
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
		$criteria->compare('kat_id',$this->kat_id);
		$criteria->compare('sinav_adi',$this->sinav_adi,true);
		$criteria->compare('sinav_tanimi',$this->sinav_tanimi,true);
		$criteria->compare('ekleme_tarihi',$this->ekleme_tarihi,true);
		$criteria->compare('parent_id',$this->parent_id);
		$criteria->compare('acilis_mesaji_g',$this->acilis_mesaji_g);
		$criteria->compare('acilis_mesaji',$this->acilis_mesaji,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Sinavlar the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
        
}
