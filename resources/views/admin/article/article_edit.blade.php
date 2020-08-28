@extends('admin.main')

@section('content')
    <fieldset class="layui-elem-field layui-field-title" style="margin-top: 20px;">
        <legend><a href="{{ url('admin/article/index') }}">返回文章列表</a></legend>
    </fieldset>
    <form class="layui-form" action="" method="post" >
        <div class="layui-form-item">
            <label class="layui-form-label">标题</label>
            <div class="layui-input-block">
                <input type="text" name="article_title" lay-verify="required" lay-reqtext="标题必填" placeholder="请输入标题" class="layui-input" value="{{ $result['article_title'] }}">
            </div>
        </div>
        <div class="layui-form-item layui-form-text">
            <label class="layui-form-label">简介</label>
            <div class="layui-input-block">
                <textarea name="article_desc" placeholder="请输入简介" class="layui-textarea">{{ $result['article_desc'] }}</textarea>
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">显示/隐藏</label>
            <div class="layui-input-block">
                <input type="radio" name="article_state" value="1" title="展示" @if($result['article_state'] == 1) checked="checked" @endif >
                <input type="radio" name="article_state" value="2" title="隐藏" @if($result['article_state'] == 2) checked="checked" @endif >
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">文章链接(可是外链)</label>
            <div class="layui-input-block">
                <input type="text" name="article_href" value="{{ $result['article_href'] }}" class="layui-input">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">上级菜单</label>
            <div class="layui-input-block">
                <select name="article_cate_id">
                    <option value="0">顶级分类</option>
                    @foreach($cateList as $val)
                    <option value="{{ $val['id'] }}"  @if($val['id'] == $result['article_cate_id']) selected @endif >{{ $val['cate_name'] }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">排序</label>
            <div class="layui-input-block">
                <input type="text" name="article_sort" class="layui-input" value="{{ $result['article_sort'] }}">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">封面</label>
            <div class="layui-input-block">
                <button type="button" class="layui-btn" id="upload_pic"><i class="layui-icon">&#xe67c;</i>上传图片</button>
                <input type="hidden" name="thumb_url" class="layui-input" value="{{ asset($result['thumb_url']) }}">
                <img id="thumb_url" width="200" height="180" src="{{ asset($result['thumb_url']) }}"/>
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">内容</label>
            <div class="layui-input-block">
                <textarea id="content" name="editor2" cols="100" rows="20" style="width:800px;height:200px;">{{ $result['content'] }}</textarea>
            </div>
        </div>
        <div class="layui-form-item">
            <div class="layui-input-block">
                <input type="hidden" name="id" value="{{ $result['id'] }}">
                <button type="button" class="layui-btn" lay-submit="" lay-filter="menu_add">立即提交</button>
            </div>
        </div>
    </form>
    <script src="{{asset('admin/kindeditor/kindeditor-all.js')}}"></script>
    <script>
        var editor;
        KindEditor.ready(function(K) {
            editor = K.create('#content', {
                allowFileManager : true,
                langType : 'zh-CN',
                autoHeightMode : true
            });
        });
    </script>
    <script>
        layui.use('upload', function(){
            var upload = layui.upload;
            //执行实例
            var uploadInst = upload.render({
                elem: '#upload_pic',
                url: '{{ url("file/store") }}',
                field:'image',
                accept:'images',
                exts:'jpg|png|gif|bmp|jpeg',
                size:1024*5,
                done: function(res){
                    console.log(res);
                    $("#thumb_url").attr('src',res.msg);
                    $("input[name='thumb_url']").val(res.msg);
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
                data.field.content = editor.html();
                $.ajax({
                    url:"{{ url('admin/article/save') }}",
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