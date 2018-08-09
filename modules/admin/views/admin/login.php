<?php

use app\modules\admin\assets\AdminAsset;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

AdminAsset::register($this);

?>

<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <title>Login to Admin panel</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <link rel="shortcut icon" href="/web/admin_favicon.ico" type="image/x-icon" />
    <?= Html::csrfMetaTags() ?>
    <?php $this->head() ?>
    <link rel="stylesheet" type="text/css" href="/css/admin/login.css?v=1.0">
</head>
<body>
<?php $this->beginBody() ?>

<div class="login_wrap">
    <div class="login_block">

        <?php $form = ActiveForm::begin(['id' => 'login_form']); ?>
        <?= $form->field($model, 'email')->textInput(['autofocus' => true, 'placeholder' => 'E-mail'])->label(false) ?>
        <?= $form->field($model, 'password')->passwordInput(['placeholder' => 'Password'])->label(false) ?>
        <br>
        <!-- Change this to a button or input when using this as a form -->
        <?= Html::submitButton('LOGIN', ['name' => 'login-button']) ?>
        <?php ActiveForm::end(); ?>
    </div>
</div>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
