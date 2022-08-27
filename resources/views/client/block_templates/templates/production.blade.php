<?php
$contents = $block->mappedByKey();
$module = \App\Models\Module::where('name', 'productions')->first();
$items = $module->items;
?>
<section class="production">
    <div class="production__container content-container">
        <h2 class="production__title section-title">
            {{ $contents['title']['value'] ?? '' }}
        </h2>
        <div class="production__subtitle section-subtitle">
            {!!   $contents['subtitle']['value'] ?? '' !!}
        </div>
        <div class="production__slider">
            <div class="swiper-container">
                <div class="production__list swiper-wrapper">
                    @foreach($items as $item)
                        @php
                            $properties = $item->props->mapWithKeys(function ($prop) {
                            return [$prop->type->key => $prop->value];
                            });
                        @endphp
                        <a href="{{ route('client.productions.item', ['alias' => $item->seo->alias]) }}" class="production__item swiper-slide">
                            <img class="bg" src="{{  url('/') . '/uploads/module_items/' . $properties['thumbnail'] }}"
                                 alt="{{ $properties['title'] }}">
                        </a>
                    @endforeach
                </div>
            </div>
            <div class="production__navigation">
                <div class="production__navigation-prev">
                    <svg width="26" height="16" viewBox="0 0 26 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M6.65685 15.0711L0.292893 8.70716C-0.0976308 8.31663 -0.0976308 7.68347 0.292893 7.29294L6.65686 0.928983C7.04738 0.538459 7.68055 0.538459 8.07107 0.928983C8.46159 1.31951 8.46159 1.95267 8.07107 2.3432L3.41421 7.00005L26 7.00005L26 9.00005L3.41421 9.00005L8.07107 13.6569C8.46159 14.0474 8.46159 14.6806 8.07107 15.0711C7.68054 15.4616 7.04738 15.4616 6.65685 15.0711Z" fill="#ABB2D0"/>
                    </svg>
                </div>
                <div class="production__navigation-next">
                    <svg width="26" height="16" viewBox="0 0 26 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M19.3431 0.92888L25.7071 7.29284C26.0976 7.68337 26.0976 8.31653 25.7071 8.70706L19.3431 15.071C18.9526 15.4615 18.3195 15.4615 17.9289 15.071C17.5384 14.6805 17.5384 14.0473 17.9289 13.6568L22.5858 8.99995L0 8.99994V6.99994L22.5858 6.99995L17.9289 2.34309C17.5384 1.95257 17.5384 1.3194 17.9289 0.92888C18.3195 0.538355 18.9526 0.538355 19.3431 0.92888Z" fill="#ABB2D0"/>
                    </svg>
                </div>
            </div>
        </div>

    </div>
</section>
