<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use app\assets\AppAsset;
use app\models\Info;

AppAsset::register($this);

?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<a href="/tickets#tickets_iframe" class="tickets_top_link visible-xs">
    BUY TICKETS
</a>
<section class="sec-lvl-1 other-page">
    <div class="new-text-1">
        <p>CUCAMONGA - GUASTI REGIONAL PARK<span>800  N. ARCHIBALD AVE. ONTARIO, CALIFORNIA</span></p>
    </div>
    <div class="october"></div>
    <div class="fixed-t-years lvl-1-m-w">
        <div class="years">
            <img src="/img/f-w-years.png" class="img-responsive" alt="">
        </div>
    </div>
    <div class="lvl-1-m-w">
        <div class="ticket">
            <a href="/tickets">
                <img src="/img/ticket.png" class="img-responsive" alt="">
            </a>
        </div>
        <div class="top">
            <div class="l-s">
                <a href="/tickets" class="butt-style">On sale now</a>
            </div>
            <div class="m-s">
                <a href="/">
                    <img src="/img/main-logo.png" class="img-resposive" alt="">
                </a>
            </div>
            <div class="r-s">
                <a href="/want-to" class="butt-style">Connect</a>
            </div>
        </div>
        <div class="bott" data-spy="affix" data-offset-top="250" data-offset-bottom="200">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#firstmenu">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <div class="collapse navbar-collapse" id="firstmenu">
                <div class="ticket-menu">
                    <a href="/tickets">
                        <img src="/img/ticket.png" class="img-responsive" alt="">
                    </a>
                </div>
                <ul class="menu-list">
                    <li class="first-itm">
                        <a href="/" >HOME</a>
                    </li>
                    <li class="first-itm">
                        <a href="/tickets"<?= Yii::$app->controller->route == 'site/tickets' ? ' class="active"' : null ?>>TICKETS</a>
                    </li>
                    <li class="first-itm">
                        <a href="/#line-up">Line-up 2018</a>
                    </li>

                    <li class="first-itm">
                        <span<?= in_array(Yii::$app->controller->route, ['site/rules', 'site/map', 'site/meet', 'site/travel', 'site/volunteer']) ? ' class="active"' : null ?>>EVENT INFO</span>
                        <div class="second-lvl-menu">
                            <a href="/map"<?= Yii::$app->controller->route == 'site/map' ? ' class="active-second-lvl"' : null ?>>MAP</a>
                            <a href="/MeetTheHUCKERS"<?= Yii::$app->controller->route == 'site/meet' ? ' class="active-second-lvl"' : null ?>>MEET THE HUCKERS</a>
                            <a href="/TRAVEL"<?= Yii::$app->controller->route == 'site/travel' ? ' class="active-second-lvl"' : null ?>>TRAVEL & ACCOMMODATIONS</a>
                            <a href="/CampingAndParking"<?= Yii::$app->controller->route == 'site/camping' ? ' class="active-second-lvl"' : null ?>>CAMPING & PARKING</a>
                            <a href="/want-to"<?= Yii::$app->controller->route == 'site/volunteer' ? ' class="active-second-lvl"' : null ?>>VoLUNTEER</a>
                        </div>
                    </li>
                    <li class="first-itm">
                        <a href="/attraction"<?= Yii::$app->controller->route == 'site/attraction' ? ' class="active"' : null ?>>ATTRACTIONS</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>

</section>


<?= $content ?>


<section class="footer">
    <div class="footer__inner">
        <div class="container">
            <div class="footer__nav">
                <div class="footer-item">
                    <span class="footer-item__title">LINEUP</span>
                    <ul class="footer-item__list">
                        <li class="footer-item__list-item">
                            <a href="#line-up" class="smooth-line-up footer-item__list-link">Lineup 2018</a>
                        </li>
                        <li class="footer-item__list-item">
                            <a href="/line-up" class="footer-item__list-link">Past Lineups</a>
                        </li>
                    </ul>
                </div>
                <div class="footer-item">
                    <a href="/tickets" class="footer-item__title">PASSES</a>
                </div>
                <div class="footer-item">
                    <span class="footer-item__title">INFO</span>
                    <ul class="footer-item__list">
                        <li class="footer-item__list-item">
                            <a href="/faq" target="_blank" class="footer-item__list-link">FAQs</a>
                        </li>
                        <li class="footer-item__list-item">
                            <a href="/rules-and-regulations" target="_blank" class="footer-item__list-link">Rules and Regulations</a>
                        </li>

                    </ul>
                </div>
                <div class="footer-item">
                    <span class="footer-item__title">GET INVOLVED</span>
                    <ul class="footer-item__list">
                        <li class="footer-item__list-item">
                            <a href="/want-to" target="_blank" class="footer-item__list-link">Volunteers</a>
                        </li>
                    </ul>
                </div>
                <div class="footer-item">
                    <span class="footer-item__title">PRESS</span>

                </div>
            </div>
            <div class="footer-main">
                <div class="text-center">
                    <a href="/" class="footer-logo"><img src="/img/footer-logo.png" alt=""></a>
                </div>
                <ul class="footer__bottom-list">
                    <li><a href="#">Huckfinn 2018</a></li>
                </ul>
            </div>
        </div>
    </div>
</section>

<div class="modal fade" id="thx" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <div class="favicon"><img src="/img/footer-logo.png" alt=""></div>
                <p class="thx-message"><span>Thank you</span> we appreciate your interest to our HuckFinn 2018!</p>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="line_up_modal" style="display: none;">
    <div class="modal-dialog">
        <div class="line_up_modal_wrap">
            <div class="left">
                <div class="img"><img src="/img/line-up/line_up9.jpg" alt="" class="img-responsive"></div>
            </div>
            <div class="right">
                <h3>BLUE HIGHWAY</h3>
            </div>
        </div>
        <div class="text"><p>Highly esteemed bluegrass band Blue Highway has earned a collective 27 IBMA Awards, 6 SPBGMA Awards, one Dove Award, plus three Grammy nominations as a band, in addition to two prestigious Grammy Awards among its current members.</p><p>Blue Highway's newly released album "Original Traditional"  is nominated for a 2017 GRAMMY Award for Best Bluegrass Album.</p><p>Blue Highway was voted the Favorite Bluegrass Artist of All Time by the readers of Bluegrass Today in April 2016.</p><p>Wayne Taylor was the 2016 Inductee into the Virginia Country Music Hall of Fame, alongside legends like Patsy Cline, the Statler Brothers,  Jimmy Dean, Mother Maybelle Carter, and Roy Clark.</p><p>Tim Stafford received honors as 2015 SPBGMA Guitar Player of the Year and 2014 IBMA Songwriter of the Year, and Shawn Lane was nominated as 2015 IBMA Songwriter of the Year.</p><p>Blue Highway charted the Most Radio Airplay of any Bluegrass Artist in 2014, per the  2014 Bluegrass Radio Airplay Chart, storming national airplay charts with their heralded album The Game.</p></div>
        <span class="closee" data-dismiss="modal">close&nbsp;&nbsp;&nbsp;&nbsp;x</span>

    </div>
</div>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
