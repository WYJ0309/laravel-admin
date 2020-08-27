<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>HTML5网页模板</title>
    <meta name="keywords" content="HTML5网页模板" />
    <meta name="description" content="常用图标网址可切换，鼠标经过有遮罩层效果。" />
    <link href="{{ asset('front/css/index.css') }}" rel="stylesheet" type="text/css">
</head>
<body style="zoom: 1.1125;background-image: url('{{ asset('front/images/13.png') }}');">
<div id="nav-main">
    <div id="search" >
        <div id="searchout">
            <div id="search_type" >
                <div class="search_top_type" type="web" >网页</div>
                <div class="search_top_type" type="news">新闻</div>
                <div class="search_top_type" type="image">图片</div>
                <div class="search_top_type" type="video">视频</div>
                <div class="search_top_type" type="music">博客</div>
                <div class="search_top_type" type="map">地图</div>
            </div>
            <div id="searchform">
                <div id="search_option" ></div>
                <input type="text" id="search_input" name="search">
                <div id="searchbutton"></div>
            </div>
        </div>
    </div>
</div>
<div id="main">
    <div class="slides">
        <ul>
            <li>
                <ul>
                    <li><div class="case_w"><img src="/front/images/renren.png" /></div></li>
                    <li><div class="case_w"><img src="/front/images/dangdang.png" /></div></li>
                </ul>
            </li>
        </ul>
        <ul>
            <li>
                <ul>
                    <li><div class="case_w"><img src="/front/images/douban.png" /></div></li>
                    <li><div class="case_w"><img src="/front/images/youtube.png" /></div></li>
                </ul>
            </li>
        </ul>
        <ul>
            <li>
                <ul>
                    <li><div class="case_w"><img src="/front/images/sina.png" /></div></li>
                    <li><div class="case_w"><img src="/front/images/zhifubao.png" /></div></li>
                </ul>
            </li>
        </ul>
    </div>
</div>
<article>
    <div class="blogs">
        <li> <span class="blogpic"><a href="/"><img src="{{ asset('front/images/text02.jpg') }}"></a></span>
            <h3 class="blogtitle"><a href="/">陌上花开，可缓缓归矣</a></h3>
            <div class="bloginfo">
                <p>用最简单的代码，实现瀑布流布局，没有繁琐的css，没有jq，只需要做到以下就可以实现瀑布流的效果。思路很简单，看成是三列布局，分别用三个ul来调用。帝国cms列表模板，...</p>
            </div>
            <div class="autor"><span class="lm"><a href="/" title="CSS3|Html5" target="_blank" class="classname">CSS3|Html5</a></span><span class="dtime">2018-05-04</span><span class="viewnum">浏览（<a href="/">0</a>）</span><span class="readmore"><a href="/">阅读原文</a></span></div>
        </li>
        <li> <span class="blogpic"><a href="/"><img src="{{ asset('front/images/text01.jpg') }}"></a></span>
            <h3 class="blogtitle"><a href="/">网页中图片属性固定宽度，如何用js改变大小</a></h3>
            <div class="bloginfo">
                <p>用最简单的代码，实现瀑布流布局，没有繁琐的css，没有jq，只需要做到以下就可以实现瀑布流的效果。思路很简单，看成是三列布局，分别用三个ul来调用。帝国cms列表模板，...</p>
            </div>
            <div class="autor"><span class="lm"><a href="/" title="CSS3|Html5" target="_blank" class="classname">CSS3|Html5</a></span><span class="dtime">2018-05-04</span><span class="viewnum">浏览（<a href="/">0</a>）</span><span class="readmore"><a href="/">阅读原文</a></span></div>
        </li>
    </div>
    <div class="sidebar">
        <div class="about">
            <div class="avatar"> <img src="{{ asset('front/images/avatar.jpg') }}" alt=""> </div>
            <p class="abname">dancesmile | 杨青</p>
            <p class="abposition">Web前端设计师、网页设计</p>
            <div class="abtext"> 一个80后草根女站长！09年入行。一直潜心研究web前端技术，一边工作一边积累经验，分享一些个人博客模板，以及SEO优化等心得。 </div>
        </div>


        <div class="paihang">
            <h2 class="hometitle">点击排行</h2>
            <ul>
                <li><b><a href="download/div/2015-04-10/746.html" target="_blank">【活动作品】柠檬绿兔小白个人博客模板30...</a></b>
                    <p><i><img src="/front/images/t02.jpg"></i>展示的是首页html，博客页面布局格式简单，没有复杂的背景，色彩局部点缀，动态的幻灯片展示，切换卡，标...</p>
                </li>
            </ul>
        </div>
        <div class="paihang">
            <h2 class="hometitle">站长推荐</h2>
            <ul>
                <li><b><a href="download/div/2015-04-10/746.html" target="_blank">【活动作品】柠檬绿兔小白个人博客模板30...</a></b>
                    <p><i><img src="/front/images/t02.jpg"></i>展示的是首页html，博客页面布局格式简单，没有复杂的背景，色彩局部点缀，动态的幻灯片展示，切换卡，标...</p>
                </li>
            </ul>
        </div>
    </div>
    </div>
</article>
</body>
</html>