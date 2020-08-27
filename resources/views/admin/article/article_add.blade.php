@extends('admin.main')

@section('content')
    <fieldset class="layui-elem-field layui-field-title" style="margin-top: 20px;">
        <legend>添加菜单</legend>
    </fieldset>
    <form class="layui-form" action="" method="post" >
        <div class="layui-form-item">
            <label class="layui-form-label">标题</label>
            <div class="layui-input-block">
                <input type="text" name="article_title" lay-verify="required" lay-reqtext="标题必填" placeholder="请输入标题" class="layui-input">
            </div>
        </div>
        <div class="layui-form-item layui-form-text">
            <label class="layui-form-label">简介</label>
            <div class="layui-input-block">
                <textarea name="article_desc" placeholder="请输入简介" class="layui-textarea"></textarea>
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">显示/隐藏</label>
            <div class="layui-input-block">
                <input type="radio" name="route_sign" value="1" title="展示" checked="">
                <input type="radio" name="route_sign" value="2" title="隐藏">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">文章链接(可是外链)</label>
            <div class="layui-input-block">
                <input type="text" name="art_href" value="" class="layui-input">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">上级菜单</label>
            <div class="layui-input-block">
                <select name="article_cate_id">
                    <option value="0">顶级分类</option>
                    @foreach($cateList as $val)
                    <option value="{{ $val['id'] }}">{{ $val['cate_name'] }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">排序</label>
            <div class="layui-input-block">
                <input type="text" name="article_sort" class="layui-input" value="0">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">封面</label>
            <div class="layui-input-block">
                <button type="button" class="layui-btn" id="upload_pic"><i class="layui-icon">&#xe67c;</i>上传图片</button>
                <input type="hidden" name="thumb_url" class="layui-input" value="">
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
        layui.use('upload', function(){
            var upload = layui.upload;

            //执行实例
            var uploadInst = upload.render({
                elem: '#upload_pic' //绑定元素
                ,url: '/upload/' //上传接口
                ,done: function(res){
                    //上传完毕回调
                }
                ,error: function(){
                    //请求异常回调
                }
            });
        });

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