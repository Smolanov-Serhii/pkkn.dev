<?php
$contents = $block->mappedByKey();
$module = \App\Models\Module::where('name', 'works')->first();
$items = $module->items;
?>
<section class="works">
    <div class="works__container content-container">
        <h2 class="works__title section-title">
            {{ $contents['title']['value'] ?? '' }}
        </h2>
        <div class="works__list">
            <img class="design-l" src="{{ url('/img/templates/works/design-l.svg') }}" alt="decoration">
            <img class="design-r" src="{{ url('/img/templates/works/design-r.svg') }}" alt="decoration">
            @foreach($items as $item)
                @php
                    $properties = $item->props->mapWithKeys(function ($prop) {
                    return [$prop->type->key => $prop->value];
                    });
                @endphp
                <a href="{{ route('client.works.item', ['alias' => $item->seo->alias]) }}" class="works__item">
                    <img class="bg" src="{{  url('/') . '/uploads/module_items/' . $properties['thumbnail'] }}"
                         alt="{{ $properties['title'] }}">
                    <img class="show" src="{{ url('/img/templates/works/show.svg') }}" alt="show item">
                </a>
            @endforeach
        </div>
        <div class="works__button">
            <a href="{{ url('/works') }}" class="blue-button"><span>{{ $contents['button']['value'] ?? '' }}</span></a>
        </div>
    </div>
</section>
