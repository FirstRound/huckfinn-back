<?php

$this->title = $page->seo('title'). ' | Huckfinn';

?>

<section class="sec-lvl-4 camping-page-content">
    <div class="block-of-camping">
        <div class="container">
            <h1 class="text-center faq-title">Frequently Asked Questions</h1>
            <div class="faq">
                <?php foreach ($faqs as $faq) { ?>
                <div class="faq-item">
                    <p class="faq-question"><?= $faq->title ?></p>
                    <p class="faq-answer"><?= $faq->text ?></p>
                </div>
                <?php } ?>
            </div>
        </div>
    </div>
</section>
