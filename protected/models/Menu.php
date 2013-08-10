<?php

/**
 * This is the model class for table "menu".
 *
 * The followings are the available columns in table 'menu':
 * @property integer $id
 * @property string $type
 * @property string $title
 * @property integer $position
 * @property string $url
 * @property integer $access
 */
class Menu extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Menu the static model class
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
		return 'tbl_menu';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('type, title, position, url, access', 'required'),
			array('position, access', 'numerical', 'integerOnly'=>true),
			array('type, title', 'length', 'max'=>20),
			array('url', 'length', 'max'=>40),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, type, title, position, url, access', 'safe', 'on'=>'search'),
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
			'type' => 'Тип меню',
			'title' => 'Название',
			'position' => 'Позиция',
			'url' => 'Url',
			'access' => 'Доступ',
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
		$criteria->compare('type',$this->type,true);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('position',$this->position);
		$criteria->compare('url',$this->url,true);
		$criteria->compare('access',$this->access);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
        public function getMenu($type) {
                $menu=array();
                $model= Menu::model()->findAllByAttributes(array('type'=>$type),$params=array('order'=>'position asc'));
                foreach($model as $row) {
                    $menu[] = array(
                        'label' => $row->title,
                        'url' => array($row->url),
                        'visible' => $row->access,
            );
        }
            return $menu;
        }
}