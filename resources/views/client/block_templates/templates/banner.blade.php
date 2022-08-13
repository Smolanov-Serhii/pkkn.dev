<?php
$contents = $block->mappedByKey();
?>
<section class="banner" data-aos="zoom-in">
    <div class="banner__navigate">
        <div class="banner__navigate-wrapper">
            <div class="swiper-prev">
                <svg width="68" height="68" viewBox="0 0 68 68" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <rect x="1" y="1" width="66" height="66" stroke="white" stroke-width="2"/>
                    <path d="M22.2929 33.2929C21.9024 33.6834 21.9024 34.3166 22.2929 34.7071L28.6569 41.0711C29.0474 41.4616 29.6805 41.4616 30.0711 41.0711C30.4616 40.6805 30.4616 40.0474 30.0711 39.6569L24.4142 34L30.0711 28.3431C30.4616 27.9526 30.4616 27.3195 30.0711 26.9289C29.6805 26.5384 29.0474 26.5384 28.6569 26.9289L22.2929 33.2929ZM48 33L23 33L23 35L48 35L48 33Z" fill="white"/>
                </svg>
            </div>
            <div class="swiper-next">
                <svg width="68" height="68" viewBox="0 0 68 68" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <rect x="67" y="67" width="66" height="66" transform="rotate(-180 67 67)" stroke="white" stroke-width="2"/>
                    <path d="M45.7071 34.7071C46.0976 34.3166 46.0976 33.6834 45.7071 33.2929L39.3431 26.9289C38.9526 26.5384 38.3195 26.5384 37.9289 26.9289C37.5384 27.3195 37.5384 27.9526 37.9289 28.3431L43.5858 34L37.9289 39.6569C37.5384 40.0474 37.5384 40.6805 37.9289 41.0711C38.3195 41.4616 38.9526 41.4616 39.3431 41.0711L45.7071 34.7071ZM20 35L45 35L45 33L20 33L20 35Z" fill="white"/>
                </svg>
            </div>
        </div>
    </div>
    <div class="banner__container swiper-container">
        <div class="banner__swiper swiper-wrapper">
            @foreach($block->localeIterations as $iteration)
                @php
                    $properties = $iteration->mappedByKey();
                @endphp
                <div class="banner__slide swiper-slide">
                    <div class="banner__slide-img">
                        <img src="{{  url('/') . '/uploads/contents/' . $properties['img-desktop']['value'] ?? "" }}" alt="{{ $properties['title']['value'] ?? "" }}">
                    </div>
                    <div class="banner__design">
                        <img class="banner__design-left" src="{{ url('/img/templates/banner/dec-left.svg') }}" alt="decoration">
                        <img class="banner__design-left-c" src="{{ url('/img/templates/banner/dec-c-left.svg') }}" alt="decoration">
                        <img class="banner__design-right" src="{{ url('/img/templates/banner/dec-right.svg') }}" alt="decoration">
                        <img class="banner__design-right-c" src="{{ url('/img/templates/banner/dec-c-right.svg') }}" alt="decoration">
                    </div>
                    <div class="banner__content content-container">
                        <div class="banner__block">
                            <div class="banner__title">
                                {!!   $properties['title']['value'] ?? ""!!}
                            </div>
                            <div class="banner__subtitle">
                                {!!   $properties['subtitle']['value'] ?? "" !!}
                            </div>
                            <a href="{{ $properties['lnk']['value'] ?? "" }}" class="banner__button blue-button">
                                <span>{{ $properties['button']['value'] ?? "" }}</span>
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
