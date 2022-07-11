<?php

namespace frontend\models;

use yii\base\Model;

class CheckForm extends Model
{
    public $url;
    public $repeat;
    public $timeout;

    public function rules(){
        return [
            [['url', 'repeat', 'timeout'], 'required'],
            ['url', 'url' ],
        ];
    }
    public function attributeLabels(){
        return [

        ];
    }
}