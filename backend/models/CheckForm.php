<?php

namespace backend\models;
use yii\base\Model;

class CheckForm extends Model
{
    public $listurl;
    public $attempt;
    public $delay;

    public function rules(): array
    {

        return [
           /* [['url', 'repeat', 'timeout'], 'required'],
            ['url', 'url' ],*/
            [['listurl', 'attempt', 'delay'], 'required'],
        ];
    }
    public function attributeLabels(): array
    {
        return [
            'listurl' => 'Список урлов через запятую',
             'attempt' => 'Количество повторов',
             'delay' => 'Задержка поторного запроса',
        ];
    }
}