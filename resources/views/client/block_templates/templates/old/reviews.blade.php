<?php
$contents = $block->mappedByKey();
$module = \App\Models\Module::where('name', 'reviews')->first();
$items = $module->items;
?>
<section class="reviews">
    <div class="reviews__container main-container">
        <div class="reviews__left">
            <div class="reviews__banner">
                <h1 class="reviews__title">{!! $contents['title']['value'] !!}</h1>
                <img src="{{  url('/') . '/uploads/contents/' . $contents['image']['value'] }}"
                     alt="{{ $contents['title']['value'] }}">
            </div>
            <form method="post" class="reviews__form">
                <h3 class="reviews__form-title">{!! $contents['formname']['value'] !!}</h3>
                <input
                        class="rating"
                        max="5"
                        oninput="this.style.setProperty('--value', this.value)"
                        step="1"
                        type="range"
                        value="1"
                        id="raye"
                        name="rate">
                @if(Auth::check() && Auth::user()->client)
                    @php
                        $name = Auth::user()->client->module->attrs->where('key', 'name')->first();
                        $sername = Auth::user()->client->module->attrs->where('key', 'Sername')->first();
                    @endphp
                    @if(Auth::user()->client && !empty(Auth::user()->client->props->where('module_attribute_id', $name->id)->first()->value) || !empty(Auth::user()->client->props->where('module_attribute_id', $sername->id)->first()->value))
                        <input type="text" placeholder="Имя" name="name" id="name" readonly value="{{Auth::user()->client->props->where('module_attribute_id', $name->id)->first()->value.' '.Auth::user()->client->props->where('module_attribute_id', $sername->id)->first()->value}}">
                    @else
                        <input type="text" placeholder="Имя" name="name" id="name" required>
                    @endif
                @else
                    <input type="text" placeholder="Имя" name="name" id="name">
                @endauth
                <input type="email" placeholder="E-mail" name="email" id="email">
                <textarea placeholder="Напишите свой комментарий" name="rev"></textarea>
                @auth
                    @if(Auth::user()->client)
                <button type="submit" class="button-bg send-review"><span>ОСТАВИТЬ ОТЗЫВ</span></button>
                        @endif
                @endauth
            </form>
        </div>
        <div class="reviews__list">
            @foreach($items as $item)
                @php
                    $properties = $item->props->mapWithKeys(function ($prop) {
                        return [$prop->type->key => $prop->value];
                    });
                @endphp
                @if($properties['is_approved'] != 0)
                    <div class="reviews__item">
                        <div class="reviews__item-header">
                            <div class="reviews__item-img">
                                <img src="{{  url('/') . '/uploads/module_items/' . $properties['photo'] }}"
                                     alt="{{ $properties['fio'] }}">
                            </div>
                            <div class="reviews__item-name">
                                {{ $properties['fio'] }}
                                <br>
                                {{ $properties['age'] }}
                            </div>
                            <div class="reviews__item-date">
                                {{ $properties['data'] }}
                            </div>
                            <div class="reviews__item-rate">
                                <div class="rating-result">
                                    @for ($i = 0; $i < 5; $i++)
                                        <span class="@if($i <= $properties['rate']) {{'active'}} @endif"></span>
                                    @endfor
                                </div>
                            </div>
                        </div>
                        <div class="reviews__item-wrapper">
                            <div class="reviews__item-content">
                                {!! $properties['rev'] !!}
                            </div>
{{--                            <div class="reviews__item-count">--}}
{{--                                <div class="like">--}}
{{--                                    <svg width="16" height="16" viewBox="0 0 16 16" fill="none"--}}
{{--                                         xmlns="http://www.w3.org/2000/svg">--}}
{{--                                        <path d="M16 9.50015C16 9.0995 15.8407 8.72615 15.566 8.45081C15.8773 8.11015 16.036 7.65347 15.9927 7.17815C15.9147 6.33081 15.1513 5.66681 14.254 5.66681H10.136C10.34 5.04746 10.6667 3.91215 10.6667 3.00015C10.6667 1.55415 9.438 0.333496 8.66666 0.333496C7.97466 0.333496 7.47931 0.723496 7.45866 0.739496C7.37931 0.80284 7.33331 0.89884 7.33331 1.00015V3.26081L5.41266 7.42015L5.33331 7.46081V7.33347C5.33331 7.14947 5.18397 7.00012 4.99997 7.00012H1.66666C0.747344 7.00015 0 7.7475 0 8.66681V14.0002C0 14.9195 0.747344 15.6668 1.66666 15.6668H3.66666C4.38731 15.6668 5.00331 15.2068 5.23531 14.5648C5.79 14.8502 6.53666 15.0002 7 15.0002H13.1193C13.8453 15.0002 14.4807 14.5108 14.63 13.8362C14.7067 13.4882 14.662 13.1382 14.51 12.8342C15.002 12.5868 15.3333 12.0782 15.3333 11.5002C15.3333 11.2642 15.2793 11.0382 15.1773 10.8342C15.6693 10.5862 16 10.0782 16 9.50015ZM14.594 10.3228C14.4653 10.3382 14.3567 10.4255 14.3153 10.5488C14.2747 10.6722 14.3087 10.8075 14.4033 10.8968C14.5727 11.0562 14.6667 11.2708 14.6667 11.5002C14.6667 11.9208 14.3487 12.2742 13.928 12.3228C13.7994 12.3382 13.6907 12.4255 13.6494 12.5488C13.6087 12.6722 13.6427 12.8075 13.7374 12.8968C13.9567 13.1035 14.0447 13.3935 13.9787 13.6922C13.8967 14.0642 13.5354 14.3335 13.1194 14.3335H7C6.45866 14.3335 5.55066 14.0795 5.236 13.7642C5.14066 13.6695 4.99666 13.6415 4.87266 13.6922C4.748 13.7435 4.66666 13.8655 4.66666 14.0002C4.66666 14.5515 4.218 15.0002 3.66666 15.0002H1.66666C1.11531 15.0002 0.666656 14.5515 0.666656 14.0002V8.66681C0.666656 8.11547 1.11531 7.66681 1.66666 7.66681H4.66666V8.00015C4.66666 8.1155 4.72666 8.22281 4.82531 8.28415C4.92266 8.34281 5.04531 8.34881 5.14931 8.29815L5.81597 7.96481C5.88331 7.93147 5.93731 7.87547 5.96931 7.80681L7.96931 3.47347C7.98931 3.42947 7.99997 3.38147 7.99997 3.33347V1.18081C8.13866 1.10415 8.37934 1.00015 8.66666 1.00015C9.032 1.00015 10 1.90815 10 3.00015C10 4.1735 9.36134 5.86481 9.35534 5.8815C9.31669 5.9835 9.33 6.09884 9.392 6.1895C9.45466 6.2795 9.55734 6.3335 9.66666 6.3335H14.254C14.81 6.3335 15.282 6.7315 15.3287 7.2395C15.364 7.6195 15.1813 7.98084 14.854 8.18284C14.752 8.2455 14.6913 8.35884 14.696 8.4795C14.7007 8.60015 14.77 8.70815 14.8767 8.7635C15.1587 8.90684 15.3333 9.1895 15.3333 9.50015C15.3333 9.92081 15.0153 10.2742 14.594 10.3228Z"--}}
{{--                                              fill="#0E6D8B"/>--}}
{{--                                        <path d="M5.00034 7.6665C4.81634 7.6665 4.66699 7.81585 4.66699 7.99985V13.9998C4.66699 14.1838 4.81634 14.3332 5.00034 14.3332C5.18434 14.3332 5.33368 14.1838 5.33368 13.9998V7.99985C5.33368 7.81585 5.18434 7.6665 5.00034 7.6665Z"--}}
{{--                                              fill="#0E6D8B"/>--}}
{{--                                    </svg>--}}
{{--                                    {{ $properties['like'] }}--}}
{{--                                </div>--}}
{{--                                <div class="dislike">--}}
{{--                                    <svg width="16" height="16" viewBox="0 0 16 16" fill="none"--}}
{{--                                         xmlns="http://www.w3.org/2000/svg">--}}
{{--                                        <path d="M0 6.49985C0 6.9005 0.159344 7.27385 0.434 7.54919C0.122656 7.88985 -0.0360005 8.34653 0.00734329 8.82185C0.0853433 9.66919 0.848688 10.3332 1.746 10.3332L5.864 10.3332C5.66 10.9525 5.33334 12.0878 5.33334 12.9998C5.33334 14.4458 6.562 15.6665 7.33334 15.6665C8.02534 15.6665 8.52069 15.2765 8.54134 15.2605C8.62069 15.1972 8.66669 15.1012 8.66669 14.9998V12.7392L10.5873 8.57985L10.6667 8.53919V8.66653C10.6667 8.85053 10.816 8.99988 11 8.99988H14.3333C15.2527 8.99985 16 8.2525 16 7.33319V1.99985C16 1.0805 15.2527 0.333189 14.3333 0.333189H12.3333C11.6127 0.333189 10.9967 0.793189 10.7647 1.43519C10.21 1.14985 9.46334 0.999846 9 0.999846L2.88066 0.999846C2.15466 0.999846 1.51931 1.48919 1.37 2.16385C1.29334 2.51185 1.338 2.86185 1.49 3.16585C0.998 3.41319 0.666656 3.92185 0.666656 4.49985C0.666656 4.73585 0.720657 4.96185 0.822657 5.16585C0.330657 5.41385 0 5.92185 0 6.49985ZM1.406 5.67719C1.53466 5.66185 1.64334 5.57453 1.68466 5.45119C1.72531 5.32785 1.69131 5.19253 1.59666 5.10319C1.42731 4.94385 1.33331 4.72919 1.33331 4.49985C1.33331 4.07919 1.65131 3.72585 2.07197 3.67719C2.20063 3.66185 2.30931 3.57453 2.35063 3.45119C2.39128 3.32785 2.35728 3.19253 2.26262 3.10319C2.04328 2.89653 1.95528 2.60653 2.02128 2.30785C2.10328 1.93585 2.46462 1.6665 2.88062 1.6665L9 1.6665C9.54134 1.6665 10.4493 1.9205 10.764 2.23585C10.8593 2.3305 11.0033 2.3585 11.1273 2.30785C11.252 2.2565 11.3333 2.1345 11.3333 1.99985C11.3333 1.4485 11.782 0.999846 12.3333 0.999846H14.3333C14.8847 0.999846 15.3333 1.4485 15.3333 1.99985V7.33319C15.3333 7.88453 14.8847 8.33319 14.3333 8.33319H11.3333V7.99985C11.3333 7.8845 11.2733 7.77719 11.1747 7.71585C11.0773 7.65719 10.9547 7.65119 10.8507 7.70185L10.184 8.03519C10.1167 8.06853 10.0627 8.12453 10.0307 8.19319L8.03069 12.5265C8.01069 12.5705 8.00003 12.6185 8.00003 12.6665V14.8192C7.86134 14.8958 7.62066 14.9998 7.33334 14.9998C6.968 14.9998 6 14.0918 6 12.9998C6 11.8265 6.63866 10.1352 6.64466 10.1185C6.68331 10.0165 6.67 9.90116 6.608 9.8105C6.54534 9.7205 6.44266 9.6665 6.33334 9.6665L1.746 9.6665C1.19 9.6665 0.718 9.2685 0.671344 8.7605C0.636 8.3805 0.818687 8.01916 1.146 7.81716C1.248 7.7545 1.30866 7.64116 1.304 7.5205C1.29934 7.39985 1.23 7.29185 1.12334 7.2365C0.841343 7.09316 0.666688 6.8105 0.666688 6.49985C0.666657 6.07919 0.984656 5.72585 1.406 5.67719Z"--}}
{{--                                              fill="#8D8D8D"/>--}}
{{--                                        <path d="M10.9997 8.3335C11.1837 8.3335 11.333 8.18415 11.333 8.00015V2.00015C11.333 1.81615 11.1837 1.66681 10.9997 1.66681C10.8157 1.66681 10.6663 1.81615 10.6663 2.00015V8.00015C10.6663 8.18415 10.8157 8.3335 10.9997 8.3335Z"--}}
{{--                                              fill="#8D8D8D"/>--}}
{{--                                    </svg>--}}
{{--                                    {{ $properties['dislike'] }}--}}
{{--                                </div>--}}
{{--                            </div>--}}
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    </div>
</section>

@section('client_scripts')
    <script>
        $('form .send-review').click(function (e) {
            var block = $(this);
            var rate = $(this).parent().find('input[name="rate"]');
            var name = $(this).parent().find('input[name="name"]');
            var email = $(this).parent().find('input[name="email"]');
            var rev = $(this).parent().find('textarea[name="rev"]');

            if ($(name).val() !== '') {
                e.preventDefault();
            } else {
                $('form.reviews__form').checkValidity();
            }

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                method: "POST",
                url: "{{route('client.reviews.store')}}",
                data: {
                    rate: $(rate).val(),
                    name: $(name).val(),
                    email: $(email).val(),
                    rev: $(rev).val(),
                }
            })
                .done(function (response) {
                    if (response.status == true) {
                        $(rate).val('');
                        $(name).val('');
                        $(email).val('');
                        $(rev).val('');
                        $(block).after('<p>Спасибо за отзыв!</p>');
                    }
                });
        });
    </script>
@endsection
