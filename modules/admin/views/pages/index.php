<?php

$this->title = 'Pages | Admin panel';

use yii\helpers\Url;
use yii\widgets\ActiveForm;
use app\components\api\AccessAPI;

?>

<div class="row">
    <div class="col-md-12  header-wrapper" >
        <h1 class="page-header">Pages</h1>
        <p class="page-subtitle">Managing pages on the site.</p>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->

<ol class="breadcrumb">
    <li><a href="<?= Url::to(['/admin']) ?>">Dashboard</a></li>
    <li class="active">Pages</li>
</ol>

<?php if (Yii::$app->session->hasFlash('pages_flash')) { ?>
    <div class="alert alert-success alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
        <?= Yii::$app->session->getFlash('pages_flash') ?>
    </div>
<?php } ?>

<div class="row">
    <div class="col-md-12">

        <?php if (AccessAPI::can('createUpdatePages') || AccessAPI::can('root')) { ?>
            <a class="btn btn-success" href="<?= Url::to(['/admin/pages/create']) ?>"><i class="fa fa-plus"></i>&nbsp;&nbsp;&nbsp; Create page</a>
        <?php } else { ?>
            <a class="btn btn-success" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="You don't have permissions!"><i class="fa fa-plus"></i>&nbsp;&nbsp;&nbsp; Create page</a>
        <?php } ?>
        <br><br>

        <div id="dataTables-pages_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer">
            <div class="row">
                <div class="col-sm-12">
                    <table class="table  dataTable no-footer dtr-inline" id="dataTables-pages" role="grid" aria-describedby="dataTables-pages_info" style="width: 966px;">
                        <thead>
                        <tr role="row">
                            <th tabindex="0" aria-controls="dataTables-pages" rowspan="1" colspan="1" aria-label="User : activate to sort column descending" style="width: 946px;">
                                Title
                            </th>
                            <th tabindex="0" aria-controls="dataTables-pages" rowspan="1" colspan="1" aria-label="User : activate to sort column descending" style="width: 20px;">

                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($pages as $key => $p) { ?>
                            <tr role="row">
                                <td>
                                    <?= $p->pages ? '<i class="fa fa-caret-down"></i> ' : null ?><?= $p->title ?>
                                </td>
                                <td style="cursor: pointer;">
                                    <div class="btn-group">
                                        <button type="button" class="dotbtn dropdown-toggle" data-toggle="dropdown"> <span class="dots"></span> </button>
                                        <ul class="dropdown-menu pull-right" role="menu">
                                            <li>
                                                <?php if (AccessAPI::can('createUpdatePages') || AccessAPI::can('root')) { ?>
                                                    <a href="<?= Url::to(['/admin/pages/create', 'root' => $p->page_id]) ?>">Add subpage</a>
                                                <?php } else { ?>
                                                    <a data-toggle="tooltip" data-placement="left" title="" data-original-title="You don't have permissions!">Add subpage</a>
                                                <?php } ?>
                                            </li>
                                            <li>
                                                <?php if (AccessAPI::can('createUpdatePages') || AccessAPI::can('admin') || AccessAPI::can('root')) { ?>
                                                    <a href="<?= Url::to(['/admin/pages/update', 'id' => $p->page_id]) ?>">Edit</a>
                                                <?php } else { ?>
                                                    <a data-toggle="tooltip" data-placement="left" title="" data-original-title="You don't have permissions!">Edit</a>
                                                <?php } ?>
                                            </li>
                                            <li>
                                                <?php if (AccessAPI::can('deletePages') || AccessAPI::can('root')) { ?>
                                                    <a href="#delete_pages_modal" data-toggle="modal" data-target="delete_pages_modal" data-name="<?= $p->title ?>" data-id="<?= $p->page_id ?>">Delete</a>
                                                <?php } else { ?>
                                                    <a data-toggle="tooltip" data-placement="left" title="" data-original-title="You don't have permissions!">Delete</a>
                                                <?php } ?>
                                            </li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            <?php foreach ($p->pages as $pp) { ?>
                                <tr role="row">
                                    <td style="padding-left: 30px!important;">
                                        <?= $pp->title ?>
                                    </td>
                                    <td style="cursor: pointer;">
                                        <div class="btn-group">
                                            <button type="button" class="dotbtn dropdown-toggle" data-toggle="dropdown"> <span class="dots"></span> </button>
                                            <ul class="dropdown-menu pull-right" role="menu">
                                                <li>
                                                    <?php if (AccessAPI::can('createUpdatePages') || AccessAPI::can('admin') || AccessAPI::can('root')) { ?>
                                                        <a href="<?= Url::to(['/admin/pages/update', 'id' => $pp->page_id]) ?>">Edit</a>
                                                    <?php } else { ?>
                                                        <a data-toggle="tooltip" data-placement="left" title="" data-original-title="You don't have permissions!">Edit</a>
                                                    <?php } ?>
                                                </li>
                                                <li>
                                                    <?php if (AccessAPI::can('deletePages') || AccessAPI::can('root')) { ?>
                                                        <a href="#delete_pages_modal" data-toggle="modal" data-target="delete_pages_modal" data-name="<?= $pp->title ?>" data-id="<?= $pp->page_id ?>">Delete</a>
                                                    <?php } else { ?>
                                                        <a data-toggle="tooltip" data-placement="left" title="" data-original-title="You don't have permissions!">Delete</a>
                                                    <?php } ?>
                                                </li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                            <?php } ?>
                        <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
</div>

<?php if (AccessAPI::can('deletePages')) { ?>
    <div class="modal fade" id="delete_pages_modal" tabindex="-1" role="dialog" aria-labelledby="delete_pages_modal" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title">Delete page?</h4>
                </div>
                <div class="modal-body">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-danger" id="delete_pages_button">Delete</button>
                </div>
            </div>
        </div>
    </div>
<?php } ?>
