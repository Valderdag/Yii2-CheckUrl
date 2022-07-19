<?php

namespace common\models;

use yii\db\ActiveRecord;

class Checked extends ActiveRecord
{
    public static function tableName(): string
    {
        return '{{%checked}}';
    }
}