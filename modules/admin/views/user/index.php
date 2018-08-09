<?php

$this->title = 'Users | Admin panel';

use yii\helpers\Url;
use app\components\api\AccessAPI;

?>

<div class="row">
    <div class="col-md-12  header-wrapper" >
        <h1 class="page-header">Users</h1>
        <p class="page-subtitle">Managing users and their roles for access to some parts of the site.</p>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->

<ol class="breadcrumb">
    <li><a href="<?= Url::to(['/admin']) ?>">Dashboard</a></li>
    <li class="active">Users</li>
</ol>

<?php if (Yii::$app->session->hasFlash('user_manage_flash')) { ?>
    <div class="alert alert-success alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
        <?= Yii::$app->session->getFlash('user_manage_flash') ?>
    </div>
<?php } ?>

<div class="row">
    <div class="col-md-12">
        <ul class="nav nav-tabs">
            <li class="active"><a href="<?= Url::to(['/admin/user/index']) ?>" aria-expanded="true">Users</a> </li>
            <?php if (AccessAPI::can('root')) { ?>
            <li><a href="<?= Url::to(['/admin/user/roles']) ?>">Managing roles</a> </li>
            <?php } ?>
        </ul>
        <br>
        <div class="tab-content">
            <div class="tab-pane fade padding active in" id="users">
                <a class="btn btn-success" href="<?= Url::to(['/admin/user/create']) ?>"><i class="fa fa-plus"></i>&nbsp;&nbsp;&nbsp; Create user</a>
                <br><br>

                <div id="dataTables-users_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer">
                    <div class="row">
                        <div class="col-sm-12">
                            <table class="table  dataTable no-footer dtr-inline" id="dataTables-users" role="grid" aria-describedby="dataTables-users_info" style="width: 966px;" data-root="<?= AccessAPI::can('root') ?>">
                                <thead>
                                    <tr role="row">
                                        <th class="sorting_asc" tabindex="0" aria-controls="dataTables-users" rowspan="1" colspan="1" aria-sort="ascending" aria-label="User : activate to sort column descending" style="width: 139px;">
                                            User
                                        </th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTables-users" rowspan="1" colspan="1" aria-label="Email: activate to sort column ascending" style="width: 143px;">
                                            E-mail
                                        </th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTables-users" rowspan="1" colspan="1" aria-label="status: activate to sort column ascending" style="width: 103px;">
                                            Status
                                        </th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTables-users" rowspan="1" colspan="1" aria-label="Phone: activate to sort column ascending" style="width: 130px;">
                                            Rights
                                        </th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTables-users" rowspan="1" colspan="1" aria-label="status: activate to sort column ascending" style="width: 103px;">
                                            Registration date
                                        </th>
                                        <th class="sorting_asc" tabindex="0" aria-controls="dataTables-users" rowspan="1" colspan="1" aria-sort="ascending" aria-label="User : activate to sort column descending" style="width: 20px;">

                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($users as $key => $u) { ?>
                                    <tr class="<?= ($key%2) ? 'odd' : 'even' ?>" role="row" data-phone="<?= $u->phone ?>" data-id="<?= $u->id ?>">
                                        <td class="sorting_1"><img src="<?= $u->avatar ?>" alt="" class="gridpic"><?= $u->name.' '.$u->last_name ?></td>
                                        <td><?= $u->email ?></td>
                                        <td class="center">
                                            <?php if ($u->status) { ?>
                                                <span class="status active">active</span>
                                            <?php } else { ?>
                                                <span class="status inactive">unactive</span>
                                            <?php } ?>
                                        </td>
                                        <td>
                                            <?php
                                            foreach (Yii::$app->authManager->getRolesByUser($u->id) as $key => $roles) {
                                                if ($key != 0) echo ', ';
                                                echo $roles->description;
                                            }
                                            ?>
                                        </td>
                                        <td>
                                            <?= Yii::$app->formatter->asDate($u->created_at, 'php:Y-m-d') ?>
                                        </td>
                                        <td style="cursor: pointer;">
                                            <div class="btn-group">
                                                <button type="button" class="dotbtn dropdown-toggle" data-toggle="dropdown"> <span class="dots"></span> </button>
                                                <ul class="dropdown-menu pull-right" role="menu">
                                                    <li>
                                                        <?php if (AccessAPI::can('viewUsers')) { ?>
                                                            <a href="<?= Url::to(['/admin/user/view', 'id' => $u->primaryKey]) ?>">Edit</a>
                                                        <?php } else { ?>
                                                            <a data-toggle="tooltip" data-placement="left" title="" data-original-title="You don't have permission!">Edit</a>
                                                        <?php } ?>
                                                    </li>
                                                </ul>
                                            </div>
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