@extends('admin.main')

@section('content')
    <fieldset class="layui-elem-field layui-field-title" style="margin-top: 20px;">
        <legend>系统配置</legend>
    </fieldset>
    <form class="layui-form" action="" method="post" >
        <div class="layui-form-item">
            <label class="layui-form-label">网站名称</label>
            <div class="layui-input-block">
                <input type="text" name="site_name" lay-verify="required" lay-reqtext="名称必填" placeholder="请输入名称" class="layui-input" value="{{ $site_name }}">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">网站关键词</label>
            <div class="layui-input-block">
                <input type="text" name="site_keyword" lay-verify="required" lay-reqtext="关键词不能为空" placeholder="请输入" autocomplete="off" class="layui-input" value="{{ $site_keyword }}">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">网站描述</label>
            <div class="layui-input-block">
                <textarea name="site_desc" class="layui-textarea" rows="5" cols="100">{{ $site_desc }}</textarea>
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">联系邮箱</label>
            <div class="layui-input-block">
                <input type="text" name="site_email"  placeholder="请输入" class="layui-input" value="{{ $site_email }}">
            </div>
        </div>
        <div class="layui-form-item">
            <div class="layui-input-block">
                <button type="button" class="layui-btn" lay-submit="" lay-filter="site_save">立即提交</button>
            </div>
        </div>
    </form>
    <!-- 注意：如果你直接复制所有代码到本地，上述js路径需要改成你本地的 -->
    <script>
        layui.use(['form'], function(){
            var form = layui.form,layer = layui.layer;

            //监听提交
            form.on('submit(site_save)', function(data){
                $.ajax({
                    url:"{{ url('admin/config/save') }}",
                    method:'post',
                    data:data.field,
                    dataType:'JSON',
                    success:function(res){
                        console.log(res)
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