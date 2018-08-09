<?php

$this->title = 'Creating page | Admin panel';

use yii\helpers\Url;
use yii\widgets\ActiveForm;
use yii\helpers\Html;
use dosamigos\tinymce\TinyMce;
use app\components\widgets\SeoForm;


?>

<div class="row">
    <div class="col-md-12  header-wrapper" >
        <h1 class="page-header">Creating page</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->

<ol class="breadcrumb">
    <li><a href="<?= Url::to(['/admin']) ?>">Dashboard</a></li>
    <li><a href="<?= Url::to(['/admin/pages/index']) ?>">Pages</a></li>
    <li class="active">Creating page</li>
</ol>

<div class="row">
    <div class="col-md-12">

        <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

        <div class="row">
            <div class="col-md-12">
                <?= $form->field($model, 'title')->textInput() ?>
            </div>
        </div>

        <?= $form->field($model, 'root_page_id')->hiddenInput()->label(false) ?>

        <?= $form->field($model, 'text')->widget(TinyMce::className(), [
            'options' => ['rows' => 10],
            'language' => 'en',
            'clientOptions' => [
                'plugins' => [
                    'advlist autolink lists link charmap  print hr preview pagebreak',
                    'searchreplace wordcount textcolor visualblocks visualchars code fullscreen nonbreaking',
                    'save insertdatetime media table contextmenu template paste image'
                ],
                'toolbar' => 'undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
                'external_filemanager_path' => '/plugins/responsivefilemanager/filemanager/',
                'filemanager_title' => 'Responsive Filemanager',
                'external_plugins' => [
                    //Иконка/кнопка загрузки файла в диалоге вставки изображения.
                    'filemanager' => '/plugins/responsivefilemanager/filemanager/plugin.min.js',
                    //Иконка/кнопка загрузки файла в панеле иснструментов.
                    'responsivefilemanager' => '/plugins/responsivefilemanager/tinymce/plugins/responsivefilemanager/plugin.min.js',
                ],
            ]
        ]) ?>

        <?= SeoForm::widget(['form' => $form, 'model' => $model]);  ?>

        <?= Html::submitButton('Create', ['class' => 'btn btn-success']) ?>

        <?php ActiveForm::end(); ?>

    </div>
</div>