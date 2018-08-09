<?php

namespace app\modules\admin\controllers;

use app\components\api\SocAPI;
use app\models\Slider;
use app\modules\pages\api\PageAPI;
use app\modules\pages\models\DataForm;
use app\modules\pages\models\Page;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use Yii;
use yii\filters\AccessControl;
use yii\web\HttpException;
use yii\filters\VerbFilter;
use app\modules\admin\models\Log;


class FaqController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['index'],
                        'allow' => true,
                        'roles' => ['viewInfo']
                    ],
                    [
                        'actions' => ['create', 'update'],
                        'allow' => true,
                        'roles' => ['createUpdateInfo']
                    ],
                    [
                        'actions' => ['delete'],
                        'allow' => true,
                        'roles' => ['deleteInfo']
                    ]
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post']
                ],
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
        $faqs = Slider::findAll(['slide' => 1]);

        return $this->render('index', [
            'faqs' => $faqs
        ]);
    }

    public function actionCreate() {
        $model = new Slider();

        $model->slide = 1;

        if ($model->load(Yii::$app->request->post())) {
            if ($model->save()) {
                Yii::$app->session->setFlash('faqs_flash', '<strong>Succesfully created: </strong>"' . $model->title . '".');
                return $this->redirect(['/admin/faq/index']);
            }
        }

        return $this->render('create', [
            'model' => $model
        ]);
    }

    public function actionUpdate($id) {
        $model = Slider::findOne($id);

        if ($model->load(Yii::$app->request->post())) {
            if ($model->save()) {
                Yii::$app->session->setFlash('faqs_flash', '<strong>Successfully edited: </strong>"' . $model->title . '".');

                return $this->redirect(['/admin/faq/index']);
            }
        }

        return $this->render('update', [
            'model' => $model
        ]);
    }
    
    public function actionDelete() {
        $id = Yii::$app->request->post('id');
        $item = Slider::findOne($id);
        $name = $item->title;
        if ($item->delete()) {
            Yii::$app->session->setFlash('faqs_flash', '<strong>Question "'.$name.'" has been successfully deleted.</strong>');
            return true;
        }
        Yii::$app->session->setFlash('faqs_flash', '<strong>Question: "'.$name.'" has not been deleted...</strong>');
    }
}
