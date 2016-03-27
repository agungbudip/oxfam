<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ForgotForm;
use app\components\AccessRule;

class SiteController extends Controller {

    public function behaviors() {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'ruleConfig' => [
                    'class' => AccessRule::className(),
                ],
                'only' => ['logout', 'index', 'profile'],
                'rules' => [
                    [
                        'actions' => ['logout', 'index', 'profile'],
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

    public function actions() {
        return [
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    public function actionError() {
        $this->layout = 'login';
        $exception = Yii::$app->errorHandler->exception;
        if ($exception !== null) {
            return $this->render('error', ['exception' => $exception]);
        }
    }

    public function actionIndex() {
        $role = Yii::$app->user->identity->role;
        switch ($role) {
            case 'superadmin':
                return $this->render('index');
            case 'admin':
                return $this->render('index');
        }
    }

    public function actionLogin() {
        $this->layout = 'login';

        if (!\Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();

        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        return $this->render('login', [
                    'model' => $model,
        ]);
    }

    public function actionForgotpassword() {
        $this->layout = 'login';
        if (!\Yii::$app->user->isGuest) {
            return $this->goHome();
        }
        $model = new ForgotForm();

        if ($model->load(Yii::$app->request->post())) {
            Yii::$app->getSession()->setFlash('success', 'Silahkan periksa email anda');
        }

        return $this->render('forgot', [
                    'model' => $model,
        ]);
    }

    public function actionLogout() {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    public function actionProfile() {
        $id = Yii::$app->user->id;
        $model = \app\models\Pengguna::findIdentity($id);

        if (count($model) == 0) {
            return $this->goHome();
        }
        $pass = $model->password;
        $model->password = '';

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $model->file = \yii\web\UploadedFile::getInstance($model, 'file');
            $model->upload();
            if (is_null($model->password)) {
                $model->password = $pass;
            } else {
                $model->password = md5($model->password);
            }
            if ($model->save()) {
                Yii::$app->getSession()->setFlash('success', 'Data berhasil di ubah');
                $this->redirect(['site/profile']);
                Yii::$app->end();
            } else {
                Yii::$app->getSession()->setFlash('success', 'Data gagal di ubah');
            }
        }

        echo $this->render('profile', ['model' => $model]);
    }

}
