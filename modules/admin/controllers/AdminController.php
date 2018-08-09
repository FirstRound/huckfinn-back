<?php

namespace app\modules\admin\controllers;

use yii\web\Controller;
use yii\filters\AccessControl;
use Yii;
use app\modules\user\models\LoginForm;
use app\models\Info;
use app\models\EquipmentForm;

/**
 * Default controller for the `admin` module
 */
class AdminController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['error'],
                        'allow' => true
                    ],
                    [
                        'actions' => ['login'],
                        'allow' => true,
                        'roles' => ['?']
                    ],
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@']
                    ],
                    [
                        'actions' => ['index', 'clear'],
                        'allow' => true,
                        'roles' => ['accessAdmin']
                    ],
                ],
            ],
        ];
    }

    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
                'view' => '@app/modules/admin/views/admin/error.php'
            ],
        ];
    }

    public function beforeAction($action)
    {

        Yii::$app->view->registerMetaTag(['name' => 'robots', 'content' => 'noindex,nofollow']);

        return parent :: beforeAction($action);
    }

    public function actionIndex()
    {
        Yii::$app->cache->flush();
        Yii::$app->user->setReturnUrl(['/admin']);

        $eqs = Info::find()->where(['slide' => 0])->all();

        $model = new EquipmentForm();

        if ($model->load(Yii::$app->request->post()) && $model->setInfo()) {
            Yii::$app->session->setFlash('info_flash', '<strong>Успешно сохранено.</strong>');

            $eqs = Info::find()->where(['slide' => 0])->all();

            $model = new EquipmentForm();
        }

        $model->readInfo($eqs);

        return $this->render('index', [
            'eqs' => $eqs,
            'model' => $model
        ]);
    }

    public function actionClear() {
        Yii::$app->cache->flush();

        return $this->goBack();
    }

    public function actionLogin() {
        $this->layout = false;

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            /*$log = new Log();
            $log->action = 'enter';
            $log->user_ip = Yii::$app->request->userIP;
            $log->user_agent = Yii::$app->request->userAgent;
            $log->user_id = Yii::$app->user->id;
            $log->save();*/
            return $this->goBack();
        }

        return $this->render('login', [
            'model' => $model
        ]);
    }

    public function actionLogout() {
        if (!Yii::$app->user->isGuest) {
            Yii::$app->user->logout();
        }

        return $this->redirect(['index']);
    }
}
