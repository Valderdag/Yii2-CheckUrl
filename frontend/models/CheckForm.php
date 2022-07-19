<?php

namespace frontend\models;

use yii\base\Model;

class CheckForm extends Model
{
    public $url;
    public $repeat;
    public $timeout;

    public function rules(): array
    {
        return [
            [['url', 'repeat', 'timeout'], 'required'],
            ['url', 'url' ],
        ];
    }
    public function attributeLabels(): array
    {
        return [

        ];
    }
}