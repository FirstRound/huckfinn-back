<?php

$this->title = 'Поля | Панель управления';

use yii\helpers\Url;
use app\components\api\AccessAPI;

?>

    <div class="row">
        <div class="col-md-12  header-wrapper" >
            <h1 class="page-header">Поля</h1>
            <p class="page-subtitle">Управление полями моделей: добавление, редактирование, удаление.</p>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->

    <ol class="breadcrumb">
        <li><a href="<?= Url::to(['/admin']) ?>">Панель управления</a></li>
        <li class="active">Поля</li>
    </ol>

<?php if (Yii::$app->session->hasFlash('field_flash')) { ?>
    <div class="alert alert-success alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
        <?= Yii::$app->session->getFlash('field_flash') ?>
    </div>
<?php } ?>

    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="col-sm-6">
                    <?php if (AccessAPI::can('root')) { ?>
                        <a class="btn btn-success" href="<?= Url::to(['/admin/field/create']) ?>"><i class="fa fa-plus"></i>&nbsp;&nbsp;&nbsp; Добавить поле</a>
                    <?php } else { ?>
                        <a class="btn btn-success" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="У вас недостаточно прав!"><i class="fa fa-plus"></i>&nbsp;&nbsp;&nbsp; Добавить поле</a>
                    <?php } ?>
                </div>
            </div>
            <br>

        </div>
    </div>

<?php if (AccessAPI::can('deleteArticles')) { ?>
    <div class="modal fade" id="delete_article_modal" tabindex="-1" role="dialog" aria-labelledby="delete_article_modal" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title">Удалить статью?</h4>
                </div>
                <div class="modal-body">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Отмена</button>
                    <button type="button" class="btn btn-danger" id="delete_article_button">Удалить</button>
                </div>
            </div>
        </div>
    </div>
<?php } ?>