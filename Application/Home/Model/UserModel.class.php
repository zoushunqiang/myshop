<?php
namespace Home\Model;
use Think\Model;
class UserModel extends Model
{
  protected $_map = array(
    'user' => 'username',
    'pwd' => 'password',
    );
  protected $_validate = array(
    array('verify','require','验证码不能为空',1),
    array('verify','check_verify','验证码错误',1,'function'),
    array('username','/^[a-zA-Z]\w{4,15}$/','用户名需字母开头，可5～16字符的字母数字下划线组合',1),
    array('username','','用户名已注册',0,'unique',1),
    array('password','/^(?![A-Z]+$)(?![a-z]+$)(?!\d+$)(?![\W_]+$)\S{6,16}$/','密码需6~16字符含有小写字母、大写字母、数字、特殊符号的两种及以上',1),
    array('reg_ip',''),
    array('repwd','password','两次密码不一致',2,'confirm'),
    array('email','email','email格式不正确'),
    array('username','check_login','用户名或密码错误！',1,'callback',4),
  );
  protected $_auto = array(
    array('password','md5',3,'function') , // 对password字段在新增和编辑的时候使md5函数处理
    array('reg_time','time',3,'function'), // 对update_time字段在更新的时候写入当前时间戳
    );

  /**
   * 登陆用户名和密码验证
   * @return null [description]
   */
  public function check_login(){
  $User = M('User');
  $username = I('user');
  $remember = I('remember');
  $password = md5(I('pwd'));
  $login_ip = get_client_ip();
  $login_time = time();
  $data = array(
    'login_ip' => $login_ip,
    'login_time' => $login_time,
    );
  $re = $User->where("`username`='$username' and `password`='$password' ")->find();
  if(!empty($re)){
    // 更新登陆次数
    $User->where('uid='.$re['uid'])->data($data)->save();
    $User->where('uid='.$re['uid'])->setInc("login_num",1);
    if(!empty($remember)){
      cookie('username',$username);
      cookie('login',$username);
    }
    session('username',$username);
    session('uid',$re['uid']);
    return true;
    }else{
      return false;
    }
  }
}
