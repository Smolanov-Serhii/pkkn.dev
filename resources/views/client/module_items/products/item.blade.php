<?php
/**
 * @var $module_item \App\Models\ModuleItem;
 */

//$attributes = $program->attrs();
$properties = $module_item->props->mapWithKeys(function ($prop) {
    return [$prop->type->key => $prop->value];
});

$items = $module_item->blocks;
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
    @foreach($items as $block)
        @if($block->enabled)
            <?php $view = explode('.', $block->template->path)[0]; ?>
            @includeIf('client.block_templates.templates.'.$view)
        @endif
    @endforeach
@endsection
@section('client_scripts')
    @parent('client_scripts')
    <script src="{{ asset('/js/module_items/comment.js') }}"></script>
@endsection
