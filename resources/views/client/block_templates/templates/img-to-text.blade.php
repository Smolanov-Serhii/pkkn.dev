<?php
$contents = $block->mappedByKey();
?>
<section class="img-to-text">
    <div class="img-to-text__container content-container">
        <img class="img-to-text__design-right" src="{{ url('/img/templates/img-to-text/dec-right.png') }}" alt="decoration">
        @foreach($block->localeIterations as $iteration)
            @php
                $properties = $iteration->mappedByKey();
            @endphp
        <div class="img-to-text__item">
            <div class="img-to-text__wrapper">
                <div class="img-to-text__img">
                    <img src="{{  url('/') . '/uploads/contents/' . $properties['image']['value'] ?? "" }}" alt="">
                    <img class="show" src="{{ url('/img/templates/img-to-text/show.svg') }}" alt="show">
                </div>
                <div class="img-to-text__content">
                    <div class="img-to-text__content-wrapper">
                        {!! $properties['content']['value'] ?? '' !!}
                    </div>
                </div>
                @if($properties['lnk']['value'])
                    <a href="{{ url("/") . $properties['lnk']['value'] ?? "" }}" class="img-to-text__lnk">
                        Подробнее +
                    </a>
                @endif
                <div class="img-to-text__close">
                    Закрыть описание
                </div>
            </div>
            <h2 class="img-to-text__title">
                {{ $properties['title']['value'] ?? ""}}
            </h2>
        </div>
        @endforeach
    </div>
</section>
