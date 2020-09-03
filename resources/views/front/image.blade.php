<!DOCTYPE html>
<html>
@component('front.component',['title'=>'网站标题','keyword'=>'关键词','description'=>'描述'])@endcomponent
<body>
<header>
    @include('front.nav')
</header>
<div class="img_wrap">
    <div class="img_cube">
        <div class="out_front"><img src="{{ asset('front/images/1.jpg') }}" class="pic"></div>
        <div class="out_back"><img src="{{ asset('front/images/2.jpg') }}" class="pic"></div>
        <div class="out_left"><img src="{{ asset('front/images/3.jpg') }}" class="pic"></div>
        <div class="out_right"><img src="{{ asset('front/images/4.jpg') }}" class="pic"></div>
        <div class="out_top"><img src="{{ asset('front/images/5.jpg') }}" class="pic"></div>
        <div class="out_bottom"><img src="{{ asset('front/images/6.jpg') }}" class="pic"></div>
        <span class="in_front"><img src="{{ asset('front/images/7.jpg') }}" class="in_pic"></span>
        <span class="in_back"><img src="{{ asset('front/images/8.jpg') }}" class="in_pic"></span>
        <span class="in_left"><img src="{{ asset('front/images/9.jpg') }}" class="in_pic"></span>
        <span class="in_right"><img src="{{ asset('front/images/10.jpg') }}" class="in_pic"></span>
        <span class="in_top"><img src="{{ asset('front/images/11.jpg') }}" class="in_pic"></span>
        <span class="in_bottom"><img src="{{ asset('front/images/12.jpg') }}" class="in_pic"></span>
    </div>
</div>
</body>
</html>