@extends('admin.main')

@section('content')
    <div class="layui-form-item">
        <div class="layui-inline">
            <a type="button" class="layui-btn" href="{{ url('admin/article/add') }}">
                <i class="layui-icon">添加</i>
            </a>
        </div>
    </div>
    <table class="layui-table" lay-size="sm">
        <thead>
            <tr>
                <th>id</th>
                <th>标题</th>
                <th>分类</th>
                <th>关键词</th>
                <th>是否展示</th>
                <th>排序</th>
                <th>外链</th>
                <th>查看次数</th>
                <th>是否首页</th>
                <th>操作</th>
            </tr>
        </thead>
        <tbody>
            @foreach($result as $article)
                <tr>
                    <td>{{ $article['id'] }}</td>
                    <td>{{ $article['article_title'] }}</td>
                    <td>{{ $article['cate_name'] }}</td>
                    <td>{{ $article['article_keyword'] }}</td>
                    <td>
                        @if($article['article_state'] == 1)
                            <button type="button" del_id="{{ $article['id'] }}" class="showClick layui-btn layui-btn-xs layui-btn-radius layui-btn-danger" >点击隐藏</button>
                        @elseif($article['article_state'] == 2)
                            <button type="button" del_id="{{ $article['id'] }}" class="showClick layui-btn layui-btn-xs layui-btn-radius" >点击展示</button>
                        @endif
                    </td>
                    <td>{{ $article['article_sort'] }}</td>
                    <td>{{ $article['article_href'] }}</td>
                    <td>{{ $article['view_num'] }}</td>
                    <td>
                        @if($article['is_top'] == 1)
                            是
                        @else
                            否
                        @endif
                    </td>
                    <td>
                        <a class="layui-btn layui-btn-xs" href="{{ url('admin/article/edit?id='.$article['id']) }}"><i class="layui-icon">编辑</i></a>
                        <a class="layui-btn layui-btn-xs layui-btn-danger delBtn" del_id="{{ $article['id'] }}"><i class="layui-icon">删除</i></a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <script>
        layui.use('layer', function(){
            var layer = layui.layer;
        });
        $(function () {
            $(".showClick").on('click',function () {
                if($(this).text() == "点击展示"){
                    $.post("{{ url('admin/article/opt') }}",{"id":$(this).attr('del_id'),"state":1},function (data) {
                        console.log(data);
                        if(data.status){
                            layer.alert(data.msg);
                            setTimeout("location.href='/admin/article/index'", 500 )
                        }
                    })
                }
                if($(this).text() == "点击隐藏"){
                    $.post("{{ url('admin/article/opt') }}",{"id":$(this).attr('del_id'),"state":2},function (data) {
                        console.log(data);
                        if(data.status){
                            layer.alert(data.msg);
                            setTimeout("location.href='/admin/article/index'", 500 )
                        }
                    })
                }
            });
            $(".delBtn").on('click',function () {
                $.post("{{ url('admin/article/del') }}",{"id":$(this).attr('del_id')},function (data) {
                    console.log(data);
                    if(data.status){
                        layer.alert(data.msg);
                        setTimeout("location.href='/admin/article/index'", 500 )
                    }
                })
            });
        });
    </script>
@endsection