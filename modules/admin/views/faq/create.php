<?php

$this->title = 'Creating faq | Admin panel';

use yii\helpers\Url;
use yii\widgets\ActiveForm;
use yii\helpers\Html;
use dosamigos\tinymce\TinyMce;
use app\components\widgets\SeoForm;


?>

<div class="row">
    <div class="col-md-12  header-wrapper" >
        <h1 class="page-header">Creating faq</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->

<ol class="breadcrumb">
    <li><a href="<?= Url::to(['/admin']) ?>">Dashboard</a></li>
    <li><a href="<?= Url::to(['/admin/faq/index']) ?>">FAQs</a></li>
    <li class="active">Creating faq</li>
</ol>

<div class="row">
    <div class="col-md-12">

        <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

        <div class="row">
            <div class="col-md-12">
                <?= $form->field($model, 'title')->textInput()->label('Question') ?>
            </div>
        </div>

        <?= $form->field($model, 'text')->textarea()->label('Answer') ?>

        <?= Html::submitButton('Create', ['class' => 'btn btn-success']) ?>

        <?php ActiveForm::end(); ?>

    </div>
</div>