<!DOCTYPE HTML>
<html lang="zh-CN">
@component('front.component',['title'=>'网站标题','keyword'=>'关键词','description'=>'描述'])@endcomponent
<body>
<header>
    @include('front.nav')
</header>
<div id="nav-main">
    <div id="searchform" >
        <div id="search_option" ></div>
        <input type="text" id="search_input" name="search">
        <div id="searchbutton"></div>
    </div>
</div>
<div class="newsPg">
    <div class="banner">
        <img src="{{ asset('front/images/ban4.jpg') }}"/>
    </div>
    <div class="newsList container">
        <section class="title">
            <h2>新闻中心</h2>
        </section>
        <div class="row">
            <ul>
                <li>
                    <a href="news_detail.html">
                        <div class="newsTime">
                            <p>5/22</p>
                            <span>2017</span>
                        </div>
                        <div class="newsTitle">
                            <h3>2016-2017全球IT软件外包行业趋势分析报告</h3>
                            <p>
                                本文将透过横跨10年的市场规模分析，国外外包领域龙头的表现，
                                国内12家上市的外包服务企业，四大会计师事务所花费三年的市场调查，
                                来深度分析外包产业的现状与预测未来的趋势，以及分享在企业服务领
                                域可以脱颖而出的关键因素。
                            </p>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="news_detail.html">
                        <div class="newsTime">
                            <p>5/22</p>
                            <span>2017</span>
                        </div>
                        <div class="newsTitle">
                            <h3>远程医疗软件系统平台开发解决方案分析！</h3>
                            <p>
                                随着生活水平的提高，人们越来越关注自己的健康，都希望得到便捷
                                和高质量的医疗保健服务。但由于医疗资源分布不均，不少地...
                            </p>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="news_detail.html">
                        <div class="newsTime">
                            <p>5/22</p>
                            <span>2017</span>
                        </div>
                        <div class="newsTitle">
                            <h3>物联网应用开发最新实时操作系统Zephyr</h3>
                            <p>
                                物联网时代不断向前推进，虽然还未出现爆发式增长，但很多人已
                                经切身体会了联网设备给生活带来的便捷。目前物联网设备越来...
                            </p>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="news_detail.html">
                        <div class="newsTime">
                            <p>5/22</p>
                            <span>2017</span>
                        </div>
                        <div class="newsTitle">
                            <h3>双向跨境电商，购物商城网站开发解决方案</h3>
                            <p>
                                跨境购商城是指能够在线开展跨境电子商务交易的商城，
                                和普通商城的区别在于，它可以直接连入中国电子口岸通关服务系统，进...
                            </p>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="news_detail.html">
                        <div class="newsTime">
                            <p>5/22</p>
                            <span>2017</span>
                        </div>
                        <div class="newsTitle">
                            <h3>阿里的社交梦，除了押注支付宝已别无他路？</h3>
                            <p>
                                支付宝又改版了，新版本再度强化社交功能，这又一次
                                印证了外界那句老掉牙但又最直接的评论——“马云(微博)的社交之心不死”
                            </p>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="news_detail.html">
                        <div class="newsTime">
                            <p>5/22</p>
                            <span>2017</span>
                        </div>
                        <div class="newsTitle">
                            <h3>要想立足未来 微软等软件公司必须折本研发硬件</h3>
                            <p>
                                今年这个秋季发生了一些有趣的事情。
                                　　“阅后即焚”照片分享应用Snapchat开始销售高科技的太阳镜，
                                搜索引擎巨头谷歌(微博)推出Pixe
                                l智能手机，而软件公司微软则发布Surface Studio一体机电脑。
                            </p>
                        </div>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
</body>
</html>
