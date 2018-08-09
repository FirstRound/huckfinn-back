<?php

namespace app\controllers;

use app\components\api\SeoAPI;
use app\models\Info;
use app\models\Slider;
use app\modules\pages\api\PageAPI;
use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;

class SiteController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'mail-to' => ['post'],
                    'get-lineup-item' => ['post']
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    public $layout = 'page';


    public function actionIndex()
    {
        $page = PageAPI::page(1);

        $items = Slider::findAll(['slide' => 2]);

        SeoAPI::attachSeo($page);

        $this->layout = 'main';

        return $this->render('index', [
            'page' => $page,
            'items' => $items
        ]);
    }

    public function actionTickets()
    {
        $page = PageAPI::page(3);

        SeoAPI::attachSeo($page);

        return $this->render('tickets', [
            'page' => $page
        ]);
    }

    public function actionAttraction()
    {
        $page = PageAPI::page(4);

        SeoAPI::attachSeo($page);

        return $this->render('attractions', [
            'page' => $page
        ]);
    }

    public function actionRules()
    {
        $page = PageAPI::page(5);

        SeoAPI::attachSeo($page);

        return $this->render('page', [
            'page' => $page
        ]);
    }

    public function actionFaq()
    {
        $page = PageAPI::page(6);

        $faqs = Slider::findAll(['slide' => 1]);

        SeoAPI::attachSeo($page);

        return $this->render('faq', [
            'page' => $page,
            'faqs' => $faqs
        ]);
    }

    public function actionLineup()
    {
        $page = PageAPI::page(7);

        SeoAPI::attachSeo($page);

        return $this->render('lineup', [
            'page' => $page
        ]);
    }

    public function actionMap()
    {
        $page = PageAPI::page(9);

        SeoAPI::attachSeo($page);

        return $this->render('map', [
            'page' => $page
        ]);
    }

    public function actionMeet()
    {
        $page = PageAPI::page(10);

        SeoAPI::attachSeo($page);

        return $this->render('page', [
            'page' => $page
        ]);
    }

    public function actionTravel()
    {
        $page = PageAPI::page(11);

        SeoAPI::attachSeo($page);

        return $this->render('page', [
            'page' => $page
        ]);
    }

    public function actionCamping()
    {
        $page = PageAPI::page(12);

        SeoAPI::attachSeo($page);

        return $this->render('page', [
            'page' => $page
        ]);
    }

    public function actionVolunteer()
    {
        $page = PageAPI::page(13);

        SeoAPI::attachSeo($page);

        return $this->render('volunteer', [
            'page' => $page
        ]);
    }

    public function actionGetLineupItem() {
        $id = Yii::$app->request->post('id');
        $res = [];
        $item = Slider::findOne($id);
        if ($item) {
            $res['title'] = $item->title;
            $res['img'] = $item->image;
            $res['text'] = $item->text;
        }
        return json_encode($res);
    }

    public function actionMailTo() {
        $name = Yii::$app->request->post('name');
        $phone = Yii::$app->request->post('phone');
        $topic = Yii::$app->request->post('topic');

        $letter = '<html><body>';
        $letter = '<p>Клиент отправил заявку на лендинге <a href="http://'.$_SERVER['HTTP_HOST'].'" target="_blank">"Almaross"</a>.</p>';
        $letter .= '<p><strong>Имя:</strong> ' . $name . '</p>';
        $letter .= '<p><strong>Телефон:</strong> '.$phone.'</p>';
        $letter .= '</body></html>';

        $res['sent'] = false;
        $mail_to = Info::findOne(['key' => 'contact_email']);
        $mail_to = $mail_to->value;
        if (mail(/*$mail_to*/'artem_dw@mail.ru', $topic.' | Лендинг Almaross', $letter, 'Content-type: text/html; charset=utf-8')) {
            $res['sent'] = true;
        }
        return json_encode($res);
    }
}
