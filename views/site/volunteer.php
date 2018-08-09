<?php

$this->title = $page->seo('title'). ' | Huckfinn';

$this->registerCss("
    .form_link {
        font: 35px NORTHWEST;
        color: #fff;
        transition: 0.3s;
        background: #023546;
        padding: 12px 50px 20px;
        display: inline-block;
        margin-bottom: 80px;
    }
    .form_link:hover {
        color: #f4b718;
    }
");

?>

<section class="sec-lvl-4 camping-page-content">
    <div class="block-of-camping">
        <div class="container">
            <h1>Want to Volunteer? Tell us about yourself!</h1>
            <p class="text-center"><a href="https://goo.gl/forms/QdB9rq89C8YxkW073" target="_blank" class="form_link">Fill in the form</a></p>
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
                                <!--  <a href="https://www.facebook.com/plugins/group/join/popup/?group_id=649296185444868&source=email_campaign_plugin" target="_blank">Sign In With Facebook</a> -->
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
