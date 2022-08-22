<header id="header" class="header">
    <div class="header__container main-container">
        <a class="custom-logo-link" rel="home" aria-current="page" href="{{ url('/') }}">
            <img class="custom-logo lazyloaded" src="{{ url('/img/header/logo-desktop.svg') }}" alt="">
        </a>
        <div class="header__wrapper">
            <div class="header__contacts">
                <a class="header__contacts-item" href="tel:{{ $var['phone'] }}"><img src="{{ url('/img/header/phone.svg') }}" alt="phone">{{ $var['phone'] }}</a>
                <a class="header__contacts-item" href="mailto:{{ $var['e-mail'] }}"><img src="{{ url('/img/header/mail.svg') }}" alt="mail">{{ $var['e-mail'] }}</a>
                <div class="header__contacts-item"><img src="{{ url('/img/header/location.svg') }}" alt="location">{{ $var['adres'] }}</div>
            </div>
            <nav class="header__nav">
                <ul class="header__list">
                            @foreach(\App\Models\Menu::where('title', 'header')->first()->getTree() as $item)
                                @if(isset($item->children))
                                        <li class="header__item has-chield">
                                            <a href="{{local_url($item->slug)}}" class="header__lnk" > {!! $item->title !!}</a>
                                            <ul class="header__item-chield">
                                            @foreach($item->children as $m)
                                                @foreach($m as $in=>$data)
                                                    @if(!is_null($data->img))
                                                        <img width="40" src="{{url('/uploads/menu_items/'.$data->img)}}" alt="">
                                                    @endif
                                                    <li class="header__item @if(!is_null($data->class) && !empty($data->class)) {{$data->class}} @endif ">
                                                        <a class="header__lnk @if($item->slug == $page->seo->alias) current-page @endif" href="{{local_url($data->slug)}}">{{$data->title}}</a>
                                                    </li>
                                                @endforeach
                                            @endforeach
                                            </ul>
                                        </li>

                                @else
                                    <li class="header__item">
                                        <a href="{{local_url($item->slug)}}" class="header__lnk @if($item->slug == $page->seo->alias) current-page @endif" > {!! $item->title !!}</a>
                                    </li>
                                @endif
                            @endforeach
{{--                    <li class="header__item"><a href="#" class="header__lnk">О компании</a></li>--}}
{{--                    <li class="header__item"><a href="#" class="header__lnk">Услуги</a></li>--}}
{{--                    <li class="header__item"><a href="#" class="header__lnk">Продукция</a></li>--}}
{{--                    <li class="header__item"><a href="#" class="header__lnk">Наши работы</a></li>--}}
{{--                    <li class="header__item"><a href="#" class="header__lnk">контакты</a></li>--}}
                </ul>
                <form action="{{ route('client.search') }}" method="get">
                    <input type="text" placeholder="Поиск" name="query" value="{{ $query ?? '' }}" required>
                    <button>
                        <svg width="17" height="17" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M7.79902 1.642C6.16605 1.642 4.59996 2.29073 3.44528 3.44549C2.29059 4.60024 1.6419 6.16642 1.6419 7.79949C1.6419 9.43256 2.29059 10.9987 3.44528 12.1535C4.59996 13.3083 6.16605 13.957 7.79902 13.957C9.43199 13.957 10.9981 13.3083 12.1528 12.1535C13.3074 10.9987 13.9561 9.43256 13.9561 7.79949C13.9561 6.16642 13.3074 4.60024 12.1528 3.44549C10.9981 2.29073 9.43199 1.642 7.79902 1.642ZM2.28428 2.28442C3.74688 0.82173 5.73059 0 7.79902 0C9.86745 0 11.8512 0.82173 13.3138 2.28442C14.7764 3.74711 15.598 5.73094 15.598 7.79949C15.598 9.5912 14.9816 11.3193 13.8661 12.7003L17 15.84L15.838 17L12.7057 13.862C11.3238 14.9807 9.59328 15.599 7.79902 15.599C5.73059 15.599 3.74688 14.7773 2.28428 13.3146C0.82168 11.8519 0 9.86805 0 7.79949C0 5.73094 0.82168 3.74711 2.28428 2.28442Z" fill="#BDBDBD"/>
                        </svg>
                    </button>
                </form>
            </nav>
        </div>
        <div class="header__socials">
            <a class="header__socials-item" href="#"><img src="{{ url('/img/header/facebook.svg') }}" alt="facebook"></a>
            <a class="header__socials-item" href="#"><img src="{{ url('/img/header/vk.svg') }}" alt="vkontakte"></a>
            <a class="header__socials-item" href="#"><img src="{{ url('/img/header/instagram.svg') }}" alt="instagram"></a>
        </div>
    </div>
</header>
