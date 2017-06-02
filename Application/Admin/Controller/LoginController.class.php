<?php
namespace Admin\Controller;
use Think\Controller;
class LoginController extends Controller {
  public function login(){
    $this->display();
  }
  public function doLogin(){
    $AdminUser = D('AdminUser');
    if(!$AdminUser->create()){
      $this->error($AdminUser->geterror());
    }else{
      $username = I("username");
      $password = md5(I("password"));
      // $login_time = time();
      // $login_ip = get_client_ip();
      $re = $AdminUser->where("`username`='$username' and `password`='$password' ")->find();
      if(empty($re)){
        $this->error('用户名或密码错误');
      }else{
        session('admin_user',$username);
          $this->success('登陆成功',U('Index/index'));
      }
    }
  }
  public function verify(){
    $config = array(
      'fontSize' => 18,
      'length'  => 4,
      'useNoise' => false,
      );
    $verify = new \Think\Verify($config);
    return $verify->entry();
  }
  public function doLogout(){
    session('admin_user',null);
    $this->success('即将跳转到登陆页面',U('Login/login'),3);
  }
}
