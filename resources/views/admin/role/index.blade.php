@extends('admin.main')

@section('content')
    <fieldset class="layui-elem-field layui-field-title" style="margin-top: 20px;">
        <legend>权限控制</legend>
    </fieldset>
    <form class="layui-form" action="" method="post" >
        <div id="test1"></div>
        <div class="layui-form-item">
            <div class="layui-input-block">
                <button type="button" class="layui-btn" lay-filter="site_save">立即提交</button>
            </div>
        </div>
    </form>
    <script>
        layui.use('tree', function(){
            var tree = layui.tree,layer = layui.layer;
            //渲染
            tree.render({
                elem: '#test1'  //绑定元素
                ,showCheckbox: true
                ,data: [{
                    title: '江西' //一级菜单
                    ,id:1//节点唯一索引值，用于对指定节点进行各类操作
                    ,field:'sel_1'//节点字段名
                    ,spread:true//节点是否初始展开，默认 false
                    ,checked:true//节点是否初始为选中状态（如果开启复选框的话），默认 false
                    ,children: [{
                        title: '南昌' //二级菜单
                        ,children: [{
                            title: '高新区' //三级菜单
                            //…… //以此类推，可无限层级
                        },{
                            title: '低新区' //三级菜单
                            //…… //以此类推，可无限层级
                        }]
                    }]
                },{
                    title: '陕西' //一级菜单
                    ,children: [{
                        title: '西安' //二级菜单
                    }]
                }]
            });
        });
        layui.use(['form'], function(){
            var form = layui.form,layer = layui.layer;
            //监听提交
            form.on('submit(site_save)', function(data){
                $.ajax({
                    url:"{{ url('admin/auth/save') }}",
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