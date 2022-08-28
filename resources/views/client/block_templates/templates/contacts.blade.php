<?php
$contents = $block->mappedByKey();
?>
<section class="contacts" data-aos="zoom-in">
    <div class="contacts__container tabs-elements">
        <h2 class="contacts__title section-title content-container">
            {{ $contents['title']['value'] ?? '' }}
        </h2>
        <div class="contacts__tabs content-container">
            @foreach($block->localeIterations as $iteration)
                @php
                    $properties = $iteration->mappedByKey();
                @endphp
                <label class="works-page__rubrik @if($loop->iteration == 1) active @endif tabs-nav-item">
                    <div class="works-page__rubrik-value">
                        {{ $properties['name']['value'] ?? "" }}
                    </div>
                </label>
            @endforeach
        </div>
        <div class="contacts__list" data-icon="{{  url('/img/templates/map/marker.svg') }}">
            @foreach($block->localeIterations as $iteration)
                @php
                    $properties = $iteration->mappedByKey();
                @endphp
                <div class="contacts__item @if($loop->iteration == 1) active @endif tabs-content-item">
{{--                    <img src="{{  url('/') . '/uploads/contents/' . $properties['icon']['value'] ?? "" }}" alt="{{ $properties['title']['value'] ?? "" }}">--}}
                    <div class="contacts__item-map" id="map-{{$loop->iteration}}" data-first="{{ $properties['first']['value'] ?? "" }}" data-second="{{ $properties['second']['value'] ?? "" }}">

                    </div>
                    <div class="contacts__item-content">
                        <div class="contacts__item-cont">
                            <div class="name">
                                Адресс:
                            </div>
                            <div class="value">
                                {{ $properties['adress']['value'] ?? "" }}
                            </div>
                        </div>
                        <div class="contacts__item-cont">
                            <div class="name">
                                Телефон:
                            </div>
                            <div class="value">
                                {{ $properties['phone']['value'] ?? "" }}
                            </div>
                        </div>
                        <div class="contacts__item-cont">
                            <div class="name">
                                E-mail:
                            </div>
                            <div class="value">
                                {{ $properties['email']['value'] ?? "" }}
                            </div>
                        </div>
                        <div class="contacts__item-cont">
                            <div class="name">
                                Время работы:
                            </div>
                            <div class="value">
                                {{ $properties['time']['value'] ?? "" }}
                            </div>
                        </div>
                        <div class="contacts__item-cont">
                            <div class="value">
                                {{ $properties['desc']['value'] ?? "" }}
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
