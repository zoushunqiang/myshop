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
  // 管理员列表
  public function adminUser(){
    $list = $this->AdminUser->select();
    $this->assign('list',$list);
    $this->display();
  }
  // 网站系统配置
  public function config(){
    $WebConfig = M('WebConfig');
    $Info = $WebConfig->find();
    $this->assign('Info',$Info);
    $this->display();
  }
  // 管理员增改页面
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
  // 管理员列表删除
  public function delUser(){
    $uid = I('uid');
    if(empty($uid)){
      $this->error('删除失败');
    }
    $re = $this->AdminUser->where(array('uid'=>$uid))->delete();
    if($re>0){
      $this->success('删除成功');
    }else{
      $this->error('删除失败');
    }
  }
  // 网站系统配置修改
  public function doConfig(){
    $WebConfig   = M('WebConfig');
    $w_id        = I('w_id');
    $title       = I('title');
    $url         = I('url');
    $keyword     = I('keyword');
    $description = I('description');
    $data = array(
      'title'       =>$title,
      'url'         =>$url,
      'keyword'     =>$keyword,
      'description' =>$description,
      );
    $re = $WebConfig->where(array('w_id'=>$w_id))->save($data);
    if($re>0){
      $this->success('保存成功');
    }else{
      $this->error('未修改任何内容，或保存失败');
    }

  }
}




