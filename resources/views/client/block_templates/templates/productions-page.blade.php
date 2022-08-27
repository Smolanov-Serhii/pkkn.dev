<?php
$contents = $block->mappedByKey();
$module = \App\Models\Module::where('name', 'productions')->first();
$items = $module->items()->paginate(16);
?>
<section class="productions-page">
    <div class="productions-page__container content-container">
        <h1 class="productions-page__title section-title">
            {{ $contents['title']['value'] ?? ''}}
        </h1>
        <div class="productions-page__subtitle section-subtitle">
            {!!  $contents['subtitle']['value'] ?? '' !!}
        </div>
        <div class="works-page__rubriks">

            <?php            $module = \App\Models\Module::where('name', 'productions')
                ->with(['taxonomies', 'items.taxonomy_items'])
                ->first();
            $grouped_existed_taxonomy_items = \App\Models\TaxonomyItem::whereHas('module_items', function (\Illuminate\Database\Eloquent\Builder $query) use ($module) {
                $query->whereIn('id', $module['items']->pluck('id'));
            })->with('taxonomy')->get()->groupBy('taxonomy_id');
            ?>
            <form
                    class="category__search"
                    action="{{ route('client.module_items.filter') }}"
                    id="courses_filter"
                    method="get">


                <input type="hidden" value="productions" name="module">
                @foreach($module['taxonomies'] as $taxonomy)
                    @isset($grouped_existed_taxonomy_items[$taxonomy->id])
                        <div class="category__group">
                            <label class="works-page__rubrik active" id="reset_button">
                                <input type="checkbox"
                                       class="category__group-input"
                                       form="courses_filter"
                                       style="display: none" checked>
                                <div class="works-page__rubrik-value" id="reset_button">
                                    Все
                                </div>

                            </label>
                            @foreach($grouped_existed_taxonomy_items[$taxonomy->id] as $taxonomy_item)
                                <label class="works-page__rubrik">
                                    <input type="checkbox"
                                           class="category__group-input"
                                           {{--                                        value="{{ $taxonomy_item->id }}"--}}
                                           name="taxonomy_item[{{ $taxonomy_item->id }}]"
                                           form="courses_filter"
                                           style="display: none">
                                    <div class="works-page__rubrik-value">
                                        {{ $taxonomy_item->name }}
                                    </div>
                                </label>
                            @endforeach
                        </div>
                    @endif
                @endforeach
            </form>
        </div>
        @includeIf('client.block_templates.includes.category_result')
    </div>
</section>
@section('client_scripts')
    <script src="{{ asset('/js/modules/filter.js') }}"></script>
@endsection