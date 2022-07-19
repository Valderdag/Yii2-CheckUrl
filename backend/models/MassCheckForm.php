<?php

namespace backend\models;
use yii\base\Model;

class MassCheckForm extends Model
{
    public $listurl = '';

    public function rules(): array
    {

        return [
           /* [['url', 'repeat', 'timeout'], 'required'],
            ['url', 'url' ],*/
            ['listurl', 'required'],
        ];
    }
    public function attributeLabels(): array
    {
        return [

        ];
    }
}