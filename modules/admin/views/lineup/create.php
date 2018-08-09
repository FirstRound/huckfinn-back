<?php

$this->title = 'Creating item | Admin panel';

use yii\helpers\Url;
use yii\widgets\ActiveForm;
use yii\helpers\Html;
use dosamigos\tinymce\TinyMce;
use app\components\widgets\SeoForm;


?>

<div class="row">
    <div class="col-md-12  header-wrapper" >
        <h1 class="page-header">Creating item</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->

<ol class="breadcrumb">
    <li><a href="<?= Url::to(['/admin']) ?>">Dashboard</a></li>
    <li><a href="<?= Url::to(['/admin/lineup/index']) ?>">Line up</a></li>
    <li class="active">Creating item</li>
</ol>

<div class="row">
    <div class="col-md-12">

        <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

        <div class="row">
            <div class="col-md-12">
                <?= $form->field($model, 'title')->textInput() ?>
            </div>
        </div>

        <?= $form->field($model, 'img')->fileInput() ?>

        <?= $form->field($model, 'text')->widget(TinyMce::className(), [
            'options' => ['rows' => 10],
            'language' => 'en',
            'clientOptions' => [
                'plugins' => [
                    'advlist autolink lists link charmap  print hr preview pagebreak',
                    'searchreplace wordcount textcolor visualblocks visualchars code fullscreen nonbreaking',
                    'save insertdatetime media table contextmenu template paste image'
                ],
                'toolbar' => 'undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link',
            ]
        ]) ?>

        <?= Html::submitButton('Create', ['class' => 'btn btn-success']) ?>

        <?php ActiveForm::end(); ?>

    </div>
</div>