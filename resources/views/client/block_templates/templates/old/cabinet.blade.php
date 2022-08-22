<?php
//$props = Auth::user()->client->props->mapWithKeys(function ($prop) {
//    return [$prop->type->key => $prop->value];
//});
//?>

<?php
$contents = $block->mappedByKey();
$module = \App\Models\Module::where('name', 'trainings')->first();
$items = $module->items;

$trenersmodule = \App\Models\Module::where('name', 'treners')->first();
$trenersitems = $trenersmodule->items;

$arr = [
    'январь',
    'февраль',
    'март',
    'апрель',
    'май',
    'июнь',
    'июль',
    'август',
    'сентябрь',
    'октябрь',
    'ноябрь',
    'декабрь'
];

// Поскольку от 1 до 12, а в массиве, как мы знаем, отсчет идет от нуля (0 до 11),
// то вычитаем 1 чтоб правильно выбрать уже из нашего массива.

$month = date('n')-1;

?>

<section class="cabinet">
{{--    @foreach($props as $prop)--}}
{{--        <p>{{$prop}}</p>--}}
{{--    @endforeach--}}
    <div class="cabinet__container main-container">
        <aside class="cabinet__aside">
            <div class="cabinet__sidebar">
                <div class="cabinet__detail">
                    <h2 class="cabinet__detail-title cabinet__title">
                        Личная информация
                        <svg width="23" height="5" viewBox="0 0 23 5" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <circle cx="2.5" cy="2.5" r="2.5" fill="#0E6D8B"/>
                            <circle cx="11.5" cy="2.5" r="2.5" fill="#0E6D8B"/>
                            <circle cx="20.5" cy="2.5" r="2.5" fill="#0E6D8B"/>
                        </svg>
                    </h2>
                    <div class="cabinet__detail-photo">
                        <img src="{{ '/img/templates/cabinet/photo.jpg' }}" alt="">
                        <div class="change-photo">Изменить фото</div>
                    </div>
                    <div class="cabinet__detail-data">
                        <div class="cabinet__detail-name">
                            Иванна Иванова
                            <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M10.3293 0.8244C9.7245 0.220643 8.74507 0.220643 8.14024 0.8244L7.59227 1.37538L1.75914 7.2054L1.74675 7.2179C1.74374 7.2209 1.74374 7.2241 1.74055 7.2241C1.73435 7.23339 1.72505 7.2426 1.71895 7.25189C1.71895 7.25499 1.71575 7.25499 1.71575 7.25809C1.70956 7.26739 1.70655 7.27359 1.70026 7.28288C1.69726 7.28598 1.69726 7.28899 1.69416 7.29218C1.69106 7.30148 1.68796 7.30768 1.68476 7.31698C1.68476 7.31998 1.68176 7.31998 1.68176 7.32317L0.387564 11.215C0.349599 11.3258 0.37846 11.4485 0.461847 11.5307C0.520441 11.5885 0.59947 11.6209 0.681695 11.6206C0.715301 11.62 0.748617 11.6148 0.780771 11.6051L4.66956 10.3078C4.67256 10.3078 4.67256 10.3078 4.67576 10.3048C4.68554 10.3019 4.69493 10.2977 4.70355 10.2923C4.70597 10.292 4.7081 10.2909 4.70985 10.2893C4.71905 10.2831 4.73144 10.2768 4.74074 10.2706C4.74994 10.2645 4.75934 10.2552 4.76863 10.249C4.77173 10.2458 4.77473 10.2458 4.77473 10.2428C4.77793 10.2397 4.78413 10.2367 4.78723 10.2304L11.1683 3.84929C11.7721 3.24447 11.7721 2.26503 11.1683 1.66031L10.3293 0.8244ZM4.57048 9.58015L2.41559 7.42535L7.80902 2.03192L9.96391 4.18671L4.57048 9.58015ZM2.11206 7.99812L3.99461 9.88057L1.16778 10.8218L2.11206 7.99812ZM10.7318 3.41579L10.4036 3.74711L8.24862 1.59212L8.58004 1.2609C8.94254 0.898684 9.53013 0.898684 9.89273 1.2609L10.7348 2.103C11.0946 2.46716 11.0933 3.05338 10.7318 3.41579Z" fill="#0E6D8B"/>
                            </svg>
                        </div>
                        <div class="cabinet__detail-phone">
                            +38098 123 45 67
                            <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M10.3293 0.8244C9.7245 0.220643 8.74507 0.220643 8.14024 0.8244L7.59227 1.37538L1.75914 7.2054L1.74675 7.2179C1.74374 7.2209 1.74374 7.2241 1.74055 7.2241C1.73435 7.23339 1.72505 7.2426 1.71895 7.25189C1.71895 7.25499 1.71575 7.25499 1.71575 7.25809C1.70956 7.26739 1.70655 7.27359 1.70026 7.28288C1.69726 7.28598 1.69726 7.28899 1.69416 7.29218C1.69106 7.30148 1.68796 7.30768 1.68476 7.31698C1.68476 7.31998 1.68176 7.31998 1.68176 7.32317L0.387564 11.215C0.349599 11.3258 0.37846 11.4485 0.461847 11.5307C0.520441 11.5885 0.59947 11.6209 0.681695 11.6206C0.715301 11.62 0.748617 11.6148 0.780771 11.6051L4.66956 10.3078C4.67256 10.3078 4.67256 10.3078 4.67576 10.3048C4.68554 10.3019 4.69493 10.2977 4.70355 10.2923C4.70597 10.292 4.7081 10.2909 4.70985 10.2893C4.71905 10.2831 4.73144 10.2768 4.74074 10.2706C4.74994 10.2645 4.75934 10.2552 4.76863 10.249C4.77173 10.2458 4.77473 10.2458 4.77473 10.2428C4.77793 10.2397 4.78413 10.2367 4.78723 10.2304L11.1683 3.84929C11.7721 3.24447 11.7721 2.26503 11.1683 1.66031L10.3293 0.8244ZM4.57048 9.58015L2.41559 7.42535L7.80902 2.03192L9.96391 4.18671L4.57048 9.58015ZM2.11206 7.99812L3.99461 9.88057L1.16778 10.8218L2.11206 7.99812ZM10.7318 3.41579L10.4036 3.74711L8.24862 1.59212L8.58004 1.2609C8.94254 0.898684 9.53013 0.898684 9.89273 1.2609L10.7348 2.103C11.0946 2.46716 11.0933 3.05338 10.7318 3.41579Z" fill="#0E6D8B"/>
                            </svg>
                        </div>
                        <div class="cabinet__detail-mail">
                            ivannaivanna@gmail.com
                            <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M10.3293 0.8244C9.7245 0.220643 8.74507 0.220643 8.14024 0.8244L7.59227 1.37538L1.75914 7.2054L1.74675 7.2179C1.74374 7.2209 1.74374 7.2241 1.74055 7.2241C1.73435 7.23339 1.72505 7.2426 1.71895 7.25189C1.71895 7.25499 1.71575 7.25499 1.71575 7.25809C1.70956 7.26739 1.70655 7.27359 1.70026 7.28288C1.69726 7.28598 1.69726 7.28899 1.69416 7.29218C1.69106 7.30148 1.68796 7.30768 1.68476 7.31698C1.68476 7.31998 1.68176 7.31998 1.68176 7.32317L0.387564 11.215C0.349599 11.3258 0.37846 11.4485 0.461847 11.5307C0.520441 11.5885 0.59947 11.6209 0.681695 11.6206C0.715301 11.62 0.748617 11.6148 0.780771 11.6051L4.66956 10.3078C4.67256 10.3078 4.67256 10.3078 4.67576 10.3048C4.68554 10.3019 4.69493 10.2977 4.70355 10.2923C4.70597 10.292 4.7081 10.2909 4.70985 10.2893C4.71905 10.2831 4.73144 10.2768 4.74074 10.2706C4.74994 10.2645 4.75934 10.2552 4.76863 10.249C4.77173 10.2458 4.77473 10.2458 4.77473 10.2428C4.77793 10.2397 4.78413 10.2367 4.78723 10.2304L11.1683 3.84929C11.7721 3.24447 11.7721 2.26503 11.1683 1.66031L10.3293 0.8244ZM4.57048 9.58015L2.41559 7.42535L7.80902 2.03192L9.96391 4.18671L4.57048 9.58015ZM2.11206 7.99812L3.99461 9.88057L1.16778 10.8218L2.11206 7.99812ZM10.7318 3.41579L10.4036 3.74711L8.24862 1.59212L8.58004 1.2609C8.94254 0.898684 9.53013 0.898684 9.89273 1.2609L10.7348 2.103C11.0946 2.46716 11.0933 3.05338 10.7318 3.41579Z" fill="#0E6D8B"/>
                            </svg>
                        </div>
                        <div class="cabinet__detail-save button-bg">
                            <span>сохранить</span>
                        </div>
                    </div>
                </div>
                <div class="cabinet__balance">
                    <p class="cabinet__balance-title">
                        Мой баланс
                    </p>
                    <div class="cabinet__balance-wallet">
                        6000
                    </div>
                    <div class="cabinet__balance-add">
                        <a class="button-stroke">
                            <span>пополнить</span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="cabinet__sidebar">
                <div class="cabinet__history">
                    <h2 class="cabinet__detail-title cabinet__title">
                        История тренировок
                    </h2>
                    <div class="cabinet__history-list">
                        <div class="cabinet__history-item">
                            <p class="cabinet__history-title">Всего тренировок</p>
                            <span class="cabinet__history-count">239</span>
                        </div>
                        <div class="cabinet__history-item">
                            <p class="cabinet__history-title">Результативность</p>
                            <span class="cabinet__history-count">70%</span>
                        </div>
                        <div class="cabinet__history-item">
                            <p class="cabinet__history-title">Среднее кол-во калл</p>
                            <span class="cabinet__history-count">25362</span>
                        </div>
                    </div>
                </div>
            </div>
        </aside>
        <div class="cabinet__content">
            <div class="cabinet__content-header">
                <div class="cabinet__content-dost">
                    <h2 class="cabinet__content-title cabinet__title">
                        Мои достижения
                    </h2>
                    <div class="img-wrapper">
                        <img src="{{ '/img/templates/cabinet/level.png' }}" alt="">
                    </div>
                </div>
                <div class="cabinet__content-rel">
                    <h2 class="cabinet__content-title cabinet__title">
                        Пригласить друзей
                    </h2>
                    <div class="wrapper">
                        <p>Мой кэшбэк</p>
                        <div class="wallet">
                            6200
                        </div>
                    </div>
                    <div class="cabinet__detail-save button-bg">
                        <span>пригласить друга</span>
                    </div>
                </div>
                <div class="cabinet__content-gift">
                    <h2 class="cabinet__content-title cabinet__title">
                        Подарить подписку
                    </h2>

                    <p>Сайт рыбатекст поможет дизайнеру, верстальщику, вебмастеру сгенерировать несколько абзацев более менее</p>
                    <div class="cabinet__detail-save button-bg">
                        <span>подарить подписку</span>
                    </div>
                </div>
            </div>
            <div class="cabinet__viewport tabs-elements">
                <div class="cabinet__viewport-tabs">
                    <div class="cabinet__viewport-tab tabs-nav-item">
                        Расписание
                    </div>
                    <div class="cabinet__viewport-tab tabs-nav-item">
                        тренировки
                    </div>
                    <div class="cabinet__viewport-tab tabs-nav-item">
                        Тренеры
                    </div>
                    <div class="cabinet__viewport-tab tabs-nav-item">
                        избранное
                    </div>
                    <div class="cabinet__viewport-tab tabs-nav-item">
                        Online-трансляция
                    </div>
                </div>
                <div class="cabinet__viewport-contents">
                    <div class="cabinet__viewport-content tabs-content-item cabinet__timetable">
                        <div class="cabinet__timetable-table">
                            <div class="cabinet__timetable-calendar">
                                <div class="calendar-wrapper">
                                    <table>
                                        <tr>
                                            <td><div id="divCal"></div></td>
                                            <td style="background-image: url({{ '/img/templates/cabinet/calendar.jpg' }})"></td>
                                        </tr>
                                        <tr class="table-bottom">
                                            <td>{{ date('Y') }}</td>
                                            <td><strong>@php echo $arr[$month].''; @endphp</strong></td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                            <div class="cabinet__timetable-add">
                                <div class="cabinet__timetable-search">
                                    <form action="" method="get">
                                        Выберите тренировку:
                                        <label>
                                            <svg width="13" height="13" viewBox="0 0 13 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M4.95117 0C7.68125 0 9.90234 2.2211 9.90234 4.95117C9.90234 6.04195 9.54751 7.05128 8.94758 7.87036L13 11.9228L11.9228 13L7.87036 8.94758C7.05128 9.54751 6.04195 9.90234 4.95117 9.90234C2.2211 9.90234 0 7.68125 0 4.95117C0 2.2211 2.2211 0 4.95117 0ZM4.95117 9.14062C7.26124 9.14062 9.14062 7.26124 9.14062 4.95117C9.14062 2.64111 7.26124 0.761719 4.95117 0.761719C2.64111 0.761719 0.761719 2.64111 0.761719 4.95117C0.761719 7.26124 2.64111 9.14062 4.95117 9.14062Z" fill="#181818"/>
                                            </svg>
                                            <input type="text" placeholder="Введите название тренировки">
                                        </label>
                                    </form>
                                </div>
                                <div class="cabinet__timetable-programs">
                                    @foreach($items as $item)
                                        @php
                                            $properties = $item->props->mapWithKeys(function ($prop) {
                                                            return [$prop->type->key => $prop->value];
                                                            });
                                        @endphp
                                        <div class="cabinet__timetable-program">
                                            <div class="trainings-page__item-img">
                                                <img src="{{  url('/') . '/uploads/module_items/' . $properties['thumbnail'] }}" alt="{{ $properties['title'] }}">
                                            </div>
                                            <div class="trainings-page__item-header">
                                                <a href="{{ route('client.trainings.item', ['alias' => $item->seo->alias]) }}">
                                                    {!!  $properties['slogan']  !!}
                                                </a>
                                                <div class="trainings-page__item-time">
                                                    47.23
                                                </div>
                                                <button class="button-bg">
                                                    <span>Добавить</span>
                                                </button>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="cabinet__timetable-raspisanie">
                            <div class="cabinet__timetable-desc">
                                <p><strong>Расписание на 09 января 2021</strong></p>
                                <p>Используйте календарь для планирвания или просмотра расписания. Ищите и добавляйте занятия в свои расписания</p>
                            </div>
                            <div class="cabinet__timetable-container">
                                @foreach($items as $item)
                                    @php
                                        $properties = $item->props->mapWithKeys(function ($prop) {
                                                        return [$prop->type->key => $prop->value];
                                                        });
                                    @endphp
                                    <div class="cabinet__timetable-program">
                                        <div class="trainings-page__item-delete">
                                            <svg width="10" height="10" viewBox="0 0 10 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M10 0.589189L9.41081 0L5 4.41081L0.589189 0L0 0.589189L4.41081 5L0 9.41081L0.589189 10L5 5.58919L9.41081 10L10 9.41081L5.58919 5L10 0.589189Z" fill="#181818"/>
                                            </svg>
                                        </div>
                                        <div class="trainings-page__item-img">
                                            <img src="{{  url('/') . '/uploads/module_items/' . $properties['thumbnail'] }}" alt="{{ $properties['title'] }}">
                                        </div>
                                        <div class="trainings-page__item-header">
                                            <a href="{{ route('client.trainings.item', ['alias' => $item->seo->alias]) }}">
                                                {!!  $properties['slogan']  !!}
                                            </a>
                                            <div class="trainings-page__item-time">
                                                12:00
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <div class="cabinet__viewport-content tabs-content-item cabinet__trenings">
                        @foreach($items as $item)
                            @php
                                $properties = $item->props->mapWithKeys(function ($prop) {
                                                return [$prop->type->key => $prop->value];
                                                });
                            @endphp
                            <div class="trainings-page__item">
                                <div class="trainings-page__item-header">
                                    <a href="{{ route('client.trainings.item', ['alias' => $item->seo->alias]) }}">
                                        <h2 class="trainings-page__item-title">
                                            {{ $properties['title'] }}
                                        </h2>
                                    </a>
                                </div>
                                <div class="trainings-page__content">
                                    <div class="trainings-page__img">
                                        <img src="{{  url('/') . '/uploads/module_items/' . $properties['thumbnail'] }}" alt="{{ $properties['title'] }}">
                                        @auth
                                            @if (Auth::user()->client)
                                                @if (array_key_exists($item->id, Auth::user()->client->mappedModuleItemsById()->toArray()))
                                                    <div class="trainings-page__img-favorite favorite-action" data-id="{{$item->id}}">
                                                        <svg width="25" height="25" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M12.5 23.6091C12.1441 23.6091 11.8009 23.4802 11.5335 23.246C10.5236 22.3629 9.54989 21.533 8.69082 20.8009L8.68643 20.7971C6.16778 18.6508 3.99284 16.7972 2.47955 14.9713C0.787924 12.9301 0 10.9947 0 8.88041C0 6.8262 0.704383 4.93106 1.98326 3.54385C3.27739 2.14023 5.05313 1.36719 6.98393 1.36719C8.42703 1.36719 9.74863 1.82342 10.9119 2.72312C11.499 3.17726 12.0312 3.73306 12.5 4.38136C12.969 3.73306 13.501 3.17726 14.0882 2.72312C15.2515 1.82342 16.5731 1.36719 18.0162 1.36719C19.9468 1.36719 21.7228 2.14023 23.0169 3.54385C24.2958 4.93106 25 6.8262 25 8.88041C25 10.9947 24.2122 12.9301 22.5206 14.9711C21.0073 16.7972 18.8326 18.6506 16.3143 20.7967C15.4537 21.5299 14.4785 22.3611 13.4662 23.2463C13.199 23.4802 12.8557 23.6091 12.5 23.6091V23.6091ZM6.98393 2.83165C5.46702 2.83165 4.07352 3.43704 3.05976 4.53643C2.03094 5.65242 1.46427 7.19508 1.46427 8.88041C1.46427 10.6586 2.12516 12.249 3.60698 14.0369C5.03921 15.7652 7.16952 17.5806 9.6361 19.6827L9.64068 19.6865C10.503 20.4214 11.4805 21.2545 12.4979 22.1441C13.5214 21.2528 14.5004 20.4183 15.3644 19.6823C17.8308 17.5802 19.9609 15.7652 21.3932 14.0369C22.8748 12.249 23.5357 10.6586 23.5357 8.88041C23.5357 7.19508 22.969 5.65242 21.9402 4.53643C20.9266 3.43704 19.5329 2.83165 18.0162 2.83165C16.905 2.83165 15.8848 3.18489 14.9839 3.88145C14.1811 4.50248 13.6219 5.28754 13.294 5.83686C13.1254 6.11934 12.8286 6.28795 12.5 6.28795C12.1713 6.28795 11.8746 6.11934 11.7059 5.83686C11.3783 5.28754 10.819 4.50248 10.016 3.88145C9.1152 3.18489 8.09496 2.83165 6.98393 2.83165V2.83165Z" fill="#f52905"/>
                                                        </svg>
                                                    </div>
                                                @else
                                                    <div class="trainings-page__img-favorite favorite-action" data-id="{{$item->id}}">
                                                        <svg width="25" height="25" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M12.5 23.6091C12.1441 23.6091 11.8009 23.4802 11.5335 23.246C10.5236 22.3629 9.54989 21.533 8.69082 20.8009L8.68643 20.7971C6.16778 18.6508 3.99284 16.7972 2.47955 14.9713C0.787924 12.9301 0 10.9947 0 8.88041C0 6.8262 0.704383 4.93106 1.98326 3.54385C3.27739 2.14023 5.05313 1.36719 6.98393 1.36719C8.42703 1.36719 9.74863 1.82342 10.9119 2.72312C11.499 3.17726 12.0312 3.73306 12.5 4.38136C12.969 3.73306 13.501 3.17726 14.0882 2.72312C15.2515 1.82342 16.5731 1.36719 18.0162 1.36719C19.9468 1.36719 21.7228 2.14023 23.0169 3.54385C24.2958 4.93106 25 6.8262 25 8.88041C25 10.9947 24.2122 12.9301 22.5206 14.9711C21.0073 16.7972 18.8326 18.6506 16.3143 20.7967C15.4537 21.5299 14.4785 22.3611 13.4662 23.2463C13.199 23.4802 12.8557 23.6091 12.5 23.6091V23.6091ZM6.98393 2.83165C5.46702 2.83165 4.07352 3.43704 3.05976 4.53643C2.03094 5.65242 1.46427 7.19508 1.46427 8.88041C1.46427 10.6586 2.12516 12.249 3.60698 14.0369C5.03921 15.7652 7.16952 17.5806 9.6361 19.6827L9.64068 19.6865C10.503 20.4214 11.4805 21.2545 12.4979 22.1441C13.5214 21.2528 14.5004 20.4183 15.3644 19.6823C17.8308 17.5802 19.9609 15.7652 21.3932 14.0369C22.8748 12.249 23.5357 10.6586 23.5357 8.88041C23.5357 7.19508 22.969 5.65242 21.9402 4.53643C20.9266 3.43704 19.5329 2.83165 18.0162 2.83165C16.905 2.83165 15.8848 3.18489 14.9839 3.88145C14.1811 4.50248 13.6219 5.28754 13.294 5.83686C13.1254 6.11934 12.8286 6.28795 12.5 6.28795C12.1713 6.28795 11.8746 6.11934 11.7059 5.83686C11.3783 5.28754 10.819 4.50248 10.016 3.88145C9.1152 3.18489 8.09496 2.83165 6.98393 2.83165V2.83165Z" fill="#0E6D8B"/>
                                                        </svg>
                                                    </div>
                                                @endif
                                            @endif
                                        @else
                                            <div class="trainings-page__img-favorite">
                                                <svg width="25" height="25" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M12.5 23.6091C12.1441 23.6091 11.8009 23.4802 11.5335 23.246C10.5236 22.3629 9.54989 21.533 8.69082 20.8009L8.68643 20.7971C6.16778 18.6508 3.99284 16.7972 2.47955 14.9713C0.787924 12.9301 0 10.9947 0 8.88041C0 6.8262 0.704383 4.93106 1.98326 3.54385C3.27739 2.14023 5.05313 1.36719 6.98393 1.36719C8.42703 1.36719 9.74863 1.82342 10.9119 2.72312C11.499 3.17726 12.0312 3.73306 12.5 4.38136C12.969 3.73306 13.501 3.17726 14.0882 2.72312C15.2515 1.82342 16.5731 1.36719 18.0162 1.36719C19.9468 1.36719 21.7228 2.14023 23.0169 3.54385C24.2958 4.93106 25 6.8262 25 8.88041C25 10.9947 24.2122 12.9301 22.5206 14.9711C21.0073 16.7972 18.8326 18.6506 16.3143 20.7967C15.4537 21.5299 14.4785 22.3611 13.4662 23.2463C13.199 23.4802 12.8557 23.6091 12.5 23.6091V23.6091ZM6.98393 2.83165C5.46702 2.83165 4.07352 3.43704 3.05976 4.53643C2.03094 5.65242 1.46427 7.19508 1.46427 8.88041C1.46427 10.6586 2.12516 12.249 3.60698 14.0369C5.03921 15.7652 7.16952 17.5806 9.6361 19.6827L9.64068 19.6865C10.503 20.4214 11.4805 21.2545 12.4979 22.1441C13.5214 21.2528 14.5004 20.4183 15.3644 19.6823C17.8308 17.5802 19.9609 15.7652 21.3932 14.0369C22.8748 12.249 23.5357 10.6586 23.5357 8.88041C23.5357 7.19508 22.969 5.65242 21.9402 4.53643C20.9266 3.43704 19.5329 2.83165 18.0162 2.83165C16.905 2.83165 15.8848 3.18489 14.9839 3.88145C14.1811 4.50248 13.6219 5.28754 13.294 5.83686C13.1254 6.11934 12.8286 6.28795 12.5 6.28795C12.1713 6.28795 11.8746 6.11934 11.7059 5.83686C11.3783 5.28754 10.819 4.50248 10.016 3.88145C9.1152 3.18489 8.09496 2.83165 6.98393 2.83165V2.83165Z" fill="#0E6D8B"/>
                                                </svg>
                                            </div>
                                        @endauth
                                    </div>
                                    <div class="trainings-page__slogan">
                                        <span>{!!  $properties['slogan']  !!}</span>
                                    </div>
                                </div>
                                <div class="trainings-page__buttons">
                                    <div class="trainings-page__button button-bg js-try">
                                        <span>добавить в календарь</span>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="cabinet__viewport-content tabs-content-item cabinet__treners">
                        @foreach($trenersitems as $item)
                            @php
                                $properties = $item->props->mapWithKeys(function ($prop) {
                                return [$prop->type->key => $prop->value];
                                });
                            @endphp
                            <div class="treners-page__item">
                                <a href="{{ route('client.treners.item', ['alias' => $item->seo->alias]) }}"
                                   class="treners-page__item-img">
                                    <img src="{{  url('/') . '/uploads/module_items/' . $properties['photo-roxv'] }}"
                                         alt="{{ $properties['fio'] }}">
                                </a>
                                <a href="{{ route('client.treners.item', ['alias' => $item->seo->alias]) }}"
                                   class="treners-page__item-lnk">
                                    <h2 class="treners-page__item-title">
                                        {{ $properties['fio'] }}
                                    </h2>
                                </a>
                                <div class="treners-page__item-skils">
                                    {!! $properties['skils'] !!}
                                </div>
                                <div class="treners-page__item-desc">
                                    {!! $properties['about'] !!}
                                </div>
                                <div class="treners-page__item-more">
                                    <a href="{{ route('client.treners.item', ['alias' => $item->seo->alias]) }}">
                                        Узнать больше
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="cabinet__viewport-content tabs-content-item cabinet__favorites">
                        @foreach($items as $item)
                            @php
                                $properties = $item->props->mapWithKeys(function ($prop) {
                                                return [$prop->type->key => $prop->value];
                                                });
                            @endphp
                            <div class="trainings-page__item">
                                <div class="trainings-page__item-header">
                                    <a href="{{ route('client.trainings.item', ['alias' => $item->seo->alias]) }}">
                                        <h2 class="trainings-page__item-title">
                                            {{ $properties['title'] }}
                                        </h2>
                                    </a>
                                </div>
                                <div class="trainings-page__content">
                                    <div class="trainings-page__img">
                                        <img src="{{  url('/') . '/uploads/module_items/' . $properties['thumbnail'] }}" alt="{{ $properties['title'] }}">
                                        @auth
                                            @if (Auth::user()->client)
                                                @if (array_key_exists($item->id, Auth::user()->client->mappedModuleItemsById()->toArray()))
                                                    <div class="trainings-page__img-favorite favorite-action" data-id="{{$item->id}}">
                                                        <svg width="25" height="25" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M12.5 23.6091C12.1441 23.6091 11.8009 23.4802 11.5335 23.246C10.5236 22.3629 9.54989 21.533 8.69082 20.8009L8.68643 20.7971C6.16778 18.6508 3.99284 16.7972 2.47955 14.9713C0.787924 12.9301 0 10.9947 0 8.88041C0 6.8262 0.704383 4.93106 1.98326 3.54385C3.27739 2.14023 5.05313 1.36719 6.98393 1.36719C8.42703 1.36719 9.74863 1.82342 10.9119 2.72312C11.499 3.17726 12.0312 3.73306 12.5 4.38136C12.969 3.73306 13.501 3.17726 14.0882 2.72312C15.2515 1.82342 16.5731 1.36719 18.0162 1.36719C19.9468 1.36719 21.7228 2.14023 23.0169 3.54385C24.2958 4.93106 25 6.8262 25 8.88041C25 10.9947 24.2122 12.9301 22.5206 14.9711C21.0073 16.7972 18.8326 18.6506 16.3143 20.7967C15.4537 21.5299 14.4785 22.3611 13.4662 23.2463C13.199 23.4802 12.8557 23.6091 12.5 23.6091V23.6091ZM6.98393 2.83165C5.46702 2.83165 4.07352 3.43704 3.05976 4.53643C2.03094 5.65242 1.46427 7.19508 1.46427 8.88041C1.46427 10.6586 2.12516 12.249 3.60698 14.0369C5.03921 15.7652 7.16952 17.5806 9.6361 19.6827L9.64068 19.6865C10.503 20.4214 11.4805 21.2545 12.4979 22.1441C13.5214 21.2528 14.5004 20.4183 15.3644 19.6823C17.8308 17.5802 19.9609 15.7652 21.3932 14.0369C22.8748 12.249 23.5357 10.6586 23.5357 8.88041C23.5357 7.19508 22.969 5.65242 21.9402 4.53643C20.9266 3.43704 19.5329 2.83165 18.0162 2.83165C16.905 2.83165 15.8848 3.18489 14.9839 3.88145C14.1811 4.50248 13.6219 5.28754 13.294 5.83686C13.1254 6.11934 12.8286 6.28795 12.5 6.28795C12.1713 6.28795 11.8746 6.11934 11.7059 5.83686C11.3783 5.28754 10.819 4.50248 10.016 3.88145C9.1152 3.18489 8.09496 2.83165 6.98393 2.83165V2.83165Z" fill="#f52905"/>
                                                        </svg>
                                                    </div>
                                                @else
                                                    <div class="trainings-page__img-favorite favorite-action" data-id="{{$item->id}}">
                                                        <svg width="25" height="25" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M12.5 23.6091C12.1441 23.6091 11.8009 23.4802 11.5335 23.246C10.5236 22.3629 9.54989 21.533 8.69082 20.8009L8.68643 20.7971C6.16778 18.6508 3.99284 16.7972 2.47955 14.9713C0.787924 12.9301 0 10.9947 0 8.88041C0 6.8262 0.704383 4.93106 1.98326 3.54385C3.27739 2.14023 5.05313 1.36719 6.98393 1.36719C8.42703 1.36719 9.74863 1.82342 10.9119 2.72312C11.499 3.17726 12.0312 3.73306 12.5 4.38136C12.969 3.73306 13.501 3.17726 14.0882 2.72312C15.2515 1.82342 16.5731 1.36719 18.0162 1.36719C19.9468 1.36719 21.7228 2.14023 23.0169 3.54385C24.2958 4.93106 25 6.8262 25 8.88041C25 10.9947 24.2122 12.9301 22.5206 14.9711C21.0073 16.7972 18.8326 18.6506 16.3143 20.7967C15.4537 21.5299 14.4785 22.3611 13.4662 23.2463C13.199 23.4802 12.8557 23.6091 12.5 23.6091V23.6091ZM6.98393 2.83165C5.46702 2.83165 4.07352 3.43704 3.05976 4.53643C2.03094 5.65242 1.46427 7.19508 1.46427 8.88041C1.46427 10.6586 2.12516 12.249 3.60698 14.0369C5.03921 15.7652 7.16952 17.5806 9.6361 19.6827L9.64068 19.6865C10.503 20.4214 11.4805 21.2545 12.4979 22.1441C13.5214 21.2528 14.5004 20.4183 15.3644 19.6823C17.8308 17.5802 19.9609 15.7652 21.3932 14.0369C22.8748 12.249 23.5357 10.6586 23.5357 8.88041C23.5357 7.19508 22.969 5.65242 21.9402 4.53643C20.9266 3.43704 19.5329 2.83165 18.0162 2.83165C16.905 2.83165 15.8848 3.18489 14.9839 3.88145C14.1811 4.50248 13.6219 5.28754 13.294 5.83686C13.1254 6.11934 12.8286 6.28795 12.5 6.28795C12.1713 6.28795 11.8746 6.11934 11.7059 5.83686C11.3783 5.28754 10.819 4.50248 10.016 3.88145C9.1152 3.18489 8.09496 2.83165 6.98393 2.83165V2.83165Z" fill="#0E6D8B"/>
                                                        </svg>
                                                    </div>
                                                @endif
                                            @endif
                                        @else
                                            <div class="trainings-page__img-favorite">
                                                <svg width="25" height="25" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M12.5 23.6091C12.1441 23.6091 11.8009 23.4802 11.5335 23.246C10.5236 22.3629 9.54989 21.533 8.69082 20.8009L8.68643 20.7971C6.16778 18.6508 3.99284 16.7972 2.47955 14.9713C0.787924 12.9301 0 10.9947 0 8.88041C0 6.8262 0.704383 4.93106 1.98326 3.54385C3.27739 2.14023 5.05313 1.36719 6.98393 1.36719C8.42703 1.36719 9.74863 1.82342 10.9119 2.72312C11.499 3.17726 12.0312 3.73306 12.5 4.38136C12.969 3.73306 13.501 3.17726 14.0882 2.72312C15.2515 1.82342 16.5731 1.36719 18.0162 1.36719C19.9468 1.36719 21.7228 2.14023 23.0169 3.54385C24.2958 4.93106 25 6.8262 25 8.88041C25 10.9947 24.2122 12.9301 22.5206 14.9711C21.0073 16.7972 18.8326 18.6506 16.3143 20.7967C15.4537 21.5299 14.4785 22.3611 13.4662 23.2463C13.199 23.4802 12.8557 23.6091 12.5 23.6091V23.6091ZM6.98393 2.83165C5.46702 2.83165 4.07352 3.43704 3.05976 4.53643C2.03094 5.65242 1.46427 7.19508 1.46427 8.88041C1.46427 10.6586 2.12516 12.249 3.60698 14.0369C5.03921 15.7652 7.16952 17.5806 9.6361 19.6827L9.64068 19.6865C10.503 20.4214 11.4805 21.2545 12.4979 22.1441C13.5214 21.2528 14.5004 20.4183 15.3644 19.6823C17.8308 17.5802 19.9609 15.7652 21.3932 14.0369C22.8748 12.249 23.5357 10.6586 23.5357 8.88041C23.5357 7.19508 22.969 5.65242 21.9402 4.53643C20.9266 3.43704 19.5329 2.83165 18.0162 2.83165C16.905 2.83165 15.8848 3.18489 14.9839 3.88145C14.1811 4.50248 13.6219 5.28754 13.294 5.83686C13.1254 6.11934 12.8286 6.28795 12.5 6.28795C12.1713 6.28795 11.8746 6.11934 11.7059 5.83686C11.3783 5.28754 10.819 4.50248 10.016 3.88145C9.1152 3.18489 8.09496 2.83165 6.98393 2.83165V2.83165Z" fill="#0E6D8B"/>
                                                </svg>
                                            </div>
                                        @endauth
                                    </div>
                                    <div class="trainings-page__slogan">
                                        <span>{!!  $properties['slogan']  !!}</span>
                                    </div>
                                </div>
                                <div class="trainings-page__buttons">
                                    <div class="trainings-page__button button-bg js-try">
                                        <span>добавить в календарь</span>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="cabinet__viewport-content tabs-content-item cabinet__online">
                        <video id="video" class="video" muted="" poster="https://msk.rtsp.me/0sgdsWrYcuRhfL1QZentUA/1660217108/poster/KPbwo57M.jpg" style="opacity: 1;" src=""></video>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>