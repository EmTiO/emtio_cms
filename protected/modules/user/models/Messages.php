<?php

/**
 * This is the model class for table "{{messages}}".
 *
 * The followings are the available columns in table '{{messages}}':
 * @property integer $id
 * @property string $author_id
 * @property string $receiver_id
 * @property string $data
 * @property integer $status
 * @property string $text
 * @property string $theme
 */
class Messages extends CActiveRecord
{
    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return Messages the static model class
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
        return '{{messages}}';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('receiver_id, text, theme', 'required'),
            array('status', 'numerical', 'integerOnly'=>true),
            array('author_id, receiver_id', 'length', 'max'=>15),
            array('theme', 'length', 'max'=>50),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, author_id, receiver_id, data, status, text, theme', 'safe', 'on'=>'search'),
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
            'author'=>array(self::BELONGS_TO, 'User', 'author_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        return array(
            'id' => 'ID',
            'author_id' => 'Author',
            'receiver_id' => 'Receiver',
            'data' => 'Data',
            'status' => 'Status',
            'text' => 'Text',
            'theme' => 'Theme',
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
        $criteria->compare('author_id',$this->author_id,true);
        $criteria->compare('receiver_id',$this->receiver_id,true);
        $criteria->compare('data',$this->data,true);
        $criteria->compare('status',$this->status);
        $criteria->compare('text',$this->text,true);
        $criteria->compare('theme',$this->theme,true);

        return new CActiveDataProvider($this, array(
            'criteria'=>$criteria,
        ));
    }
}