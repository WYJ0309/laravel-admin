@extends('admin.main')

@section('content')
    <button type="button" class="layui-btn layui-btn-sm">
        <i class="layui-icon">添加&#xe654;</i>
    </button>
    <table class="layui-hide" id="test"></table>


    <script src="{{asset('admin/layui/layui.js')}}"></script>
    <script>
        layui.use('table', function(){
            var table = layui.table;

            table.render({
                elem: '#test'
                ,url:'/demo/table/user/'
                ,cols: [[
                    {field:'id', width:80, title: 'ID', sort: true}
                    ,{field:'username', width:80, title: '用户名'}
                    ,{field:'sex', width:80, title: '性别', sort: true}
                    ,{field:'city', width:80, title: '城市'}
                    ,{field:'sign', title: '签名', minWidth: 150}
                    ,{field:'experience', width:80, title: '积分', sort: true}
                    ,{field:'score', width:80, title: '评分', sort: true}
                    ,{field:'classify', width:80, title: '职业'}
                    ,{field:'wealth', width:135, title: '财富', sort: true}
                ]]
                ,page: true
            });
        });
    </script>
@endsection