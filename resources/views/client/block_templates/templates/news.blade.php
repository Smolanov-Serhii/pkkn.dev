<?php
$contents = $block->mappedByKey();
$module = \App\Models\Module::where('name', 'news')->first();
$items = $module->items;
?>
<section class="news">
    <div class="news__container content-container">
        <h2 class="news__title section-title">
            {{ $contents['title']['value'] ?? '' }}
        </h2>
        <div class="news__list">
            <img class="design-r" src="{{ url('/img/templates/news/design-r.svg') }}" alt="decoration">
            @foreach($items as $item)
                @php
                    $properties = $item->props->mapWithKeys(function ($prop) {
                    return [$prop->type->key => $prop->value];
                    });
                @endphp
                <div class="news__item">
                    <div class="news__item-img">
                        <img class="bg" src="{{  url('/') . '/uploads/module_items/' . $properties['thumbnail'] }}"
                             alt="{{ $properties['title-exerpt'] }}">
                    </div>
                    <div class="news__item-date">
                        {{ $properties['date'] }}
                    </div>
                    <a href="{{ route('client.news.item', ['alias' => $item->seo->alias]) }}">
                        <h3 class="news__item-title">
                            {{ $properties['title-exerpt'] }}
                        </h3>
                    </a>
                    <div class="news__item-lnk">
                        <a href="{{ route('client.news.item', ['alias' => $item->seo->alias]) }}">
                            Подробнее
                            <svg width="9" height="10" viewBox="0 0 9 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <rect x="4" y="0.5" width="1" height="9" fill="#0074FF"/>
                                <rect y="5.5" width="1" height="9" transform="rotate(-90 0 5.5)" fill="#0074FF"/>
                            </svg>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="news__button">
            <a href="{{ url('/news') }}" class="blue-button"><span>{{ $contents['button']['value'] ?? '' }}</span></a>
        </div>
    </div>
</section>
