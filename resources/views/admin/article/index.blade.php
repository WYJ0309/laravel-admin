@extends('admin.main')

@section('content')
    <div class="layui-form-item">
        <div class="layui-inline">
            <a type="button" class="layui-inline" href="{{ url('admin/article/add') }}">
                <i class="layui-icon">添加&#xe654;</i>
            </a>
        </div>
    </div>
    <table class="layui-table" lay-size="sm">
        <thead>
            <tr>
                <th>id</th>
                <th>路由名称</th>
                <th>路由url</th>
                <th>是否展示</th>
                <th>排序</th>
                <th>添加时间</th>
                <th>更新时间</th>
                <th>操作</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $menu)
                <tr>
                    <td>{{ $menu['id'] }}</td>
                    <td>{{ $menu['route_name'] }}</td>
                    <td>{{ $menu['route_url'] }}</td>
                    <td>
                        @if($menu['route_sign'] == 1)
                            <button type="button" class="layui-btn layui-btn-xs layui-btn-radius">展示</button>
                        @elseif($menu['route_sign'] == 2)
                            <button type="button" class="layui-btn layui-btn-sm layui-btn-danger layui-btn-radius">不展示</button>
                        @endif
                    </td>
                    <td>{{ $menu['route_sort'] }}</td>
                    <td>{{ $menu['created_at'] }}</td>
                    <td>{{ $menu['updated_at'] }}</td>
                    <td>
                        <a class="layui-btn layui-btn-xs" href="{{ url('admin/menu/edit?id='.$menu['id']) }}"><i class="layui-icon">编辑</i></a>
                        <a class="layui-btn layui-btn-xs layui-btn-danger delBtn" del_id="{{ $menu['id'] }}"><i class="layui-icon">删除</i></a>
                    </td>
                </tr>
                @if(!empty($menu['son']))
                    @foreach($menu['son'] as $son_menu)
                        <tr>
                            <td>&nbsp;&nbsp;&nbsp;&nbsp;|--{{ $son_menu['id'] }}</td>
                            <td>{{ $son_menu['route_name'] }}</td>
                            <td>{{ $son_menu['route_url'] }}</td>
                            <td>
                                @if($son_menu['route_sign'] == 1)
                                    <button type="button" class="layui-btn layui-btn-xs layui-btn-radius">展示</button>
                                @elseif($son_menu['route_sign'] == 2)
                                    <button type="button" class="layui-btn layui-btn-sm layui-btn-danger layui-btn-radius">不展示</button>
                                @endif
                            </td>
                            <td>{{ $son_menu['route_sort'] }}</td>
                            <td>{{ $son_menu['created_at'] }}</td>
                            <td>{{ $son_menu['updated_at'] }}</td>
                            <td>
                                <a class="layui-btn layui-btn-xs" href="{{ url('admin/menu/edit?id='.$son_menu['id']) }}"><i class="layui-icon">编辑</i></a>
                                <a class="layui-btn layui-btn-xs layui-btn-danger delBtn" del_id="{{ $son_menu['id'] }}"><i class="layui-icon">删除</i></a>
                            </td>
                        </tr>
                    @endforeach
                @endif
            @endforeach
        </tbody>
    </table>
    <script>
        $(function () {
            $(".delBtn").on('click',function () {
                $.post("{{ url('admin/menu/del') }}",{"id":$(this).attr('del_id')},function (data) {
                    console.log(data);
                    if(data.status){
                        alert(data.msg);
                        setTimeout("location.href='/admin/menu/index'", 500 )
                    }
                })
            });
        });
    </script>
@endsection