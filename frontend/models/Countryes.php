<?php

namespace frontend\models;
use yii\db\ActiveRecord;
// use Yii;
// use yii\base\Model;
// use common\models\countryes;

/**
 * Signup form
 */
class countryes extends ActiveRecord
{
    private $id;
    private $country_name;
    public function fetch(){
        // $cnt = countryes::find()->all();
        return [
            [['id', 'country_name'], 'required']
        ];
    }
}