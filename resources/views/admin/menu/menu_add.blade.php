@extends('admin.main')

@section('content')
    <fieldset class="layui-elem-field layui-field-title" style="margin-top: 20px;">
        <legend>添加菜单</legend>
    </fieldset>
    <form class="layui-form" action="" method="post" >
        <div class="layui-form-item">
            <label class="layui-form-label">路由名称</label>
            <div class="layui-input-block">
                <input type="text" name="route_name" lay-verify="required" lay-reqtext="路由名称必填" placeholder="请输入名称" class="layui-input">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">路由</label>
            <div class="layui-input-block">
                <input type="text" name="route_url" lay-verify="required" lay-reqtext="路由是访问地址，不能为空" placeholder="请输入" autocomplete="off" class="layui-input">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">上级菜单</label>
            <div class="layui-input-block">
                <select name="route_pid">
                    <option value="0">顶级分类</option>
                    @foreach($cateList as $val)
                    <option value="{{ $val['id'] }}">{{ $val['route_name'] }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">是否展示在左侧菜单</label>
            <div class="layui-input-block">
                <input type="radio" name="route_sign" value="1" title="展示" checked="">
                <input type="radio" name="route_sign" value="2" title="不展示">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">路由排序</label>
            <div class="layui-input-block">
                <input type="text" name="route_sort" lay-verify="required" lay-reqtext="纯数字" placeholder="请输入" autocomplete="off" class="layui-input" value="">
            </div>
        </div>
        <div class="layui-form-item">
            <div class="layui-input-block">
                <button type="button" class="layui-btn" lay-submit="" lay-filter="menu_add">立即提交</button>
            </div>
        </div>
    </form>
    <!-- 注意：如果你直接复制所有代码到本地，上述js路径需要改成你本地的 -->
    <script>
        layui.use(['form'], function(){
            var form = layui.form,layer = layui.layer;

            //自定义验证规则
            form.verify({
                route_name: function(value){
                    if(value.length < 5){
                        return '标题至少得5个字';
                    }
                }
            });
            //监听提交
            form.on('submit(menu_add)', function(data){
                $.ajax({
                    url:"{{ url('admin/menu/save') }}",
                    method:'post',
                    data:data.field,
                    dataType:'JSON',
                    success:function(res){
                        if(res.status){
                            layer.alert(res.msg)
                        } else{
                            layer.alert(res.msg)
                        }
                    },
                    error:function (data) {
                        layer.alert(data.msg)
                    }
                }) ;

            });
        });
    </script>
@endsection