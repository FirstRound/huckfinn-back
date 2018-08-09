<?php

namespace app\modules\admin\assets;

use yii\web\AssetBundle;
use Yii;

class AdminAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';

    public $css = [
        '//fonts.googleapis.com/css?family=Roboto:300,400,400i,500,700',
        'css/admin/bootstrap.min.css',
        'css/admin/font-awesome.min.css'
    ];
    public $js = [
        'js/admin/bootstrap.min.js',

        'js/admin/jquery.dataTables.min.js',
        'js/admin/dataTables.bootstrap.min.js',
        'js/admin/dataTables.responsive.js',
        'js/admin/dropzone.js',

        'js/admin/adminnine.js',
        'js/admin/user.js',
        'js/admin/pages.js',
        'js/admin/faq.js',
        'js/admin/lineup.js'

    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];

    public function init()
    {
        parent::init();

        if (Yii::$app->user->isGuest) {
            $this->css[] = 'css/admin/adminnine_darkblue.css';
        }
        else {
            $user_theme = Yii::$app->cache->get('user_admin_theme_'.Yii::$app->user->id);
            if (!$user_theme) {
                $user_theme = Yii::$app->user->identity->field('theme');
                Yii::$app->cache->set('user_admin_theme_'.Yii::$app->user->id, $user_theme);
            }

            switch ($user_theme) {
                case 3: {
                    $this->css[] = 'css/admin/adminnine.css';
                    break;
                }
                case 4: {
                    $this->css[] = 'css/admin/adminnine_dark.css';
                    break;
                }
                case 2: {
                    $this->css[] = 'css/admin/adminnine_classic.css';
                    break;
                }
                default: {
                    $this->css[] = 'css/admin/adminnine_darkblue.css';
                    break;
                }
            }

        }
    }
}