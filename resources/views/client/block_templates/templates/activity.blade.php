<?php
$contents = $block->mappedByKey();
$module = \App\Models\Module::where('name', 'activitys')->first();
$items = $module->items;
?>
<section class="activity">
    <div class="activity__container content-container">
        <div class="activity__design">
            <img class="activity__design-left" src="{{ url('/img/templates/activity/design-left.svg') }}" alt="decoration">
            <img class="activity__design-right" src="{{ url('/img/templates/activity/design-right.svg') }}" alt="decoration">
        </div>
        <h2 class="activity__title section-title">
            {{ $contents['title']['value'] ?? '' }}
        </h2>
        <p class="activity__subtitle section-subtitle">
            {{ $contents['subtitle']['value'] ?? '' }}
        </p>
        <div class="activity__list">
            @foreach($items as $item)
                @php
                    $properties = $item->props->mapWithKeys(function ($prop) {
                    return [$prop->type->key => $prop->value];
                    });
                @endphp
                <div class="activity__item">
                    <div class="activity__item-img">
                        <img src="{{  url('/') . '/uploads/module_items/' . $properties['icon-item'] ?? '' }}" alt="{{ $properties['title-item'] ?? "" }}">
{{--                        <img src="{{  url('/img/templates/activity/icon' . $loop->iteration . '.svg') }}" alt="{{ $properties['desc']['value'] ?? "" }}">--}}
                    </div>
                    <p class="activity__item-desc">
                        {{ $properties['title-item'] ?? "" }}
                    </p>
                    <a href="{{ route('client.activitys.item', ['alias' => $item->seo->alias]) }}">Подробнее
                        <svg width="9" height="10" viewBox="0 0 9 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect x="4" y="0.5" width="1" height="9" fill="#ABB2D0"/>
                            <rect y="5.5" width="1" height="9" transform="rotate(-90 0 5.5)" fill="#ABB2D0"/>
                        </svg>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</section>