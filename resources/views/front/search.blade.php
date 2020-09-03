<!DOCTYPE HTML>
<html lang="zh-CN">
@component('front.component',['title'=>'网站标题','keyword'=>'关键词','description'=>'描述'])@endcomponent
<body>
<header>
    @include('front.nav')
</header>
<div id="nav-main">
    <form id="searchform" method="get" action="{{ url('/news') }}">
        <div id="search_option" ></div>
        <input type="text" id="search_input" name="search" value="">
        <input id="searchbutton" type="submit" value="" />
    </form>
</div>
<div class="newsPg">
    <div class="newsList">
        <div class="row">
            <ul>
                @empty($article_list->toArray())
                    @include('front.jellyfish')
                @else
                    @foreach( $article_list as $value)
                        <li>
                            <a href="{{ url('/news/detail/'.$value['id']) }}">
                                <div class="newsTime"><p>{{ $value->created_at->format('m') }}/{{ $value->created_at->format('d') }}</p><span>{{ $value->created_at->format('Y') }}</span></div>
                                <div class="newsTitle">
                                    <h3>{{ $value['article_title'] }}</h3>
                                    <p>{{ $value['article_desc'] }}</p>
                                </div>
                            </a>
                        </li>
                    @endforeach
                @endempty
            </ul>
        </div>
    </div>
</div>
</body>
</html>
