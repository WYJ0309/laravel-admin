<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>后台登陆页面</title>
        <link rel="stylesheet" href="{{asset('admin/bootstrap/css/bootstrap.css')}}">
        <link rel="stylesheet" href="{{asset('admin/css/style.css')}}">
    </head>
    <body style='background-color:#389a8f'>
        <!-- Top menu -->
        <nav class="navbar navbar-inverse navbar-no-bg" role="navigation">
            <div class="container">

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="top-navbar-1">
                    <ul class="nav navbar-nav navbar-right">
                        <li>
                            <span class="li-text">Put some text or</span>
                            <a href=""><strong>links</strong></a>
                            <span class="li-text">here, or some icons: </span>
                            <span class="li-social">
                                    <a href=""><i class="fa fa-facebook"></i></a>
                                    <a href=""><i class="fa fa-twitter"></i></a>
                                    <a href=""><i class="fa fa-envelope"></i></a>
                                    <a href=""><i class="fa fa-skype"></i></a>
                                </span>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Top content -->
        <div class="top-content">
        <div class="inner-bg">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 col-sm-offset-8 text">
                        <h1><strong>Bootstrap</strong> Registration Form</h1>
                        <div class="description">
                            <p>
                                This is a free responsive registration form made with Bootstrap.
                                Download it on <a href=""><strong>AZMIND</strong></a>, customize and use it as you like!
                            </p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6 book">
                        <img src="{{asset('admin/images/ebook.png')}}" alt="">
                    </div>
                    <div class="col-sm-5 form-box">
                        <div class="form-top">
                            <div class="form-top-left">
                                <h3>Get our eBook</h3>
                                <p>Fill in the form below to get instant access:</p>
                            </div>
                            <div class="form-top-right">
                                <i class="fa fa-pencil"></i>
                            </div>
                        </div>
                        <div class="form-bottom">
                            <form role="form" action="{{ url('/admin/login/login') }}" method="post" class="registration-form">
                                <div class="form-group">
                                    <label class="sr-only" for="login_name">Login name</label>
                                    <input type="text" name="login_name" placeholder="Login name..." class="form-first-name form-control" id="login_name" value="">
                                </div>
                                <div class="form-group">
                                    <label class="sr-only" for="login_pass">Login pass</label>
                                    <input type="text" name="login_pass" placeholder="Login pass..." class="form-last-name form-control" id="login_pass" value="">
                                </div>
                                <div class="form-group">
                                    <label class="sr-only" for="form-email">Captcha</label>
                                    <img id="captcha_img" data-src="{{ url('/admin/captcha') }}" src="{{ url('/admin/captcha') }}">
                                    <label class="col-sm-8">
                                        <input type="text" name="captcha" placeholder="Captcha..." class="form-email form-control" id="captcha" value="">
                                    </label>
                                </div>
                                <button type="button" id="login_btn" class="btn btn-info">Login In it!</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
        {{--<script type="text/javascript" src="{{ asset('admin/js/jquery-3.4.1.min.js')  }}"></script>--}}
        <script type="text/javascript" src="{{ asset('admin/layui/layui.js')  }}"></script>
        <script>
            layui.use(['layer', 'form'], function(){
                var $ = layui.jquery,layer = layui.layer;
                $(document).on('click','#login_btn',function(){
                    var login_json = {"login_name":$("#login_name").val(),"login_pass":$("#login_pass").val(),"captcha":$("#captcha").val()};
                    $.post("{{ url('/admin/login/login') }}",login_json,function (data) {
                        layer.msg(data.msg)
                        if(data.status){
                            location.href = '/admin/home/index';
                        }
                    });
                });
                $("#captcha_img").on('click',function () {
                    $(this).attr('src',$(this).attr('data-src')+"?a="+Date())
                });
            });
        </script>
    </body>
</html>
