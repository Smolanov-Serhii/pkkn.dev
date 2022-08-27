<?php
$contents = $block->mappedByKey();
?>
<section class="partners" data-aos="zoom-in">
    <div class="partners__container content-container">
        <h2 class="partners__title section-title">
            {{ $contents['title']['value'] ?? '' }}
        </h2>
        <div class="partners__list">
            @foreach($block->localeIterations as $iteration)
                @php
                    $properties = $iteration->mappedByKey();
                @endphp
                <div class="partners__item">
{{--                    <img src="{{  url('/') . '/uploads/contents/' . $properties['icon']['value'] ?? "" }}" alt="{{ $properties['title']['value'] ?? "" }}">--}}
                </div>
            @endforeach
        </div>
    </div>
</section>
