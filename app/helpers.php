<?php

function substr_format($text, $length, $replace='..', $encoding='UTF-8')
{
    if ($text && mb_strlen($text, $encoding) > $length) {
        return mb_substr($text, 0, $length, $encoding) . $replace;
    }
    return $text;
}

/**
 * 分组
 * 例子：menuGroup([[],[],[]],0,['pid','id']);
 * @param $menuList
 * @param int $pid
 * @param array $keyArr
 * @return array
 */
function menuGroup($menuList,$pid = 0,$keyArr=[]){
    if(empty($menuList)){
        return [];
    }
    $menuArr = [];
    foreach($menuList as $value){
        if($value[$keyArr[0]] == $pid){
            $value['sub_menu'] = menuGroup($menuList,$value[$keyArr[1]],$keyArr);
            $menuArr[] = $value;
        }
    }
    return $menuArr;
}

/**
 * 重置key-value 以二维数组中某个某个key为索引
 * keyValue([[],[],[]],['id']);
 * @param $originArr
 * @param array $keyArr
 * @return array
 */
function keyValue($originArr,$keyArr=[]){
    if(empty($originArr)){
        return [];
    }
    $returnArr = [];
    foreach($originArr as $value){
        $returnArr[$value[$keyArr[0]]][] = $value;
    }
    return $returnArr;
}

/**
 * 组合数据 以上面两个函数的结果作为第一第二个参数，用两个参数数组中关联的key作为第三个参数
 * @param array $menuList
 * @param array $subArr
 * @param string $key_match
 * @return array
 */
function combineMenu($menuList=[],$subArr=[],$key_match='id'){
    if(empty($menuList)){
        return [];
    }
    $resArr = [];
    foreach ($menuList as $value){
        if(empty($subArr[$value[$key_match]])){
            $value['sub_menu'] = combineMenu($value['sub_menu'],$subArr,$key_match);
        }else{
            $value['sub_attr'] = $subArr[$value[$key_match]];
        }
        $resArr[] = $value;
    }
    return $resArr;
}
//无限级寻找子数据并更新
function searchSon($pid_str,$new_prefix){
    $sonObj = DB::table('admin_depart')->where('part_pid_str','=',$pid_str)->get();
    if($sonObj->isNotEmpty()){
        foreach ($sonObj as $obj){
            DB::table('admin_depart')->where('part_id','=',$obj->part_id)->update(['part_pid_str'=>$new_prefix.'-'.$obj->part_pid]);
            searchSon($obj->part_pid_str.'-'.$obj->part_id,$new_prefix.'-'.$obj->part_pid);
        }
    }else{
        return '';
    }
}