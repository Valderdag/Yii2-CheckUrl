<?php

namespace backend\controllers;

use backend\models\MassCheckForm;
use common\models\Checked;
use common\models\LoginForm;
use common\models\User;
use JetBrains\PhpStorm\ArrayShape;
use Yii;
use yii\db\Query;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;

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
    #[ArrayShape(['error' => "string[]"])] public function actions()
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
        $model = new MassCheckForm();

        return $this->render('index', compact('model'));
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
        return $this->render('checkinfo' , ['infos' => $infos]);
    }

}
