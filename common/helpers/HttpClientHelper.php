<?php

namespace common\helpers;

use yii\httpclient\Client;
use yii\httpclient\Exception;
use common\models\Checked;

class HttpClientHelper
{
    public static function runCheck($url, $repeat, $delay)
    {
        for ($i = 1; $i <= $repeat; $i++) {
            try {
                $client = new Client();
                $response = $client->createRequest()
                    ->setMethod('GET')
                    ->setUrl($url)
                    ->send();
                if ($response) {
                    $check = new Checked();
                    $check->url = $url;
                    $check->delay = $delay;
                    $check->status = $response->getStatusCode();
                    $check->attempt = $i;
                    $check->save();
                    echo \Yii::$app->session->setFlash('success', "Сайт " . $url . " успешно проверен");
                }
                if ($response->getStatusCode() < 399) {
                    break;
                } else {
                    sleep($delay);
                }
            } catch (Exception $e) {
                //echo \Yii::$app->session->setFlash('error', $e->getMessage());
                echo \Yii::$app->session->setFlash('error', "Сайт " . $url . " не существует или заблокирован Органами");
                continue;
            }
        }
    }
}