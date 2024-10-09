<section class="event-area pt-120 extra-padding sub-bg">
    <div class="container">
        <div class="d-flex align-items-center justify-content-between gap-4 flex-wrap mb-40">
            <div class="section-header">
                <h2 class="wow fadeInUp" data-wow-delay="200ms" data-wow-duration="1500ms"
                    style="visibility: visible; animation-duration: 1500ms; animation-delay: 200ms; animation-name: fadeInUp;">
                        <?= Yii::t('app', 'News')?>
                </h2>
                <p class="wow fadeInUp" data-wow-delay="00ms" data-wow-duration="1500ms"
                   style="visibility: visible; animation-duration: 1500ms; animation-delay: 0ms; animation-name: fadeInUp;">
                    <?= Yii::t('app', 'Get to know university life and events')?></p>
            </div>
            <div class="d-flex align-items-center gap-3 wow fadeInUp" data-wow-delay="400ms"
                 data-wow-duration="1500ms"
                 style="visibility: visible; animation-duration: 1500ms; animation-delay: 400ms; animation-name: fadeInUp;">
                <button class="arry-prev event__arry-prev" tabindex="0" aria-label="Previous slide"
                        aria-controls="swiper-wrapper-ce63e8421dd67bfb"><i
                        class="fa-solid fa-arrow-left"></i></button>
                <button class="arry-next event__arry-next active" tabindex="0" aria-label="Next slide"
                        aria-controls="swiper-wrapper-ce63e8421dd67bfb"><i
                        class="fa-solid fa-arrow-right"></i></button>
            </div>
        </div>
        <div
            class="swiper event__slider swiper-initialized swiper-horizontal swiper-pointer-events swiper-backface-hidden">
            <div class="swiper-wrapper" id="swiper-wrapper-ce63e8421dd67bfb" aria-live="polite"
                 style="transform: translate3d(-1194px, 0px, 0px); transition-duration: 0ms;">
                <?= $this->render($view, [
                    'models' => $models,
                ]) ?>

            </div>
            <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span>
        </div>
    </div>
</section>