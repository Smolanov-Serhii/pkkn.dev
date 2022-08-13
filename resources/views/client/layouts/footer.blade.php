<footer id="footer" class="footer">
    <div class="footer__container content-container">
        <div class="footer__brend">
            <a href="{{ url('/') }}">
                <img src="{{ url('/img/footer/logo-desktop.svg') }}" alt="">
            </a>
            <p>Общество с ограниченной ответственностью «Концепт Навигация» является разработчиком и производителем комплекса объектов линейной инфраструктуры наземного городского пассажирского транспорта, соответствующих требованиям Технического задания Департамента транспорта и развития дорожно-транспортной инфраструктуры города Москвы.</p>
        </div>
{{--        @foreach(\App\Models\Menu::where('title', 'qwe')->first()->getTree() as $item)--}}
{{--            <a href="{{local_url($item->slug)}}"> {!! $item->title !!}</a>--}}
{{--            @if(isset($item->children))--}}
{{--                @foreach($item->children as $m)--}}
{{--                    @foreach($m as $in=>$data)--}}
{{--                        @if(!is_null($data->img))--}}
{{--                            <img width="40" src="{{url('/uploads/menu_items/'.$data->img)}}" alt="">--}}
{{--                        @endif--}}
{{--                        <li style="margin-left: 20px;" class="@if(!is_null($data->class) && !empty($data->class)) {{$data->class}} @endif">--}}
{{--                            <a href="{{local_url($data->slug)}}">{{$data->title}}</a>--}}
{{--                        </li>--}}
{{--                    @endforeach--}}
{{--                @endforeach--}}
{{--            @endif--}}
{{--        @endforeach--}}
        <nav id="footer__nav" class="footer__nav">
            <div class="footer__nav-list">
                <h2 class="footer__nav-header">
                    Основные направления деятельности
                </h2>
                <ul class="left-column">
                    <li ><a href="{{ url('/methods') }}" class="mobile-menu__link">Методика</a></li>
                    <li ><a href="{{ url('/trainings') }}" class="mobile-menu__link">Тренировки</a></li>
                    <li ><a href="{{ url('/treners') }}" class="mobile-menu__link">Тренера</a></li>
                    <li ><a href="{{ url('/schedule') }}" class="mobile-menu__link">Расписание</a></li>
                    <li ><a href="{{ url('/reviews') }}" class="mobile-menu__link">Отзывы</a></li>
                    <li ><a href="{{ url('/blog') }}" class="mobile-menu__link">Блог</a></li>
                    <li ><a href="{{ url('/subscriptions') }}" class="mobile-menu__link">Подписки</a></li>
                </ul>
            </div>
            <div class="footer__nav-list">
                <h2 class="footer__nav-header">
                    Головной офис<br>
                    <br>
                </h2>
                <a class="footer__nav-item" href="#"><img src="{{ url('/img/header/phone.svg') }}" alt="phone">+7 495 662 50 01</a>
                <a class="footer__nav-item" href="#"><img src="{{ url('/img/header/mail.svg') }}" alt="phone">info@konceptnavi.ru</a>
                <div class="footer__nav-item"><img src="{{ url('/img/header/location.svg') }}" alt="phone">г.Москва, ул. Марьиной Рощи, д. 2А</div>
                <h2 class="footer__nav-header second">
                    График работы
                </h2>
                <div class="footer__nav-item"><img src="{{ url('/img/footer/time.svg') }}" alt="phone">С 9:00 до 18:00 Пн-Пт</div>
            </div>
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
            <h2 class="footer__nav-header">
                Подпишитесть на рассылку компании
            </h2>
            <form method="post">
                <label>
                    <img src="{{ url('/img/header/mail.svg') }}" alt="phone">
                    <input class="tnp-email" type="email" placeholder="Введите e-mail" required>
                </label>
                <button type="button" class="tnp-submit 1 blue-button"><span>ПОДПИСАТЬСЯ</span></button>
            </form>
            <p class="footer__subscribe-text">
                Заполняя форму, вы соглашаетесь на обработку персональных данных (ст.9 ФЗ от 27.07.2006 №152-ФЗ «О персональных данных»)
            </p>
        </div>
    </div>
    <div class="footer__underline">
        <div class="footer__underline-container content-container">
            <div class="footer__underline-copyright">
                <p>Copyright © 2022 ООО «Концепт Навигация»</p>
            </div>
            <div class="footer__underline-socials">
                <a class="footer__underline-item" href="#"><img src="{{ url('/img/header/facebook.svg') }}" alt="facebook"></a>
                <a class="footer__underline-item" href="#"><img src="{{ url('/img/header/vk.svg') }}" alt="vkontakte"></a>
                <a class="footer__underline-item" href="#"><img src="{{ url('/img/header/instagram.svg') }}" alt="instagram"></a>
            </div>
            <div class="footer__underline-links">
                <a href="#">Политика конфиденциальности</a>
                <span class="devider">|</span>
                <a href="#">Контакты</a>
            </div>
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
