@extends('admin.main')

@section('content')
    <a type="button" class="layui-btn layui-btn-sm" href="{{ url('admin/menu/add') }}">
        <i class="layui-icon">添加&#xe654;</i>
    </a>
    <table class="layui-table" lay-size="sm">
        <thead>
            <tr>
                <th>id</th>
                <th>路由名称</th>
                <th>路由url</th>
                <th>是否展示</th>
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
                    <td>{{ $menu['created_at'] }}</td>
                    <td>{{ $menu['updated_at'] }}</td>
                    <td>
                        <a class="layui-btn layui-btn-xs" href="{{ url('admin/menu/edit',['id'=>$menu['id']]) }}"><i class="layui-icon">编辑</i></a>
                        <a class="layui-btn layui-btn-xs layui-btn-danger delBtn"><i class="layui-icon">删除</i></a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <script>
        $(function () {
            $(".delBtn").on('click',function () {
                alert($(this).text());
            });
        });
    </script>
@endsection