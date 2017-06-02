<?php
namespace Admin\Controller;
use Think\Controller;
class IndexController extends Controller {
  public function __construct(){
    parent::__construct();
    if(empty(session('admin_user'))){
      $this->error('请先登陆',U('Login/login'));
    }
  }
  public function index(){
    $AdminUser = M('AdminUser');
    $username = session('admin_user');
    $userInfo = $AdminUser->where(array('username'=>$username))->find();
    $this->assign('userInfo',$userInfo);
    $this->display();
    // 更新登陆信息
    $login_time = time();
    $login_ip = get_client_ip();
    $data = array(
          'login_ip' => $login_ip, 
          'login_time' => $login_time, 
          );
    $id = $AdminUser->where('uid='.$re['uid'])->data($data)->save();
    $id2 = $AdminUser->where('uid='.$re['uid'])->setInc('login_num',1);
  }
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
      $login_time = time();
      $login_ip = get_client_ip();
      $re = $AdminUser->where("`username`='$username' and `password`='$password' ")->find();
      if(empty($re)){
        $this->error('用户名或密码错误');
      }else{
        $data = array(
          'login_time' => $login_time,
          'login_ip' => $login_time, 
          );
        $id = $AdminUser->where('uid='.$re['uid'])->data($data)->save();
        $id2 = $AdminUser->where('uid='.$re['uid'])->setInc('login_num',1);
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
    $verify = new \Think\verify($config);
    return $verify->entry();
  }
}
