<?php

namespace frontend\models;

use yii\base\Model;

class CheckForm extends Model
{
    public $url;
    public $attempt;
    public $delay;

    public function rules(): array
    {
        return [
            [['url', 'attempt', 'delay'], 'required'],
            ['url', 'url' ],
        ];
    }
    public function attributeLabels(): array
    {
        return [

        ];
    }
}