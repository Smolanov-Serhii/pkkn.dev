<footer id="footer" class="footer">
    <div class="footer__container main-container">
        <div class="footer__brend">
            <a href="{{ url('/') }}">
                <img src="{{ url('/img/header/logo-desktop.svg') }}" alt="">
            </a>
            <p>Сайт рыбатекст поможет дизайнеру, верстальщику, вебмастеру сгенерировать несколько абзацев более менее осмысленного текста</p>
            <div class="footer__callback button-stroke js-callback">
                <span>обратный звонок</span>
            </div>
        </div>
        @foreach(\App\Models\Menu::where('title', 'qwe')->first()->getTree() as $item)
            <a href="{{local_url($item->slug)}}"> {!! $item->title !!}</a>
            @if(isset($item->children))
                @foreach($item->children as $m)
                    @foreach($m as $in=>$data)
                        @if(!is_null($data->img))
                            <img width="40" src="{{url('/uploads/menu_items/'.$data->img)}}" alt="">
                        @endif
                        <li style="margin-left: 20px;" class="@if(!is_null($data->class) && !empty($data->class)) {{$data->class}} @endif">
                            <a href="{{local_url($data->slug)}}">{{$data->title}}</a>
                        </li>
                    @endforeach
                @endforeach
            @endif
        @endforeach
        <nav id="footer__nav" class="footer__nav">
            <ul class="left-column">
                <li ><a href="{{ url('/methods') }}" class="mobile-menu__link">Методика</a></li>
                <li ><a href="{{ url('/trainings') }}" class="mobile-menu__link">Тренировки</a></li>
                <li ><a href="{{ url('/treners') }}" class="mobile-menu__link">Тренера</a></li>
                <li ><a href="{{ url('/schedule') }}" class="mobile-menu__link">Расписание</a></li>
                <li ><a href="{{ url('/reviews') }}" class="mobile-menu__link">Отзывы</a></li>
                <li ><a href="{{ url('/blog') }}" class="mobile-menu__link">Блог</a></li>
                <li ><a href="{{ url('/subscriptions') }}" class="mobile-menu__link">Подписки</a></li>
            </ul>
            <ul class="right-column">
                <li><a href="#">Методика</a></li>
                <li><a href="#">Стать инвестором</a></li>
                <li><a href="#">Политика возврата</a></li>
                <li><a href="#">Партнерская программа</a></li>
            </ul>
        </nav>
{{--        <div class="footer__contacts">--}}
{{--            <a href="tel:+7 (495) 748-97-38">+7 (495) 748-97-38</a>--}}
{{--            <a href="mailto:NAITRE@GMAIL.COM">NAITRE@GMAIL.COM</a>--}}
{{--            <a href="#">Instagram</a>--}}
{{--            <a href="#">Vkontakte</a>--}}
{{--            <a href="#">Facebook</a>--}}
{{--            <a href="#">Telegram</a>--}}
{{--        </div>--}}
        <div class="footer__subscribe">
            <h3 class="footer-widget">
                ПРИСОЕДИНЯЙТЕСЬ К ДВИЖЕНИЮ NAITRE
            </h3>
            <p class="footer-widget-text">
                Подпишитесь, чтобы получать советы по фитнесу, приемы и мотивации прямо в Ваш почтовый ящик каждую неделю
            </p>
            <form method="post">
                <input class="tnp-email" type="email" placeholder="Введите e-mail" required>
                <button type="button" class="tnp-submit 1">ПОДПИСАТЬСЯ</button>
            </form>
        </div>
    </div>
</footer>

@section('client_scripts')
    <script>
        $('document').ready(function() {
            $('.tnp-submit').click(function() {
                var email = $(this).parent().find('input[type="email"]').val();
                var form = $(this).parent();

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    method: "POST",
                    url: "{{route('client.letter.store')}}",
                    data: {
                        'email': email,
                    }
                })
                    .done(function (response) {
                        if (response.status == false) {
                            $(form).after('<span>Вы уже подписаны!</span>')
                        } else {
                            $(form).after('<span>Мы Вас подписали!</span>')
                        }

                        $(form).find('input[type="email"]').val('');
                    });
            })

            $('body').on('click', '.favorite-action', function() {
                var block = $(this);
                var module_item_id = $(this).data('id');

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    method: "POST",
                    url: "{{route('client.module.item.sync')}}",
                    data: {
                        'module_item_id': module_item_id,
                    }
                })
                    .done(function (response) {
                        if (response.status == true) {
                            $(block).find('path').attr('fill', '#f52905');
                        } else {
                            $(block).find('path').attr('fill', '#0E6D8B');
                        }
                    });
            })
        })
    </script>
@endsection
