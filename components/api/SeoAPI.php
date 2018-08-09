<?php

namespace app\components\api;

use yii\base\Object;
use Yii;

class SeoAPI extends Object
{
    public static function attachSeo($obj) {
        $obj->seo('description') ? Yii::$app->view->registerMetaTag(['name' => 'description', 'content' => $obj->seo('description')]) : null;
        $obj->seo('keywords') ? Yii::$app->view->registerMetaTag(['name' => 'keywords', 'content' => $obj->seo('keywords')]) : null;
        //Yii::$app->view->registerMetaTag(['name' => 'robots', 'content' => $obj->seo('robots')]);
    }
}
