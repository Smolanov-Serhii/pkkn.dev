<?php
/**
 * @var $module_item \App\Models\ModuleItem;
 */

//$attributes = $program->attrs();
$properties = $module_item->props->mapWithKeys(function ($prop) {
    return [$prop->type->key => $prop->value];
});
//$taxonomies = $module_item->module->taxonomies;
?>


@extends('client.layouts.main')
@section('content')
        <div class="breadcrumbs main-container">
            <div class="breadcrumbs__list">
                <ul class="breadcrumb">
                    <a href="{{ url('/') }}">Главная</a>
                    <span class="devider"> / </span>
                    <a href="{{ url('/activitys') }}">Наша деятельность</a>
                    <span class="devider"> / </span>
                    <span class="current-page">{{ $page->seo->title }}</span>
                </ul>
            </div>
        </div>
        <section class="blog-sin">
            <div class="blog-sin__container main-container">
                <div class="blog-sin__wrapper">
                    <div class="blog-sin__image">
{{--                        <img src="{{  url('/') . '/uploads/module_items/' . $properties['image'] }}" alt="{{ $properties['title'] }}">--}}
                    </div>
                    <div class="blog-sin__content">
                        <div class="blog-sin__header">

                        </div>
                    </div>
                </div>
            </div>
        </section>
@endsection
@section('client_scripts')
    @parent('client_scripts')
    <script src="{{ asset('/js/module_items/comment.js') }}"></script>
@endsection
