<?php

namespace app\modules\admin\controllers;

use app\modules\field\models\FieldType;
use yii\web\Controller;
use yii\filters\AccessControl;
use Yii;

class FieldController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['index', 'create'],
                        'allow' => true,
                        'roles' => ['root']
                    ],
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
        Yii::$app->user->setReturnUrl(['/admin/field']);

        return $this->render('index');
    }

    public function actionCreate()
    {
        Yii::$app->user->setReturnUrl(['/admin/field/create']);

        $model = new FieldType();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('field_flash', '<strong>Успешно добавлено поле:</strong> "'.$model->title.'".');

            return $this->redirect(['/admin/field/index']);
        }

        $types = [
            'string' => 'Строка',
            'textarea' => 'Краткий текст',
            'text' => 'Текст',
            'boolean' => 'Чекбокс',
            'image' => 'Изображение',
            'file' => 'Файл',
            'integer' => 'Число'
        ];

        $classes = [
            'app\modules\user\models\User' => 'Пользователь'
        ];

        return $this->render('create', [
            'model' => $model,
            'types' => $types,
            'classes' => $classes
        ]);
    }
}
