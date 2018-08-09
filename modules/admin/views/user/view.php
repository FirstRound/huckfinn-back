<?php

$this->title = 'Managing user | Admin panel';

use yii\helpers\Url;
use yii\widgets\ActiveForm;
use yii\helpers\Html;
use app\components\api\AccessAPI;

?>

<div class="row">
    <div class="col-md-12  header-wrapper" >
        <h1 class="page-header">Managing user</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->

<ol class="breadcrumb">
    <li><a href="<?= Url::to(['/admin']) ?>">Dashboard</a></li>
    <li><a href="<?= Url::to(['/admin/user']) ?>">Users</a></li>
    <li class="active">Managing user</li>
</ol>

<div class="row">
    <div class="col-md-5">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h1 class="page-header small">Profile</h1>
                <p class="page-subtitle small">User information</p>
            </div>
            <div class="clearfix"></div>
            <div class="col-md-12">
                <div class="userprofile text-center">
                    <div class="userpic"> <img src="<?= $u->avatar ?>" alt="" class="userpicimg"></div>
                </div>
                <div class="clearfix"></div>
                <div class="row">
                    <div class="col-md-5">
                        <p>First Name and Last Name</p>
                    </div>
                    <div class="col-md-7">
                        <p><strong><?= $u->name || $u->last_name ? $u->name.' '.$u->last_name : '-' ?></strong></p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-5">
                        <p>E-mail</p>
                    </div>
                    <div class="col-md-7">
                        <p><strong><?= $u->email ?></strong></p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-5">
                        <p>Phone</p>
                    </div>
                    <div class="col-md-7">
                        <p><strong><?= $u->phone ? $u->phone : '-' ?></strong></p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-5">
                        <p>Registration date</p>
                    </div>
                    <div class="col-md-7">
                        <p><strong><?= Yii::$app->formatter->asDate($u->created_at, 'php: j F Y') ?></strong></p>
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
    <div class="col-md-7">
        <div class="row">
            <div class="col-md-6">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h1 class="page-header small">Permissions</h1>
                        <p class="page-subtitle small">Access for editing some parts of the site</p>
                    </div>
                    <div class="col-md-12">
                        <div class="list-group ">
                            <?php foreach ($roles as $role) { ?>
                                <div class="list-group-item withswitch">
                                    <h5 class="list-group-item-heading" style="line-height: 1.8;"><?= $role->description ?></h5>
                                    <div class="switch" id="user_role_switch">
                                        <input id="<?= $role->name ?>" data-user="<?= $u->id ?>" class="cmn-toggle cmn-toggle-round" type="checkbox"<?= $u->hasRole($role->name) ? ' checked' : null ?><?= !AccessAPI::can('changeUserRole') || $role->name == 'root' ? ' disabled' : ($u->id > 1 ? null : ' disabled') ?>>
                                        <label for="<?= $role->name ?>"></label>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h1 class="page-header small">Status</h1>
                        <p class="page-subtitle small">Unactive users can't authorize</p>
                    </div>
                    <div class="col-md-12">
                        <div class="list-group ">
                            <div class="list-group-item withswitch">
                                <h5 class="list-group-item-heading" style="line-height: 1.8;">Active</h5>
                                <div class="switch">
                                    <input id="user_status_switch" data-user="<?= $u->id ?>" class="cmn-toggle cmn-toggle-round" type="checkbox"<?= Yii::$app->user->identity->status ? ' checked' : null ?><?= !AccessAPI::can('changeUserStatus') ? ' disabled' : ($u->id > 1 ? null : ' disabled') ?>>
                                    <label for="user_status_switch"></label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <?php if (AccessAPI::can('root')) { ?>
                <form action="<?= Url::to(['/admin/user/delete']) ?>" method="post">
                    <input type="hidden" name="id" value="<?= $u->id ?>">
                    <p class="text-center"><button type="submit" class="btn btn-danger"><i class="fa fa-trash-o"></i> Delete user</button></p>
                </form>
                <?php } ?>
            </div>
        </div>
    </div>
</div>