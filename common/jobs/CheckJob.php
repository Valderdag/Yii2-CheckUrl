<?php

namespace common\jobs;
use yii\httpclient\Client;
use yii\httpclient\Exception;
use backend\models\CheckForm;
use common\models\Checked;

    /**
 * Class CheckJob.
 */
class CheckJob extends \yii\base\BaseObject implements \yii\queue\RetryableJobInterface
{
    public $url;
    public $delay;
    public $attempt;

    /**
     * @inheritdoc
     */
    public function execute($queue)
    {
        for ($i = 1; $i <= $this->attempt; $i++) {
            try {
                $client = new Client();
                $response = $client->createRequest()
                    ->setMethod('GET')
                    ->setUrl($this->url)
                    ->send();
                if ($response) {
                    $check = new Checked();
                    $check->url = $this->url;
                    $check->delay = $this->delay;
                    $check->status = $response->getStatusCode();
                    $check->attempt = $i;
                    $check->save();
                }
                if ($response->getStatusCode() < 400) {
                    break;
                } else {
                    sleep($this->delay);
                }
            } catch (Exception $e) {
                continue;
            }
        }
    }

    /**
     * @inheritdoc
     */
   public function getTtr()
    {
        return 60;
    }

    /**
     * @inheritdoc
     */
    public function canRetry($attempt, $error)
    {
        return $attempt < 3;
    }
}
