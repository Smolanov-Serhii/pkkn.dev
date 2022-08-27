<?php
$contents = $block->mappedByKey();
$module = \App\Models\Module::where('name', 'news')->first();
$items = $module->items()->paginate(16);
?>
<section class="news-page">
    <div class="news-page__container content-container">
        <h1 class="news-page__title section-title">
            {{ $contents['title']['value'] }}
        </h1>
        <div class="works-page__contents">
            @foreach($items as $item)
                @php
                    $properties = $item->props->mapWithKeys(function ($prop) {
                    return [$prop->type->key => $prop->value];
                    });
                @endphp
                <div class="works-page__item">
                    <a href="{{ route('client.news.item', ['alias' => $item->seo->alias]) }}" class="news-page__item-image">
                        <img src="{{  url('/') . '/uploads/module_items/' . $properties['thumbnail'] }}"
                             alt="{{ $properties['title-exerpt'] }}">
                    </a>
                    <div class="news-page__item-date">
                        {{ $properties['date'] ?? ''}}
                    </div>
                    <a href="{{ route('client.news.item', ['alias' => $item->seo->alias]) }}" class="news-page__item-lnk">
                        <h2 class="news-page__item-title">{{ $properties['title-exerpt'] ?? ''}}</h2>
                    </a>
                    <div class="news-page__item-link">
                        <a href="{{ route('client.news.item', ['alias' => $item->seo->alias]) }}">Подробнее +</a>
                    </div>
                </div>
            @endforeach
                <div class="pagination">
                    @php
                        $class = "";
                        if($items->onFirstPage()){
                            $class="disabled";
                        }
                    @endphp

                    <a href="{{ $items->url(1) }}" class=" {{$class}} ">
                        <svg width="26" height="16" viewBox="0 0 26 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M6.65685 15.0711L0.292893 8.70716C-0.0976308 8.31663 -0.0976308 7.68347 0.292893 7.29294L6.65686 0.928983C7.04738 0.538459 7.68055 0.538459 8.07107 0.928983C8.46159 1.31951 8.46159 1.95267 8.07107 2.3432L3.41421 7.00005L26 7.00005L26 9.00005L3.41421 9.00005L8.07107 13.6569C8.46159 14.0474 8.46159 14.6806 8.07107 15.0711C7.68054 15.4616 7.04738 15.4616 6.65685 15.0711Z" fill="#ABB2D0"/>
                        </svg>
                    </a>

                    <ul class="pagination__wrapper">
                        @foreach(range(1, $items->lastPage()) as $page_num)
                            <li>
                                @if($items->currentPage() == $page_num)
                                    <span class="current">{{ $page_num }}</span>
                                @else
                                    <a class="pagination__link" href="{{ $items->url($page_num) }}">{{ $page_num }}</a>
                                @endif
                            </li>
                        @endforeach
                    </ul>
                    <a href="{{ $items->url($items->lastPage()) }}">
                        <svg width="26" height="16" viewBox="0 0 26 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M19.3431 0.928883L25.7071 7.29284C26.0976 7.68337 26.0976 8.31653 25.7071 8.70706L19.3431 15.071C18.9526 15.4615 18.3195 15.4615 17.9289 15.071C17.5384 14.6805 17.5384 14.0473 17.9289 13.6568L22.5858 8.99995L-1.4624e-06 8.99995L-1.11271e-06 6.99995L22.5858 6.99995L17.9289 2.3431C17.5384 1.95257 17.5384 1.31941 17.9289 0.928883C18.3195 0.538358 18.9526 0.538359 19.3431 0.928883Z" fill="#ABB2D0"/>
                        </svg>
                    </a>
                </div>
        </div>
    </div>
</section>
