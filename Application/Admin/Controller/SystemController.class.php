<?php
namespace Admin\Controller;
use THink\Controller;
class SystemController extends Controller
{
  public $AdminUser = ''; // 创建数据库
  public function __construct(){
    parent::__construct();
    if(empty(session('admin_user'))){
      $this->error('请先登陆',U('Login/login'));
    }
    $this->AdminUser = M('AdminUser');
  }
  public function adminUser(){
    $list = $this->AdminUser->select();
    $this->assign('list',$list);
    $this->display();
  }
  public function config(){
    $this->display();
  }
  public function info(){
    $uid = I('uid');
    $Info = $this->AdminUser->where(array('uid'=>$uid))->find();
    $this->assign('Info',$Info);
    $this->display();
  }
  public function doChange(){
    $uid = I('uid');
    $username = I('username');
    $password = I('password');
    if(empty($password)){
      $data = array(
        'username' => $username,
        );
    }else{
      $data = array(
        'username' => $username,
        'password' => md5($password),
        );
    }
    if(empty($uid)){
      $re = $this->AdminUser->add($data);
    }else{
      $re = $this->AdminUser->where(array('uid'=>$uid))->save($data);
    }
    
    if($re>0){
      $this->success('操作成功');
    }else{
      $this->error('系统繁忙，请稍后再试');
    }
  }
}