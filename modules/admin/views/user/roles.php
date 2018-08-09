<?php

$this->title = 'Managing roles | Admin panel';

use yii\helpers\Url;
use app\modules\admin\models\UserRoleUpdation;
use app\components\api\AccessAPI;
use app\modules\user\models\User;

?>

<div class="row">
    <div class="col-md-12  header-wrapper" >
        <h1 class="page-header">Managing roles</h1>
        <p class="page-subtitle">Managing permissions for users.</p>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->

<ol class="breadcrumb">
    <li><a href="<?= Url::to(['/admin']) ?>">Dashboard</a></li>
    <li><a href="<?= Url::to(['/admin/user']) ?>">Users</a></li>
    <li class="active">Managing roles</li>
</ol>

<div class="row">
    <div class="col-md-12">
        <ul class="nav nav-tabs">
            <li><a href="<?= Url::to(['/admin/user/index']) ?>" aria-expanded="true">Users</a> </li>
            <li class="active"><a href="<?= Url::to(['/admin/user/roles']) ?>">Managing roles</a> </li>
        </ul>
        <br>
        <div class="tab-content">
            <div class="tab-pane fade padding active in" id="roles">
                <a class="btn btn-success" href="<?= Url::to(['/admin/user/create-role']) ?>"><i class="fa fa-plus"></i>&nbsp;&nbsp;&nbsp; Create role</a>
                <?php if (AccessAPI::can('root')) { ?>
                <a class="btn btn-success" href="<?= Url::to(['/admin/user/create-permission']) ?>"><i class="fa fa-plus"></i>&nbsp;&nbsp;&nbsp; Create permission</a>
                <?php } ?>
                <br><br>
                <div id="dataTables-roles_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer">
                    <div class="row">
                        <div class="col-sm-12">
                            <table class="table  dataTable no-footer dtr-inline" id="dataTables-roles" role="grid" aria-describedby="dataTables-roles_info" style="width: 966px;" data-root="<?= AccessAPI::can('root') ?>">
                                <thead>
                                <tr role="row">
                                    <th class="sorting_asc" tabindex="0" aria-controls="dataTables-roles" rowspan="1" colspan="1" aria-sort="ascending" aria-label="User : activate to sort column descending" style="width: 20px;">
                                        Role
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="dataTables-roles" rowspan="1" colspan="1" aria-label="User : activate to sort column descending" style="width: 139px;">
                                        Creating date
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="dataTables-roles" rowspan="1" colspan="1" aria-label="User : activate to sort column descending" style="width: 139px;">
                                        Creator
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="dataTables-roles" rowspan="1" colspan="1" aria-label="Email: activate to sort column ascending" style="width: 20px;">

                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($all_roles as $key => $role) { ?>
                                    <tr class="<?= ((int)$key%2) ? 'odd' : 'even' ?>" role="row">
                                        <td class="sorting_1"><?= $role->description ?></td>
                                        <td><?= Yii::$app->formatter->asDatetime($role->createdAt, 'php: Y-m-d H:i') ?></td>
                                        <td>
                                            <?php
                                                $upd = UserRoleUpdation::find()->where(['role_name' => $role->name, 'action' => 'create'])->one();
                                                if ($upd) {
                                                    $user = User::findOne(['id' => $upd->user_id]);
                                                    echo '<a href="' . Url::to(['/admin/user/view?id=' . $upd->user_id]) . '">' . ($user->name || $user->last_name ? $user->name . ' ' . $user->last_name : $user->email) . '</a>';
                                                }
                                            ?>
                                        </td>
                                        <td class="center">
                                            <?php if ((!AccessAPI::can($role->name) && $role->name != 'root' ) || AccessAPI::can('root')) { ?>
                                                <a href="<?= Url::to(['/admin/user/update-role', 'name' => $role->name]) ?>" class="btn btn-warning btn-circle"><i class="fa fa-pencil"></i></a>
                                            <?php } ?>
                                        </td>
                                    </tr>
                                <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>