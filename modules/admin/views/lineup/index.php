<?php

$this->title = 'Line up | Admin panel';

use yii\helpers\Url;
use yii\widgets\ActiveForm;
use app\components\api\AccessAPI;

?>

<div class="row">
    <div class="col-md-12  header-wrapper" >
        <h1 class="page-header">Line up</h1>
        <p class="page-subtitle">Managing items on the Line up.</p>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->

<ol class="breadcrumb">
    <li><a href="<?= Url::to(['/admin']) ?>">Dashboard</a></li>
    <li class="active">Line up</li>
</ol>

<?php if (Yii::$app->session->hasFlash('lineup_flash')) { ?>
    <div class="alert alert-success alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
        <?= Yii::$app->session->getFlash('lineup_flash') ?>
    </div>
<?php } ?>

<div class="row">
    <div class="col-md-12">

        <?php if (AccessAPI::can('createUpdateInfo') || AccessAPI::can('root')) { ?>
            <a class="btn btn-success" href="<?= Url::to(['/admin/lineup/create']) ?>"><i class="fa fa-plus"></i>&nbsp;&nbsp;&nbsp; Create item</a>
        <?php } else { ?>
            <a class="btn btn-success" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="You don't have permissions!"><i class="fa fa-plus"></i>&nbsp;&nbsp;&nbsp; Create item</a>
        <?php } ?>
        <br><br>

        <div id="dataTables-lineup_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer">
            <div class="row">
                <div class="col-sm-12">
                    <table class="table  dataTable no-footer dtr-inline" id="dataTables-lineup" role="grid" aria-describedby="dataTables-lineup_info" style="width: 966px;">
                        <thead>
                        <tr role="row">
                            <th tabindex="0" aria-controls="dataTables-lineup" rowspan="1" colspan="1" aria-label="User : activate to sort column descending" style="width: 946px;">
                                Title
                            </th>
                            <th tabindex="0" aria-controls="dataTables-lineup" rowspan="1" colspan="1" aria-label="User : activate to sort column descending" style="width: 20px;">

                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($lineups as $key => $p) { ?>
                            <tr role="row">
                                <td>
                                    <?= $p->title ?>
                                </td>
                                <td style="cursor: pointer;">
                                    <div class="btn-group">
                                        <button type="button" class="dotbtn dropdown-toggle" data-toggle="dropdown"> <span class="dots"></span> </button>
                                        <ul class="dropdown-menu pull-right" role="menu">
                                            <li>
                                                <?php if (AccessAPI::can('createUpdateInfo')) { ?>
                                                    <a href="<?= Url::to(['/admin/lineup/update', 'id' => $p->primaryKey]) ?>">Edit</a>
                                                <?php } else { ?>
                                                    <a data-toggle="tooltip" data-placement="left" title="" data-original-title="You don't have permissions!">Edit</a>
                                                <?php } ?>
                                            </li>
                                            <li>
                                                <?php if (AccessAPI::can('deleteInfo')) { ?>
                                                    <a href="#delete_lineup_modal" data-toggle="modal" data-target="delete_lineup_modal" data-name="<?= $p->title ?>" data-id="<?= $p->primaryKey ?>">Delete</a>
                                                <?php } else { ?>
                                                    <a data-toggle="tooltip" data-placement="left" title="" data-original-title="You don't have permissions!">Delete</a>
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

<?php if (AccessAPI::can('deleteInfo')) { ?>
    <div class="modal fade" id="delete_lineup_modal" tabindex="-1" role="dialog" aria-labelledby="delete_lineup_modal" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title">Delete item?</h4>
                </div>
                <div class="modal-body">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-danger" id="delete_lineup_button">Delete</button>
                </div>
            </div>
        </div>
    </div>
<?php } ?>
