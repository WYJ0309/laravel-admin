<html xmlns="http://www.w3.org/1999/xhtml">
@component('front.component',['title'=>'网站标题','keyword'=>'关键词','description'=>'描述'])@endcomponent
<body>
<header>
    @include('front.nav')
</header>
<article>
    <div class="blogs">
        @foreach($result as $value)
        <li> <span class="blogpic"><a href="/"><img src="{{ asset($value['thumb_url']) }}"></a></span>
            <h3 class="blogtitle"><a href="/">{{ $value['article_title'] }}</a></h3>
            <div class="bloginfo">
                <p>{{ $value['article_desc'] }}</p>
            </div>
            <div class="autor"><span class="lm"><a href="{{ url('/news/detail/'.$value['id']) }}" title="{{ $value['article_keyword'] }}" target="_blank" class="classname">{{ $value['cate_name'] }}</a></span><span class="dtime">{{ $value['created_at'] }}</span><span class="viewnum">浏览（<a href="{{ url('/news/detail/'.$value['id']) }}">{{ $value['view_num'] }}</a>）</span><span class="readmore"><a href="{{ url('/news/detail/'.$value['id']) }}">阅读原文</a></span></div>
        </li>
        @endforeach
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