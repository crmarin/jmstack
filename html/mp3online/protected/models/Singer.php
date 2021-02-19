<?php

/**
 * This is the model class for table "singer".
 *
 * The followings are the available columns in table 'singer':
 * @property integer $singer_id
 * @property string $singer_name
 * @property string $singer_img
 * @property string $profile
 * @property integer $status
 * @property integer $order_number
 */
class Singer extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'singer';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
    public $name_vi;
    public $profile_vi;
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('singer_name', 'required'),
			array('status, order_number', 'numerical', 'integerOnly'=>true),
			array('singer_name,profile', 'length', 'max'=>255),
			array('singer_img', 'file', 'allowEmpty' => true, 'types' => 'jpg,jpeg,gif,png', 'maxSize' => 1024 * 1024 * 1, 'on'=>'update'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('singer_id, singer_name, singer_img, profile, status, order_number', 'safe', 'on'=>'search'),
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
			'singer_id' => 'ID',
			'singer_name' => 'Name',
			'singer_img' => 'Image',
			'profile' => 'Profile',
			'status' => 'Status',
            'order_number' => 'Order Number'
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

		$criteria->compare('singer_id',$this->singer_id);
		$criteria->compare('singer_name',$this->singer_name,true);
		$criteria->compare('singer_img',$this->singer_img,true);
		$criteria->compare('profile',$this->profile,true);
		$criteria->compare('status',$this->status,true);
        $criteria->compare('order_number',$this->order_number,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
            'sort'=>array(
                'defaultOrder'=> 'order_number DESC,singer_id DESC'
            )
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Singer the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
    public static function itemAlias($type,$code=NULL) {
        $_items = array(
            'status' => array(
                '0' => 'Inactive',
                '1' => 'Active',
            ),
        );
        if (isset($code))
            return isset($_items[$type][$code]) ? $_items[$type][$code] : false;
        else
            return isset($_items[$type]) ? $_items[$type] : false;
    }
}
