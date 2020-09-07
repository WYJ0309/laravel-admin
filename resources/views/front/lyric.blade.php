<html xmlns="http://www.w3.org/1999/xhtml">
@component('front.component',['title'=>1,'keyword'=>2,'description'=>3])@endcomponent
<script src="/admin/js/jquery-3.4.1.min.js"></script>
<body>
<header>
    @include('front.nav')
</header>
<article>
    <style>
        #container {
            position:relative;
            width:840px;
        }
        #leafContainer {
            position:absolute;
            width:100%;
            height:100%;
        }
        #message {
            position:absolute;
            width:100%;
            height:300px;
            background:transparent url('/front/images/textBackground.png') repeat-x center;
            color:#5C090A;
            font-size:220%;
            text-align:center;
            background-size:100% 100%;
            z-index:1;
            padding-top: 80px;
        }
        #leafContainer>div {
            position:absolute;
            width:100px;
            height:100px;
            animation-iteration-count:infinite,infinite;
            animation-direction:normal,normal;
            animation-timing-function:linear,ease-in;
        }
        #leafContainer>div>img {
            position:absolute;
            width:100px;
            height:100px;
            animation-iteration-count:infinite;
            animation-direction:alternate;
            animation-timing-function:ease-in-out;
            transform-origin:50% -100%;
        }
        @keyframes fade {
            0% {
                opacity:1;
            }
            90% {
                opacity:0.7;
            }
            100% {
                opacity:0;
            }
        }@keyframes drop {
             0% {
                 transform:translate(0px,0px);
             }
             100% {
                 transform:translate(0px,900px);
             }
         }@keyframes clockwiseSpin {
              0% {
                  transform:rotate(-50deg);
              }
              100% {
                  transform:rotate(50deg);
              }
          }@keyframes counterclockwiseSpinAndFlip {
               0% {
                   transform:scale(-1,1) rotate(50deg);
               }
               100% {
                   transform:scale(-1,1) rotate(-50deg);
               }
           }
    </style>
    <div id="container">
        <div id="leafContainer"></div>
        <div id="message">
            Fall leaves are beautiful…<br> on someone else’s lawn.
        </div>
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
    </div>
</article>
<script>
    const NUMBER_OF_LEAVES = 10;
    function init() {
        var container = document.getElementById('leafContainer');
        for (var i = 0; i < NUMBER_OF_LEAVES; i++) {
            container.appendChild(createALeaf());
        }
    }
    function randomInteger(low, high) {
        return low + Math.floor(Math.random() * (high - low));
    }
    function randomFloat(low, high) {
        return low + Math.random() * (high - low);
    }
    function pixelValue(value) {
        return value + 'px';
    }
    function durationValue(value) {
        return value + 's';
    }
    function createALeaf() {
        var leafDiv = document.createElement('div');
        var image = document.createElement('img');
        image.src = '/front/images/realLeaf' + randomInteger(1, 5) + '.png';
        leafDiv.style.top = "-100px";
        leafDiv.style.left = pixelValue(randomInteger(5, 900));
        var spinAnimationName = (Math.random() < 0.5) ? 'clockwiseSpin' : 'counterclockwiseSpinAndFlip';
        leafDiv.style.webkitAnimationName = 'fade, drop';
        image.style.webkitAnimationName = spinAnimationName;
        console.log(durationValue(randomFloat(5, 11)), durationValue(randomFloat(4, 8)))
        var fadeAndDropDuration = durationValue(randomFloat(5, 11));
        var spinDuration = durationValue(randomFloat(4, 8));
        leafDiv.style.webkitAnimationDuration = fadeAndDropDuration + ', ' + fadeAndDropDuration;
        image.style.webkitAnimationDuration = spinDuration;
        leafDiv.appendChild(image);
        return leafDiv;
    }
    window.addEventListener('load', init, false);
</script>
</body>
</html>