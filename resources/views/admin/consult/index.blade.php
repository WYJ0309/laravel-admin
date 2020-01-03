@extends('admin.main')

@section('content')
    <form class="layui-form layui-form-pane" action="{{ url('admin/menu/index') }}">
        <div class="layui-form-item">
            <div class="layui-inline">
                <a type="button" class="layui-inline" href="{{ url('admin/menu/add') }}">
                    <i class="layui-icon">添加&#xe654;</i>
                </a>
            </div>
            <div class="layui-inline">
                <label class="layui-form-label">路由名称</label>
                <div class="layui-input-inline">
                    <input type="text" name="route_name" autocomplete="off" class="layui-input" value="{{ $route_name }}">
                </div>
            </div>
            <div class="layui-inline">
                <input type="submit" class="layui-btn layui-btn-sm" value="点击搜索" />
            </div>
        </div>
    </form>
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
                        <a class="layui-btn layui-btn-xs" href="{{ url('admin/menu/edit?id='.$menu['id']) }}"><i class="layui-icon">编辑</i></a>
                        <a class="layui-btn layui-btn-xs layui-btn-danger delBtn"><i class="layui-icon">删除</i></a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div id="demo2"></div>
    <script src="{{asset('admin/layui/layui.js')}}"></script>
    <script>
        $(function () {
            $(".delBtn").on('click',function () {
                alert($(this).text());
            });
        });
        layui.use(['laypage', 'layer'], function(){
            var laypage = layui.laypage;
            //自定义样式
            laypage.render({
                elem: 'demo2',
                count: "{{ $count }}",
                limit:15,
                groups:15,
                curr:"{{ $cur_page }}",
                theme: '#1E9FFF',
                jump: function(obj, first){
                    //console.log(obj);
                    //obj包含了当前分页的所有参数，比如：
                    //console.log(obj.curr); //得到当前页，以便向服务端请求对应页的数据。
                    //console.log(obj.limit); //得到每页显示的条数
                    //首次不执行  不然会一直循环
                    if(!first){
                        location.href = "/admin/menu/index?page="+obj.curr+"&page_size="+obj.limit
                        //do something
                    }
                }
            });
        });
    </script>
@endsection