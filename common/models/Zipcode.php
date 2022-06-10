<?php

namespace common\models;

// use Yii;
// use yii\base\NotSupportedException;
// use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
// use yii\web\IdentityInterface;

class zipcode extends ActiveRecord 
{
    const STATUS_DELETED = 0;
    const STATUS_INACTIVE = 9;
    const STATUS_ACTIVE = 10;


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%zipcode}}';
    }
}