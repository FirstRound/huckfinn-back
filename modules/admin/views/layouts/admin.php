<?php

use app\modules\admin\assets\AdminAsset;
use yii\helpers\Html;
use yii\helpers\Url;
use app\components\api\AccessAPI;

AdminAsset::register($this);

$this->registerCss("

    @keyframes clockwise {
      to {
        transform: rotate(360deg) translatez(0);
      }
    }
    @-webkit-keyframes clockwise {
      to {
        transform: rotate(360deg) translatez(0);
      }
    }
    @keyframes counter-clockwise {
      to {
        transform: rotate(-360deg) translatez(0);
      }
    }
    @-webkit-keyframes counter-clockwise {
      to {
        transform: rotate(-360deg) translatez(0);
      }
    }
    
    .multi {
        width: 50px;
        height: 50px;
        border-width: 5px;
        border-style: solid;
        border-color: transparent rgba(229, 118, 43, 0.25) transparent rgba(229, 118, 43, 0.5);
        border-radius: 100%;
        animation: clockwise 1.01s linear infinite;
        animation-play-state: running;
        margin: auto;
    }
    .multi:after {
        position: absolute;
        display: block;
        content: '';
        top: 5px;
        right: 5px;
        height: 30px;
        width: 30px;
        border-width: 5px;
        border-style: solid;
        border-color: rgba(229, 118, 43, 0.5) transparent transparent;
        border-radius: 100%;
    }
    .multi div {
        position: relative;
        height: 40px;
        width: 40px;
        border-width: 5px;
        border-style: solid;
        border-color: rgba(229, 118, 43, 0.25) transparent rgba(229, 118, 43, 0.5);
        border-radius: 100%;
        animation: counter-clockwise 0.49s linear infinite;
        animation-play-state: running;
    }
    .multi div:after {
        position: absolute;
        content: '';
        display: block;
        top: 0;
        right: 0;
        height: 30px;
        width: 30px;
        border-width: 5px;
        border-style: solid;
        border-color: transparent transparent rgba(229, 118, 43, 0.25);
        border-radius: 100%;
    }
");

?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <title><?= Html::encode($this->title) ?></title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <link rel="shortcut icon" href="/web/admin_favicon.ico" type="image/x-icon" />
    <?= Html::csrfMetaTags() ?>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<!-- loader -->
<div class="loader"><h1 class="loadingtext">Huckfinn</h1><p>Loading...</p><br>
    <div class="multi">
        <div></div>
    </div>
</div>
<!-- loader ends -->

<div id="wrapper">
    <div class="navbar-default sidebar" >
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" > <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
            <a class="navbar-brand" href="http://huckfinn.com" target="_blank">Huckfinn</a> </div>
        <div class="clearfix"></div>
        <div class="sidebar-nav navbar-collapse">

            <!-- user profile pic -->
            <div class="userprofile text-center">
                <div class="userpic"> <img src="<?= Yii::$app->user->identity->avatar ?>" alt="" class="userpicimg"> <a href="<?= Url::to(['/admin/user/profile']) ?>" class="btn btn-primary settingbtn"><i class="fa fa-gear"></i></a> </div>
                <h3 class="username"><?= Yii::$app->user->identity->name ? Yii::$app->user->identity->name : Yii::$app->user->identity->email ?></h3>
                <p>
                    <?php foreach(Yii::$app->authManager->getRolesByUser(Yii::$app->user->id) as $key => $r) {
                        echo $key != 0 ? ', ' : null;
                        echo $r->description;
                    } ?>
                </p>
            </div>
            <div class="clearfix"></div>
            <!-- user profile pic -->

            <ul class="nav" id="side-menu">
                <li> <a href="<?= Url::to(['/admin']) ?>"<?= Yii::$app->controller->id == 'admin' ? ' class="active"' : null ?>><i class="fa fa-dashboard fa-fw"></i> Dashboard</a> </li>
                <?php if (AccessAPI::can('root')) { ?>
                <li> <a href="<?= Url::to(['/admin/field']) ?>"<?= Yii::$app->controller->id == 'field' ? ' class="active"' : null ?>><i class="fa fa-gears fa-fw"></i> Fields</a> </li>
                <?php } ?>
                <li>
                <?php if (AccessAPI::can('viewUsers')) { ?>
                    <a href="<?= Url::to(['/admin/user']) ?>"<?= Yii::$app->controller->id == 'user' ? ' class="active"' : null ?>><i class="fa fa-user fa-fw"></i> Users</a>
                <?php } else { ?>
                    <a data-toggle="tooltip" data-placement="bottom" title="" data-original-title="You don't have permission!"><i class="fa fa-user fa-fw"></i> Users</a>
                <?php } ?>
                </li>
                <li>
                    <?php if (AccessAPI::can('viewPages') || AccessAPI::can('root') || AccessAPI::can('admin')) { ?>
                        <a href="<?= Url::to(['/admin/pages']) ?>"<?= Yii::$app->controller->id == 'pages' ? ' class="active"' : null ?>><i class="fa fa-file-text fa-fw"></i> Pages</a>
                    <?php } else { ?>
                        <a data-toggle="tooltip" data-placement="bottom" title="" data-original-title="You don't have permission!"><i class="fa fa-file-text fa-fw"></i> Pages</a>
                    <?php } ?>
                </li>
                <li>
                    <?php if (AccessAPI::can('viewInfo')) { ?>
                        <a href="<?= Url::to(['/admin/faq']) ?>"<?= Yii::$app->controller->id == 'faq' ? ' class="active"' : null ?>><i class="fa fa-question fa-fw"></i> FAQs</a>
                    <?php } else { ?>
                        <a data-toggle="tooltip" data-placement="bottom" title="" data-original-title="You don't have permission!"><i class="fa fa-question fa-fw"></i> FAQs</a>
                    <?php } ?>
                </li>
                <li>
                    <?php if (AccessAPI::can('viewInfo')) { ?>
                        <a href="<?= Url::to(['/admin/lineup']) ?>"<?= Yii::$app->controller->id == 'lineup' ? ' class="active"' : null ?>><i class="fa fa-microphone fa-fw"></i> Line up</a>
                    <?php } else { ?>
                        <a data-toggle="tooltip" data-placement="bottom" title="" data-original-title="You don't have permission!"><i class="fa fa-microphone fa-fw"></i> Line up</a>
                    <?php } ?>
                </li>
                <li> <a href="<?= Url::to(['/admin/admin/clear']) ?>"><i class="glyphicon glyphicon-flash"></i> Clear cache</a> </li>
            </ul>
        </div>
        <!-- /.sidebar-collapse -->
    </div>
    <!-- /.navbar-static-side -->

    <div id="page-wrapper">
        <div class="row">
            <nav class="navbar navbar-default navbar-static-top" style="margin-bottom: 0">
                <button class="menubtn pull-left btn "><i class="glyphicon  glyphicon-th"></i></button>
                <ul class="nav navbar-top-links navbar-right">
                    <li class="dropdown"> <a class="dropdown-toggle userdd" data-toggle="dropdown" href="javascript:void(0)">
                            <div class="userprofile small "> <span class="userpic"> <img src="<?= Yii::$app->user->identity->avatar ?>" alt="" class="userpicimg"> </span>
                                <div class="textcontainer">
                                    <h3 class="username"><?= Yii::$app->user->identity->name ? Yii::$app->user->identity->name : Yii::$app->user->identity->email ?></h3>
                                    <p>
                                        <?php foreach(Yii::$app->authManager->getRolesByUser(Yii::$app->user->id) as $key => $r) {
                                            echo $key != 0 ? ', ' : null;
                                            echo $r->description;
                                        } ?>
                                    </p>
                                </div>
                            </div>
                            <i class="caret"></i> </a>
                        <ul class="dropdown-menu dropdown-user">
                            <li> <a href="<?= Url::to(['/admin/user/profile']) ?>"><i class="fa fa-user fa-fw"></i> Profile</a> </li>
                            <li> <a href="<?= Url::to(['/admin/admin/logout']) ?>"><i class="fa fa-sign-out fa-fw"></i> Logout</a> </li>
                        </ul>
                        <!-- /.dropdown-user -->
                    </li>
                    <!-- /.dropdown -->
                </ul>
                <!-- /.navbar-top-links -->

            </nav>
        </div>

        <?= $content ?>

    </div>
    <!-- /#page-wrapper -->

</div>


<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
