<?php 
namespace Admin\Model;
use Think\Model;
class AdminUserModel extends Model
{
  protected $_validate = array(
    array('verify','require','验证码不能为空',1),
    array('verify','check_verify','验证码错误',1,'function'),
    array('username','require','用户名不能为空',1),
    array('password','require','密码不能为空',1),
    );
}