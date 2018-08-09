<?php

$this->title = 'Updating role | Admin panel';

use yii\helpers\Url;
use yii\widgets\ActiveForm;
use yii\helpers\Html;

?>

<div class="row">
    <div class="col-md-12  header-wrapper" >
        <h1 class="page-header">Updating role: <?= $role->description ?></h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->

<ol class="breadcrumb">
    <li><a href="<?= Url::to(['/admin']) ?>">Dashboard</a></li>
    <li><a href="<?= Url::to(['/admin/user']) ?>">Users</a></li>
    <li><a href="<?= Url::to(['/admin/user/roles']) ?>">Managing roles</a></li>
    <li class="active">Updating role: <?= $role->description ?></li>
</ol>
<?php if (Yii::$app->user->can($role->name) && (!Yii::$app->user->can('root'))) { ?>
    <div class="alert alert-warning">You can't edit your own permissions!</div>
<?php } ?>
<?php if (Yii::$app->session->hasFlash('updated_role')) { ?>
    <div class="alert alert-success alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
        <?= Yii::$app->session->getFlash('updated_role') ?>
    </div>
<?php } ?>
<?php $form = ActiveForm::begin(); ?>
<div class="row">
    <div class="col-md-4">
        <div class="panel panel-default">
            <div class="panel-heading"><i class="fa fa-gears"></i> Dashboard</div>
            <div class="panel-body">
                <div class="form-group">
                    <div class="checkbox">
                        <?= $form->field($model, 'accessAdmin')->checkbox() ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading"><i class="fa fa-paperclip"></i> Information</div>
            <div class="panel-body">
                <div class="form-group">
                    <div class="checkbox">
                        <?= $form->field($model, 'viewInfo')->checkbox() ?>
                        <?= $form->field($model, 'createUpdateInfo')->checkbox() ?>
                        <?= $form->field($model, 'deleteInfo')->checkbox() ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="panel panel-default">
            <div class="panel-heading"><i class="fa fa-user"></i> Users and access</div>
            <div class="panel-body">
                <div class="form-group">
                    <div class="checkbox">
                        <?= $form->field($model, 'viewUsers')->checkbox() ?>
                    </div>
                    <div class="checkbox">
                        <?= $form->field($model, 'createUser')->checkbox() ?>
                    </div>
                </div>
                <div class="form-group">
                    <div class="checkbox">
                        <?= $form->field($model, 'viewRoles')->checkbox() ?>
                    </div>
                    <div class="checkbox">
                        <?= $form->field($model, 'createUpdateRoles')->checkbox() ?>
                    </div>
                </div>
                <div class="form-group">
                    <div class="checkbox">
                        <?= $form->field($model, 'changeUserRole')->checkbox() ?>
                    </div>
                    <div class="checkbox">
                        <?= $form->field($model, 'changeUserStatus')->checkbox() ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="panel panel-default">
            <div class="panel-heading"><i class="fa fa-file-text"></i> Pages</div>
            <div class="panel-body">
                <div class="form-group">
                    <div class="checkbox">
                        <?= $form->field($model, 'viewPages')->checkbox() ?>
                    </div>
                    <div class="checkbox">
                        <?= $form->field($model, 'createUpdatePages')->checkbox() ?>
                    </div>
                    <div class="checkbox">
                        <?= $form->field($model, 'deletePages')->checkbox() ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= !Yii::$app->user->can($role->name) || Yii::$app->user->can('root') ? Html::submitButton('Save', ['class' => 'btn btn-primary']) : null ?>
<?php ActiveForm::end(); ?>