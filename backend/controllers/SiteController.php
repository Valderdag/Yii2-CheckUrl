<?php

namespace backend\controllers;

use backend\models\CheckForm;
use common\models\Checked;
use common\models\LoginForm;
use common\models\User;
use Yii;
use yii\db\Query;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use common\helpers\HttpClientHelper;
use common\jobs\CheckJob;

/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    #[ArrayShape(['access' => "array", 'verbs' => "array"])] public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['login', 'error'],
                        'allow' => true,
                    ],
                    [
                        'actions' => ['logout', 'index', 'users', 'checked', 'checkinfo'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex(): string
    {
        $model = new CheckForm();
        if ($model->load(\Yii::$app->request->post()) && $model->validate()) {
            $urls = explode(',', $model->listurl);
            foreach ($urls as $url){
                Yii::$app->queue->push(new CheckJob([
                    'url' => $url,
                    'delay' => $model->delay,
                    'attempt' => $model->attempt,
                ]));
            }

        }
       return $this->render('index', ['model' => $model]);
    }

    /**
     * Login action.
     *
     * @return string|Response
     */
    public function actionLogin(): Response|string
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $this->layout = 'blank';

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        $model->password = '';

        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout(): Response
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Users action
     * @return string
     * *
     */
    public function actionUsers(): string
    {
        $users = User::find()->all();

        return $this->render('users', ['users' => $users]);
    }

    /**
     * Check Links action
     * @return string
     */
    public function actionChecked(): string
    {
        $checked = Checked::find()->select('url', 'DISTINCT')->all();

        return $this->render('checked', compact('checked'));

    }

    public function actionCheckinfo($url): string
    {
        $infos = Checked::find()->where(['url' => $url])->all();
        return $this->render('checkinfo', ['infos' => $infos]);
    }

}
