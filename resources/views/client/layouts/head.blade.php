<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="none"/>
    <title>{{ $page->seo->title }}</title>
    <link href="/css/style.css?v={{ time() }}" rel="stylesheet">
    <link rel="icon" type="image/png" href="/img/icons/favicon.png" sizes="32x32">
    <link rel="icon" type="image/svg" href="/img/icons/favicon.svg" sizes="32x32">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="description" content="{{ $page->seo->meta_description }}">
    <meta name="Keywords" content="{{ $page->seo->meta_keywords }}">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta property="og:url"                content="{{ url('/') . "/" . $page->seo->alias }}" />
    <meta property="og:site_name"          content="{{ env('APP_NAME') }}">
    <meta property="og:type"               content="article" />
    <meta property="og:title"              content="{{ $page->seo->title }}" />
    <meta property="og:description"        content="{{ $page->seo->meta_description }}" />
    <meta property="og:image"              content="{{ url('/') . '/uploads/seo/thumbs/' . $page->seo->thumbnail }}" />
    <script
            src="https://code.jquery.com/jquery-3.6.0.min.js"
            integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
            crossorigin="anonymous"></script>
    <script src="https://api-maps.yandex.ru/2.1/?apikey=d325ee9d-883e-46b0-a064-7900b7b320c5&lang=ru_RU" type="text/javascript" defer></script>
    <script src="/js/common.min.js?v={{ time() }}" defer></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
</head>
<script>
    window.onload = function () {
        document.body.classList.add('loaded_hiding');
        window.setTimeout(function () {
            document.body.classList.add('loaded');
            document.body.classList.remove('loaded_hiding');
        }, 500);

    }
</script>