<?php

$this->title = 'Creating permission | Admin panel';

use yii\helpers\Url;
use yii\widgets\ActiveForm;
use yii\helpers\Html;

?>

<div class="row">
    <div class="col-md-12  header-wrapper" >
        <h1 class="page-header">Creating permission</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->

<ol class="breadcrumb">
    <li><a href="<?= Url::to(['/admin']) ?>">Dashboard</a></li>
    <li><a href="<?= Url::to(['/admin/user']) ?>">Users</a></li>
    <li class="active">Creating permission</li>
</ol>

<div class="row">
    <div class="col-md-5">
        <?php $form = ActiveForm::begin(); ?>

        <div class="form-group">
            <?= $form->field($model, 'name')->textInput(['placeholder' => 'Name'])->label(false) ?>
            <?= $form->field($model, 'description')->textInput(['placeholder' => 'Description'])->label(false) ?>
            <?= Html::submitButton('Add', ['class' => 'btn btn-success']) ?>
        </div>

        <?php ActiveForm::end(); ?>
    </div>
</div>