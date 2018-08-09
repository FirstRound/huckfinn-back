<?php

use yii\helpers\Html;
use app\modules\admin\assets\AdminAsset;

$this->context->layout = false;

switch ($exception->statusCode) {
    case '404': {
        $this->title = 'Page is not found';
        break;
    }
    case '405': {
        $this->title = 'Method is not allowed';
        break;
    }
    case '403': {
        $this->title = 'No permissions';
        break;
    }
    case '500': {
        $this->title = 'Server error';
        break;
    }
    default: {
        $this->title = 'Error';
        break;
    }
}
$this->title .= ' | Admin panel';

AdminAsset::register($this);

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
<body class="loginpages">
<?php $this->beginBody() ?>
<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="login-panel panel panel-danger">
                <div class="panel-heading">
                    There is an error
                </div>
                <div class="panel-body">
                    <br>
                    <p>
                        <?php
                        switch ($exception->statusCode) {
                            case '404': {
                                echo 'Page is not found. Check the url.';
                                break;
                            }
                            case '405': {
                                echo 'You\'re using method which is not allowed.';
                                break;
                            }
                            case '403': {
                                echo 'You don\'t have permissions for viewing this page.';
                                break;
                            }
                            case '500': {
                                echo 'Something went wrong. Write to developers.';
                                break;
                            }
                            default: {
                                echo 'Something went wrong...';
                                break;
                            }
                        }
                        ?>
                    </p>
                    <br>
                    <div class="text-center"><a href="<?= Yii::$app->request->referrer ?>" class="btn btn-outline btn-default">Go back</a></div>
                    <br>
                </div>
                <div class="panel-footer">
                    <small>If you're sure that the error is developer's fault, write to us.</small>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
