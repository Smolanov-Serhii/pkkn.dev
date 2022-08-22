<?php
$contents = $block->mappedByKey();
?>
<section class="single-product">
    <div class="single-product__container content-container">
        <div class="single-product__slider">
            <div class="swiper mySwiper2 swiper-container">
                <div class="swiper-wrapper">
                    @foreach($block->localeIterations as $iteration)
                        @php
                            $properties = $iteration->mappedByKey();
                        @endphp
                        <div class="swiper-slide">
                            <img src="{{  url('/') . '/uploads/contents/' . $properties['image']['value'] ?? "" }}" alt="{{ $properties['alt']['value'] ?? "" }}">
                        </div>
                    @endforeach
                </div>
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
            </div>
            <div thumbsSlider="" class="swiper mySwiper  swiper-container">
                <div class="swiper-wrapper">
                    @foreach($block->localeIterations as $iteration)
                        @php
                            $properties = $iteration->mappedByKey();
                        @endphp
                        <div class="swiper-slide">
                            <img src="{{  url('/') . '/uploads/contents/' . $properties['image']['value'] ?? "" }}" alt="{{ $properties['alt']['value'] ?? "" }}">
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="single-product__content">
            <h1 class="single-product__title section-title">
                {{ $contents['title']['value'] ?? "" }}
            </h1>
            <p class="single-product__subtitle section-subtitle">{{ $contents['subtitle']['value'] ?? "" }}</p>
            <div class="single-product__form blue-button">
                <span>{{ $contents['button']['value'] ?? "" }}</span>
            </div>
            {!! $contents['content']['value'] ?? "" !!}
        </div>
    </div>
</section>