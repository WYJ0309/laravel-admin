

@extends('admin.main')


@section('left_side')
    @php
        $menuList = \Illuminate\Support\Facades\Cache::get('admin_menu_arr');
    @endphp

    <div class="layui-side-scroll">
        <ul class="layui-nav layui-nav-tree"  lay-filter="test">
            @foreach($menuList as $val)
                @if(empty($val['son']))
                    <li class="layui-nav-item"><a href="{{ $val['route_url'] }}">{{ $val['route_name'] }}</a></li>
                @else
                    <li class="layui-nav-item">
                        <a href="{{ $val['route_url'] }}">{{ $val['route_name'] }}</a>
                        <dl class="layui-nav-child">
                            @foreach($val['son'] as $son)
                                <dd><a href="{{ $son['route_url'] }}">{{ $son['route_name'] }}</a></dd>
                            @endforeach
                        </dl>
                    </li>
                @endif
            @endforeach
        </ul>
    </div>
    <script src="{{asset('admin/layui/layui.js')}}"></script>
    <script>
        //JavaScript代码区域
        layui.use('element', function(){
            var element = layui.element;

        });
    </script>
@endsection