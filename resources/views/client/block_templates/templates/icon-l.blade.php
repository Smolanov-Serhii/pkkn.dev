<?php
$contents = $block->mappedByKey();
?>
<section class="icon-l">
    <h2 class="icon-l__title section-title">
        {{ $contents['title']['value'] ?? '' }}
    </h2>
    <div class="icon-l__container content-container">
        <img class="icon-l__dec-l" src="{{ url('/img/templates/icon-l/dec-l.svg') }}" alt="decoration">
        <div class="icon-l__content">
            <div class="icon-l__icon">
                <img src="{{  url('/') . '/uploads/contents/' . $contents['icon']['value'] ?? "" }}" alt="{{ $contents['title']['value'] ?? "" }}">
                <h3 class="icon-l__icon-title">
                    {{ $contents['icon name']['value'] ?? '' }}
                </h3>
            </div>
            <div class="icon-l__text">
                {!!  $contents['content']['value'] ?? ""  !!}
            </div>
        </div>
    </div>
</section>
