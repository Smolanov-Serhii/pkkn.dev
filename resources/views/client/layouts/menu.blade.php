<ul>
    @foreach(\App\Models\Menu::where('title', 'main')->first()->getTree() as $item)
        @if(!is_null($item->img)) <img width="40" src="{{url('/uploads/menu_items/'.$item->img)}}" alt="">@endif<li class="@if(!is_null($item->class) && !empty($item->class)) {{$item->class}} @endif"><a href="{{url('/'.$item->slug)}}">{{$item->title}}</a></li>
        @if(isset($item->children))
            @foreach($item->children as $m)
                @foreach($m as $in=>$data)
                    @if(!is_null($data->img)) <img width="40" src="{{url('/uploads/menu_items/'.$data->img)}}" alt="">@endif<li style="margin-left: 20px;" class="@if(!is_null($data->class) && !empty($data->class)) {{$data->class}} @endif"><a href="{{url('/'.$data->slug)}}">{{$data->title}}</a></li>
                    @if(isset($data->children))
                        @foreach($data->children as $m)
                            @foreach($m as $in=>$data)
                                @if(!is_null($data->img)) <img width="40" src="{{url('/uploads/menu_items/'.$data->img)}}" alt="">@endif<li style="margin-left: 40px;" class="@if(!is_null($data->class) && !empty($data->class)) {{$data->class}} @endif"><a href="{{url('/'.$data->slug)}}">{{$data->title}}</a></li>
                            @endforeach
                        @endforeach
                    @endif
                @endforeach
            @endforeach
        @endif
    @endforeach
</ul>