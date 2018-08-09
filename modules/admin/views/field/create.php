<?php

$this->title = 'Добавление поля | Панель управления';

use yii\helpers\Url;
use yii\widgets\ActiveForm;
use yii\helpers\Html;

?>

<div class="row">
    <div class="col-md-12  header-wrapper" >
        <h1 class="page-header">Добавление поля</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->

<ol class="breadcrumb">
    <li><a href="<?= Url::to(['/admin']) ?>">Панель управления</a></li>
    <li><a href="<?= Url::to(['/admin/field/index']) ?>">Поля</a></li>
    <li class="active">Добавление поля</li>
</ol>

<div class="row">
    <div class="col-md-12">
        <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'field_type')->dropDownList($types) ?>

        <?= $form->field($model, 'item_class')->dropDownList($classes) ?>

        <?= $form->field($model, 'key')->textInput() ?>

        <?= $form->field($model, 'title')->textInput() ?>

        <?= $form->field($model, 'default_value')->textInput() ?>

        <?= Html::submitButton('Добавить', ['class' => 'btn btn-success']) ?>

        <?php ActiveForm::end(); ?>
    </div>
</div>
