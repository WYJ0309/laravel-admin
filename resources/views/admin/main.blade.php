<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>layout 后台大布局 - Layui</title>
    <link rel="stylesheet" href="{{asset('admin/layui/css/layui.css')}}">
    <script src="{{asset('admin/js/jquery-3.4.1.min.js')}}"></script>
    <script src="{{asset('admin/layui/layui.js')}}"></script>
</head>
<body class="layui-layout-body">
<div class="layui-layout layui-layout-admin">
    <!-- 头部区域（可配合layui已有的水平导航） -->
    <div class="layui-header">
        <div class="layui-logo">后台管理中心</div>
        <ul class="layui-nav layui-layout-right">
            <li class="layui-nav-item">
                <a href="javascript:;">
                    <img src="http://t.cn/RCzsdCq" class="layui-nav-img">
                    贤心
                </a>
            </li>
            <li class="layui-nav-item"><a href="">退了</a></li>
        </ul>
    </div>
    <!-- 左侧导航区域（可配合layui已有的垂直导航） -->
    @php
        $menuList = \Illuminate\Support\Facades\Cache::get('admin_menu_arr');
        $cur_url = $_SERVER['REQUEST_URI'];
    @endphp
    <div class="layui-side layui-bg-black">
        <div class="layui-side-scroll">
            <ul class="layui-nav layui-nav-tree"  lay-filter="test">
                @foreach($menuList as $val)
                    @if(empty($val['son']))
                        @if($cur_url == $val['route_url'])
                            <li class="layui-nav-item layui-nav-itemed layui-btn-danger"><a href="{{ $val['route_url'] }}">{{ $val['route_name'] }}</a></li>
                        @else
                            <li class="layui-nav-item"><a href="{{ $val['route_url'] }}">{{ $val['route_name'] }}</a></li>
                        @endif
                    @else
                        @if($cur_url == $val['route_url'])
                            <li class="layui-nav-item layui-nav-itemed">
                                <a href="{{ $val['route_url'] }}">{{ $val['route_name'] }}</a>
                                <dl class="layui-nav-child">
                                    @foreach($val['son'] as $son)
                                        <dd class="layui-nav-itemed"><a href="{{ $son['route_url'] }}">&nbsp;&nbsp;&nbsp;&nbsp;{{ $son['route_name'] }}</a></dd>
                                    @endforeach
                                </dl>
                            </li>
                        @else
                            <li class="layui-nav-item">
                                <a href="{{ $val['route_url'] }}">{{ $val['route_name'] }}</a>
                                <dl class="layui-nav-child">
                                    @foreach($val['son'] as $son)
                                        <dd><a href="{{ $son['route_url'] }}">&nbsp;&nbsp;&nbsp;&nbsp;{{ $son['route_name'] }}</a></dd>
                                    @endforeach
                                </dl>
                            </li>
                        @endif
                    @endif
                @endforeach

            </ul>
        </div>
    </div>
    <!-- 内容主体区域 -->
    <div class="layui-body" style="padding: 20px 25px;">
        @section('content')
            This is the master sidebar.
        @show
    </div>
    <!-- 底部固定区域 -->
    <div class="layui-footer">
        © layui.com - 底部固定区域
    </div>

    <script>
        //JavaScript代码区域
        layui.use('element', function(){
            var element = layui.element;

        });
    </script>
</div>
</body>
</html>