<?php

$this->title = $page->seo('title');

?>

<section class="sec-instahacks">
    <div class="slider-wr">
        <div class="slider-init">
            <div class="one-slide">
                <div class="img-before">
                    <div class="img" style="background-image: url(/img/slide-1.jpg)"></div>
                </div>
            </div>
            <div class="one-slide">
                <div class="img-before">
                    <div class="img" style="background-image: url(/img/slide-2.jpg)"></div>
                </div>
            </div>
            <div class="one-slide">
                <div class="img-before">
                    <div class="img" style="background-image: url(/img/slide.jpg)"></div>
                </div>
            </div>
            <div class="one-slide">
                <div class="img-before">
                    <div class="img" style="background-image: url(/img/slide-4.jpg)"></div>
                </div>
            </div>
        </div>
    </div>


    <div class="m-w" id="line-up">
        <!-- <img src="img/new-text.png" alt="" class="instahucks-img"> -->
        <div class="line-up">
            <div class="line-up-wrap">
                <?php foreach ($items as $key => $it) {
                    $cl = null;
                    switch ($key) {
                        case 0: {
                            $cl = 'ex-lg';
                            break;
                        }
                        case 1: {
                            $cl = 'lg';
                            break;
                        }
                        case 2:
                        case 4: {
                            $cl = 'md';
                            break;
                        }
                        case 3:
                        case 5:
                        case 6:
                        case 7: {
                            $cl = 'md before';
                            break;
                        }
                        case 8:
                        case 14: {
                            $cl = 'sm';
                            break;
                        }
                        case 9:
                        case 10:
                        case 11:
                        case 12:
                        case 13:
                        case 15: {
                            $cl = 'sm before';
                            break;
                        }
                    }
                    if ($key == 8) {
                        echo '<div class="br"></div>';
                    }
                ?>
                    <div data-id="<?= $it->primaryKey ?>" class="<?= $cl ?>"><?= $it->title ?></div>
                <?php } ?>
            </div>
        </div>
        <h3>INSTAHUCKS</h3>
        <div class="flex-hucks-wrap">
            <div class="flex-hucks">
                <div class="side">
                    <div class="yellow-bg">
                        <div class="huck-img" id="0">
                            <video preload="yes" controls poster="/video/preload1.jpg">
                                <source src="/video/video1.mp4" type="video/mp4">
                            </video>
                        </div>
                        <p class="h">radio ramblers</p>
                        <div class="description">
                            <p class="s">The fiddles will be singing at Huck Finn this October 5, 6, and 7! For example, here’s a taste of what you can expect from Huck Finn artist, Joe Mullins & The Radio Rambler</p>
                        </div>
                        <a href="https://www.instagram.com/p/BlEzN-EHWYe/?taken-by=huckfinnjubilee" target="_blank">Learn more</a>
                    </div>
                </div>
                <div class="side">
                    <div class="yellow-bg">
                        <div class="huck-img">
                            <video preload="yes" controls poster="/video/preload2.jpg">
                                <source src="/video/video2.mp4" type="video/mp4">
                            </video>
                        </div>
                        <p class="h">the love canon</p>
                        <div class="description">
                            <p class="s">Along with crushing 80’s songs in bluegrass style, @thelovecanon is also made up of some of the best bluegrass pickers in the game! We can’t wait for you to experience these boys!</p>
                        </div>
                        <a href="https://www.instagram.com/p/BlCcEVpHCAn/?taken-by=huckfinnjubilee" target="_blank">Learn more</a>
                    </div>
                </div>
                <div class="side">
                    <div class="yellow-bg">
                        <div class="huck-img">
                            <video preload="yes" controls poster="/video/preload3.jpg">
                                <source src="/video/video3.mp4" type="video/mp4">
                            </video>
                        </div>
                        <p class="h">Gettysburg bluegrass</p>
                        <div class="description">
                            <p class="s">The legendary Seldom Scene is coming to Ontario, California for the 2018 Huck Finn Jubilee: bangbang: Incredible harmonies, classic songs and world-class picking is what you can expect from these boys.</p>
                        </div>
                        <a href="https://www.instagram.com/p/Bk58fWgndw-/?taken-by=huckfinnjubilee" target="_blank">Learn more</a>
                    </div>
                </div>
                <div class="side">
                    <div class="yellow-bg">
                        <div class="huck-img">
                            <video preload="yes" controls poster="/video/preload4.jpg">
                                <source src="/video/video4.mp4" type="video/mp4">
                            </video>
                        </div>
                        <p class="h">String dusters</p>
                        <div class="description">
                            <p class="s">We know you can ID this classic performed beautifully by the @stringdusters!</p>
                        </div>
                        <a href="https://www.instagram.com/p/Bk37J3RHuZf/?taken-by=huckfinnjubilee" target="_blank">Learn more</a>
                    </div>
                </div>
            </div>
            <a href="http://www.facebook.com/share.php?u=https://huckfinn2.herokuapp.com/index.html&title=HUCKFINN" target="_blank" class="banjo"><img src="/img/banjo.png" alt=""></a>
        </div>
    </div>

</section>
<section class="sec-lvl-4">
    <div class="bg-movie">
        <div class="iframe-wr" id="huckfinn-video">
            <div class="iframe-bg"></div>
            <p class="head-v">Huck Finn Jubilee</p>
            <iframe src="https://www.youtube.com/embed/-zx0bqX9qkY" frameborder="0" allowfullscreen></iframe>
            <div class="bott-video"></div>
        </div>
        <div class="descr-iframe">
            <a href="http://www.facebook.com/share.php?u=https://youtu.be/-zx0bqX9qkY" target="_blank" class="butt-share">Share the video</a>
            <p>Come amplify vibration| Resonate positivity| Be one with your people</p>
        </div>
    </div>
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
            <a href="#!" class="wagon-item wagon-left"><img src="/img/wagon-left-new.png" alt=""></a><!-- https://huckfinnjubilee201.wixsite.com/shop -->
            <div class="right-side">
                <a href="#!" class="wagon-item wagon-center"><img src="/img/wagon-center-new.png" alt=""></a><!-- https://huckfinnjubilee201.wixsite.com/shop -->
                <a href="#!" class="wagon-item wagon-right"><img src="/img/wagon-right-new.png" alt=""></a><!-- https://huckfinnjubilee201.wixsite.com/shop -->
            </div>
        </div>
    </div>
</section>
