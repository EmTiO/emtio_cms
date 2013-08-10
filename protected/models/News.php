<?php

/**
 * This is the model class for table "news".
 *
 * The followings are the available columns in table 'news':
 * @property integer $id
 * @property string $title
 * @property string $introtext
 * @property string $fulltext
 * @property string $created
 * @property string $author
 * @property string $img_url
 * @property string $category_id
 * @property integer $access
 */
class News extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return News the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_news';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('title, introtext, fulltext, author, category_id','required'),
			array('access', 'numerical', 'integerOnly'=>true),
			array('title', 'length', 'max'=>255),
			array('created, author, img_url', 'length', 'max'=>40),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, title, introtext, fulltext, created, author, img_url, category_id, access', 'safe', 'on'=>'search'),
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
                    'category'=>array(self::BELONGS_TO,'Category','category_id')
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'title' => 'Титул',
			'introtext' => 'Вводный текст',
			'fulltext' => 'Полный текст',
			'created' => 'Дата создания',
			'author' => 'Автор',
			'img_url' => 'Адрес ссылки',
                        'category_id'=>'Категория',
			'access' => 'Доступ',
                        'views' => 'Просмотров',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('introtext',$this->introtext,true);
		$criteria->compare('fulltext',$this->fulltext,true);
		$criteria->compare('created',$this->created,true);
		$criteria->compare('author',$this->author,true);
		$criteria->compare('img_url',$this->img_url,true);
                $criteria->compare('category_id',$this->category_id,true);
		$criteria->compare('access',$this->access);
                $criteria->compare('views',$this->views);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
        
        
}