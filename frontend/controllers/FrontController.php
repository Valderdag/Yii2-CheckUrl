<?php

namespace frontend\controllers;

use frontend\models\CheckForm;
use yii\web\Controller;

class FrontController extends Controller
{
    public function actionIndex(){
        $model = new CheckForm();
        return $this->render('index', ['model' => $model]);
    }
}