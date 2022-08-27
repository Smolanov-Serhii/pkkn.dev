<?php
$contents = $block->mappedByKey();
?>
<section class="offer">
    <div class="offer__header content-container">
        <h2 class="offer__title section-title">
            {{ $contents['title']['value'] ?? '' }}
        </h2>
        <div class="offer__subtitle section-subtitle">{!!  $contents['subtitle']['value'] ?? ''  !!}</div>
    </div>
    <div class="offer__container">
        <div class="offer__image">
            <img class="design-l" src="{{ url('/img/templates/offer/design-l.svg') }}" alt="decoration">
            <img class="offer__image-bg" src="{{ "/uploads/contents/" . $contents['image']['value'] ?? '' }}" alt="{{ $contents['title']['value'] ?? '' }}">
        </div>
        <div class="offer__text">
            <div class="offer__text-wrapper">
                <div class="offer__content">
                    {!!  $contents['content']['value'] ?? ''  !!}
                </div>
                <div class="offer__btn">
                    <div class="blue-button js-form">
                        <span>Заказать консультацию</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
