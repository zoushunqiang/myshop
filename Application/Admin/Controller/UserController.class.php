<?php
namespace Admin\Controller;
use Think\Controller;
class UserController extends Controller {
  public function __construct(){
    parent::__construct();
    if(empty(session('admin_user'))){
      $this->error('请先登陆',U('Login/login'));
    }
  }
  // 用户列表
  public function user(){
    $User = M('User');
    $_GET['search'] = trim(I('search')); //去除空格
    $username = '%'.I('search').'%'; // 模糊搜索
    $map['username'] = array('LIKE',$username);
    $count = $User->where($map)->count();

    // 分页设定
    $Page = new \Think\Page($count,2);
    $Page->setConfig('header','<span class="rows">共 %TOTAL_ROW% 条记录</span>');
    $Page->setConfig('prev','上一页');
    $Page->setConfig('next','下一页');
    $Page->setConfig('first','首页');
    $Page->setConfig('last','尾页');
    $Page->setConfig('theme',' %FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END%');
    $Page->rollPage = 5;
    $Page->lastSuffix = false;
    $show = $Page->show();
    $list = $User->where($map)->order('uid desc')->limit($Page->firstRow.','.$Page->listRows)->select();
    $header = '<span class="rows">共 '.$count.' 条记录</span>';
    $this->assign('header',$header);
    $this->assign('list',$list);
    $this->assign('page',$show);
    $this->display();
  }
  // 删除用户
  public function delete(){
    $User = M('User');
    $uid = array('uid'=>I('uid'));
    $re = $User->where($uid)->delete();
    if($re>0){
      $this->success('删除成功');
    }
    else{
      $this->error();
    }
  }
  // 修改页面
  public function change(){
    $User = M('User');
    if(empty(I('get.uid','','intval'))){
      $this->error('用户不存在');
    }
    $Info = $User->where(array('uid'=>I('get.uid', '', 'intval')))->find();
    $this->assign('Info',$Info);
    $this->display();
  }  
  // 修改信息
  public function doChange(){
    $User = M('User');
    $username = I('post.username');
    $password = I('post.password');
    $tel = I('post.tel');
    $sex = I('post.sex');
    $uid = I('post.uid');
    if(empty($password)){
      $data = array(
        'username'=>$username,
        'tel'=>$tel,
        'sex'=>$sex,
        );
    }else{
      $data = array(
        'username'=>$username,
        'password'=>md5($password),
        'tel'=>$tel,
        'sex'=>$sex,
        );
    }
    $re = $User->where(array('uid'=>$uid))->data($data)->save();
    if($re>0){
      $this->success('修改成功');
    }else{
      $this->success('系统繁忙，请稍候再试');
    }
  }
}


