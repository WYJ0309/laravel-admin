<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>layout 后台大布局 - Layui</title>
    <link rel="stylesheet" href="{{asset('admin/layui/css/layui.css')}}">
    <script src="{{asset('admin/js/jquery-3.4.1.min.js')}}"></script>
</head>
<body class="layui-layout-body">
<div class="layui-layout layui-layout-admin">
    <!-- 头部区域（可配合layui已有的水平导航） -->
    <div class="layui-header">
        <div class="layui-logo">后台管理中心</div>
        <ul class="layui-nav layui-layout-right">
            <li class="layui-nav-item">
                <a href="javascript:;">
                    <img src="http://t.cn/RCzsdCq" class="layui-nav-img">
                    贤心
                </a>
            </li>
            <li class="layui-nav-item"><a href="">退了</a></li>
        </ul>
    </div>
    <!-- 左侧导航区域（可配合layui已有的垂直导航） -->
    <div class="layui-side layui-bg-black">
        <div class="layui-side-scroll">
            <ul class="layui-nav layui-nav-tree"  lay-filter="test">
                <li class="layui-nav-item layui-nav-itemed"><a href="">控制台</a></li>
                <li class="layui-nav-item"><a href="">菜单管理</a></li>
                <li class="layui-nav-item"><a href="">权限管理</a></li>
                <li class="layui-nav-item">
                    <a class="" href="javascript:;">文章管理</a>
                    <dl class="layui-nav-child">
                        <dd><a href="javascript:;">列表一</a></dd>
                        <dd><a href="javascript:;">列表二</a></dd>
                        <dd><a href="javascript:;">列表三</a></dd>
                    </dl>
                </li>
                <li class="layui-nav-item">
                    <a href="javascript:;">产品管理</a>
                    <dl class="layui-nav-child">
                        <dd><a href="javascript:;">列表一</a></dd>
                        <dd><a href="javascript:;">列表二</a></dd>
                    </dl>
                </li>
                <li class="layui-nav-item"><a href="">单页管理</a></li>
                <li class="layui-nav-item"><a href="">日志列表</a></li>
                <li class="layui-nav-item"><a href="">咨询列表</a></li>
                <li class="layui-nav-item"><a href="">系统配置</a></li>
            </ul>
        </div>
    </div>
    <!-- 内容主体区域 -->
    <div class="layui-body" style="padding: 20px 25px;">
        @section('content')
            This is the master sidebar.
        @show
    </div>
    <!-- 底部固定区域 -->
    <div class="layui-footer">
        © layui.com - 底部固定区域
    </div>
</div>
</body>
</html>