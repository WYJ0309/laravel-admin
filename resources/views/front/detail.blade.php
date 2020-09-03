<html xmlns="http://www.w3.org/1999/xhtml">
@component('front.component',['title'=>$article_title,'keyword'=>$article_keyword,'description'=>$article_desc])@endcomponent
<script src="/admin/js/jquery-3.4.1.min.js"></script>
<body>
<header>
    @include('front.nav')
</header>
<article>
    <div class="infos">
        <div class="newsview">
            <h3 class="news_title">{{ $article_title }}</h3>
            <div class="news_author"><span class="au01"><a href="/">{{ $article_keyword }}</a></span><span class="au02">{{ $created_at }}</span><span class="au03">共<b>{{ $view_num }}</b>人围观</span></div>
            <div class="news_about"><strong>简介</strong>{{ $article_desc }}</div>
            <div class="news_infos">{!! $content !!} </div>
        </div>
        <div class="share"> </div>
        <div class="nextinfo">
            @if( !empty($pre['article_title']) )
                <p>上一篇：<a href="{{ url('/news/detail/'.$pre['id']) }}">{{ $pre['article_title'] }}</a></p>
            @endif
            @if( !empty($next['article_title']) )
                <p>下一篇：<a href="{{ url('/news/detail/'.$next['id']) }}">{{ $next['article_title'] }}</a></p>
            @endif
        </div>
        @if( !empty($relative) )
        <div class="otherlink">
            <h2>相关文章</h2>
            <ul>
                @foreach( $relative as $val)
                    <li><a href="{{ url('/news/detail/'.$val['id']) }}" title="{{ $val['article_title'] }}">{{ $val['article_title'] }}</a></li>
                @endforeach
            </ul>
        </div>
        @endif
    </div>
    <div class="sidebar">
        @if( !empty($view_list) )
        <div class="paihang">
            <h3 class="twinkle">点击排行</h3>
            <ul>
                @foreach( $view_list as $val)
                    <li><b><a href="{{ url('/news/detail/'.$val['id']) }}" target="_blank">{{ $val['article_title'] }}</a></b>
                        <p><i><img src="{{ asset($val['thumb_url']) }}"></i>{{ substr_format($val['article_desc'],100,'...') }}</p>
                    </li>
                @endforeach
            </ul>
        </div>
        @endif
        @if( !empty($side_list) )
        <div class="paihang">
            <h3 class="twinkle">热推暖文</h3>
            <ul>
                @foreach( $side_list as $val)
                    <li><b><a href="{{ url('/news/detail/'.$val['id']) }}" target="_blank">{{ $val['article_title'] }}</a></b>
                        <p><i><img src="{{ asset($val['thumb_url']) }}"></i>{{ substr_format($val['article_desc'],100,'...') }}</p>
                    </li>
                @endforeach
            </ul>
        </div>
        @endif
    </div>
</article>
<script>
    $.getJSON("{{ url('news/incr/'.$id) }}");
</script>
</body>
</html>