<?php 

namespace app\modules\api1\models;

use yii\db\ActiveRecord;

class Log extends ActiveRecord
{
    public static function tableName()
    {
        return '{{logs}}';
    }

    public function rules()
    {
        return [
            [['url', 'datetime'], 'required'],
            [['url', 'datetime'], 'string'],
        ];
    }
}