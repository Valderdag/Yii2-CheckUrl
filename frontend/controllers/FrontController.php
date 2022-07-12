<?php

namespace frontend\controllers;
use common\helpers\HttpClientHelper;
use frontend\models\CheckForm;
use yii\web\Controller;

class FrontController extends Controller
{
    public function actionIndex(){
        $model = new CheckForm();
        if ($model->load(\Yii::$app->request->post()) && $model->validate()) {
            $url = $model->url;
            $rp =  $model->repeat;
            $tm =  $model->timeout;
            HttpClientHelper::runCheck($url, $rp, $tm);
            $this->refresh();
        } else {
            return $this->render('index', ['model' => $model]);
        }
    }
}