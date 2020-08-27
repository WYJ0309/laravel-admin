<?php

namespace App\Http\Controllers;




use Illuminate\Http\Response;

class TestController extends Controller
{
    public function index(){

        $arr = [
            [
                'image'=>'http://img.aiimg.com/uploads/allimg/200428/263915-20042Q31F7.jpg',
                'title'=>'百度图片',
                'subTitle'=>'特朗普宣布美国未来60天暂停接收移民',
                'actor'=>'美国总统',
                'score'=>'8',
                'action'=>'是是'
            ],
            [
                'image'=>'http://img.aiimg.com/uploads/allimg/200428/263915-20042Q31F7.jpg',
                'title'=>'百度图片',
                'subTitle'=>'特朗普宣布美国未来60天暂停接收移民',
                'actor'=>'美国总统',
                'score'=>'8',
                'action'=>'是是'
            ],
            [
                'image'=>'http://img.aiimg.com/uploads/allimg/200428/263915-20042Q31F7.jpg',
                'title'=>'百度图片',
                'subTitle'=>'特朗普宣布美国未来60天暂停接收移民',
                'actor'=>'美国总统',
                'score'=>'8',
                'action'=>'是是'
            ],
            [
                'image'=>'http://img.aiimg.com/uploads/allimg/200428/263915-20042Q31F7.jpg',
                'title'=>'阿凡达',
                'subTitle'=>'阿凡达系列',
                'actor'=>'德国总理',
                'score'=>'8',
                'action'=>'是是'
            ],
            [
                'image'=>'http://img.aiimg.com/uploads/allimg/200428/263915-20042Q31F7.jpg',
                'title'=>'异性大战铁血战士',
                'subTitle'=>'异性系列',
                'actor'=>'日本首相',
                'score'=>'8',
                'action'=>'是是'
            ],
            [
                'image'=>'http://img.aiimg.com/uploads/allimg/200428/263915-20042Q31F7.jpg',
                'title'=>'第一滴血',
                'subTitle'=>'兰博系列',
                'actor'=>'越南主席',
                'score'=>'8',
                'action'=>'是是'
            ]
        ];
        return json_encode($arr);
    }
    public function bannerList(){
        $arr = [
            "https://up.enterdesk.com/edpic_360_360/47/35/bd/4735bdc085dac932bc60d34f2f74bddb.jpg",
            "https://up.enterdesk.com/edpic_360_360/c5/aa/12/c5aa12216519b332ca3b6bdf5d8d0012.jpg",
            "https://up.enterdesk.com/edpic_360_360/17/f2/bc/17f2bc6e30770cd961e2ab737586711b.jpg",
            "https://up.enterdesk.com/edpic/85/92/be/8592be180351f0ff27c59d840eedddee.jpg",
            'http://pic1.win4000.com/wallpaper/7/52567518c7867.jpg',
            'http://pic1.win4000.com/wallpaper/2020-04-23/5ea15c57646d1.jpg',
            'http://pic1.win4000.com/wallpaper/2018-06-20/5b29fa2f6e5b4.jpg',
            'http://pic1.win4000.com/wallpaper/c/55cd84523e3f1.jpg'
        ];
        return Response()->json($arr);
    }
    public function cinemaList(){
        $arr = [
            [
                'title'=>'阿凡达',
                'subTitle'=>'阿凡达系列',
                'tag'=>'美国 科幻 未来 大片',
                'price'=>180
            ],
            [
                'title'=>'异性大战铁血战士',
                'subTitle'=>'异性系列',
                'tag'=>'美国 科幻 未来 大片',
                'price'=>200
            ],
            [
                'title'=>'第一滴血',
                'subTitle'=>'兰博系列',
                'tag'=>'美国 科幻 未来 大片',
                'price'=>1000
            ]
        ];
        return json_encode($arr);
    }
}
