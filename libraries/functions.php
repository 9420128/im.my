<?php

function print_arr($arr){

    echo '<pre>';
    print_r($arr);
    echo '</pre>';

}

// Проверяем убираем "/" вначале строки
function delet_sleh($arr){
    if($arr[0] === '/'){
        return substr($arr,1);
    }
    return $arr;
}

if(!function_exists('mb_str_replace')){
    function mb_str_replace($needle, $text_replace, $haystack){
        return implode($text_replace, explode($needle, $haystack));
    }
}