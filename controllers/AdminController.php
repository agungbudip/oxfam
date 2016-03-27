<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\components\AccessRule;

class AdminController extends Controller {

    public function behaviors() {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'ruleConfig' => [
                    'class' => AccessRule::className(),
                ],
                'only' => ['index', 'manage', 'add', 'edit', 'delete'],
                'rules' => [
                    [
                        'actions' => ['index', 'manage', 'add', 'edit'],
                        'allow' => true,
                        'roles' => ['superadmin'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    public function actionIndex() {
        $this->redirect(['admin/manage']);
    }

    public function actionManage() {
        Yii::$app->getSession()->setFlash('menu', 'admin');

        $search = '';
        $show = 10;
        $page = 1;
        $order = '';
        $total = 0;
        $totalpage = 0;

        if (isset($_GET['search'])) {
            $search = $_GET['search'];
        }
        if (isset($_GET['show'])) {
            $show = $_GET['show'];
        }
        if (isset($_GET['page'])) {
            $page = $_GET['page'];
        }
        if (isset($_GET['order'])) {
            $order = $_GET['order'];
        }

        if (isset($_POST['id'])) {
            $ids = $_POST['id'];
            $pengguna = \app\models\Pengguna::deleteAll(['IN', 'id', $ids]);
            $this->refresh();
        }

        if (isset($_POST['hapus'])) {
            $id = $_POST['hapus'];
            $model = \app\models\Pengguna::findOne($id);
            if ($model->delete()) {
                Yii::$app->getSession()->setFlash('success', 'Data berhasil di hapus');
            } else {
                Yii::$app->getSession()->setFlash('success', 'Data gagal di hapus');
            }
            $this->redirect(['admin/manage']);
        }

        $query = \app\models\Pengguna::find()
                ->where(['role' => 'admin'])
                ->andFilterWhere([
                    'or',
                    ['like', 'nama', $search],
                    ['like', 'email', $search],
                    ['like', 'tim', $search],
                    ['like', 'nomor_telpon', $search]
                ])
                ->orderBy($order);

        $total = $query->count();
        $totalpage = ceil($total / $show);
        $query = $query
                ->limit($show)
                ->offset(($page - 1) * $show);
        $model = $query->all();

        return $this->render('index', [
                    'search' => $search,
                    'show' => $show,
                    'page' => $page,
                    'order' => $order,
                    'total' => $total,
                    'totalpage' => $totalpage,
                    'model' => $model
        ]);
    }

    public function actionAdd() {
        Yii::$app->getSession()->setFlash('menu', 'admin');
        $model = new \app\models\Pengguna();
        $model->role = 'admin';
        $model->gambar = '/img/avatar5.png';
        $model->scenario = 'insert';
        $list_tim = \yii\helpers\ArrayHelper::map(\app\models\Tim::find()->all(), 'tim', 'tim');

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $model->file = \yii\web\UploadedFile::getInstance($model, 'file');
            $model->upload();
            $model->password = md5($model->password);
            if ($model->save()) {
                Yii::$app->getSession()->setFlash('success', 'Data berhasil di buat');
                $this->redirect(['admin/manage']);
            } else {
                Yii::$app->getSession()->setFlash('success', 'Data gagal di ubah');
            }
        }

        return $this->render('add', ['model' => $model, 'list_tim' => $list_tim]);
    }

    public function actionEdit($id) {
        Yii::$app->getSession()->setFlash('menu', 'admin');
        $model = \app\models\Pengguna::findOne($id);
        $pass = $model->password;
        $model->password = '';
        $list_tim = \yii\helpers\ArrayHelper::map(\app\models\Tim::find()->all(), 'tim', 'tim');

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
                $this->redirect(['admin/manage']);
            } else {
                Yii::$app->getSession()->setFlash('success', 'Data gagal di ubah');
            }
        }

        return $this->render('add', ['model' => $model, 'list_tim' => $list_tim]);
    }

}
