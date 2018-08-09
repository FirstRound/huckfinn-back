<?php

$this->title = $page->seo('title'). ' | Huckfinn';

?>

<section class="sec-lvl-4 camping-page-content<?= Yii::$app->controller->route == 'site/rules' ? ' rules-bg' : null ?>">
    <div class="block-of-camping">
        <div class="container">
            <h1><?= $page->title ?></h1>
            <div class="blue-bg">
                <?= $page->text ?>

            </div>


        </div>
    </div>
    <div class="form-subscribe-padd">
        <div class="form-subscribe">
            <div class="m-w">
                <div class="left-side">
                    <a href="#!" class="wagon-baner"><img src="/img/wagon-baner-new.png" alt=""></a>
                    <div class="form-wrapp">
                        <div class="cloud-1">
                            <img src="/img/cloud-1.png" class="img-responsive" alt="">
                        </div>
                        <form id="form-subscribe" action="https://huckfinnsub.herokuapp.com/subscribers">
                            <p class="head-form">GET UPDATES</p>
                            <div>
                                <input type="text" id="email" placeholder="Email@email.com">
                            </div>
                            <div>
                                <input type="text" id="phone" placeholder="Phone for text update">
                            </div>
                            <div class="flex-buttons">
                                <button type="submit">Submit</button>
                                <!-- <a href="https://www.facebook.com/plugins/group/join/popup/?group_id=649296185444868&source=email_campaign_plugin" target="_blank">Sign In With Facebook</a> -->
                            </div>
                            <div class="soc-links">
                                <a href="https://www.facebook.com/HuckFinnJubilee/" target="_blank" class="soc fb"></a>
                                <a href="https://www.instagram.com/huckfinnjubilee" target="_blank" class="soc insta"></a>
                            </div>
                        </form>
                    </div>
                </div>
                <a href="#!" class="wagon-item wagon-left"><img src="/img/wagon-left-new.png" alt=""></a>
                <div class="right-side">
                    <a href="#!" class="wagon-item wagon-center"><img src="/img/wagon-center-new.png" alt=""></a>
                    <a href="#!" class="wagon-item wagon-right"><img src="/img/wagon-right-new.png" alt=""></a>
                </div>
            </div>
        </div>
    </div>
</section>
