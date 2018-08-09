<?php

$this->title = 'Creating user | Admin panel';

use yii\helpers\Url;
use yii\widgets\ActiveForm;
use yii\helpers\Html;

?>

<div class="row">
    <div class="col-md-12  header-wrapper" >
        <h1 class="page-header">Creating user</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->

<ol class="breadcrumb">
    <li><a href="<?= Url::to(['/admin']) ?>">Dashboard</a></li>
    <li><a href="<?= Url::to(['/admin/user']) ?>">Users</a></li>
    <li class="active">Creating user</li>
</ol>

<div class="row">
    <div class="col-md-5">
        <?php $form = ActiveForm::begin(); ?>

        <div class="form-group">
            <?= $form->field($model, 'email')->textInput(['placeholder' => 'E-mail'])->label(false) ?>
            <?= $form->field($model, 'password')->passwordInput(['placeholder' => 'Пароль'])->label(false) ?>
            <?= $form->field($model, 'phone')->textInput(['placeholder' => 'Номер телефона'])->label(false) ?>
            <?= $form->field($model, 'name')->textInput(['placeholder' => 'Имя'])->label(false) ?>
            <?= $form->field($model, 'last_name')->textInput(['placeholder' => 'Фамилия'])->label(false) ?>
            <?= Html::submitButton('Add', ['class' => 'btn btn-success']) ?>
        </div>

        <?php ActiveForm::end(); ?>
    </div>
</div>