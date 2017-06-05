<?php
/**
 * 验证码验证
 * @param  string $code 通过自动验证自动获取post传递数据
 * @param  string $id   [description]
 * @return boolean
 */
function check_verify($verify,$id=''){
  $Verify = new \Think\Verify();
  return $Verify->check($verify,$id);
}

function Mystrsub($str,$len=12){
  $strlen = mb_strlen($str,'utf-8');
  if($strlen > $len){
    return $str = mb_substr($str, 0, $len, 'utf-8').'...';
  }else{
    return $str;
  }
}