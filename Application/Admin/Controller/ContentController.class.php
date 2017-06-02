<?php
namespace Admin\Controller;
use Think\Controller;
class ContentController extends Controller
{
  public function __construct(){
    parent::__construct();
    if(empty(session('admin_user'))){
      $this->error('请先登陆',U('Login/login'));
    }
  }
  // 单页面
  public function content(){
    $Contents = M('Contents');
    $list = $Contents->select();
    $this->assign('list',$list);
    $this->display();
  }
  // 单页面修改或添加
  public function info(){
      $Contents = M('Contents');
      $Info = $Contents->where(array('cat_id'=>I('get.cat_id')))->find();
      $this->assign('Info',$Info);
      $this->display();
  }
  // 单页面执行修改或添加
  public function doChange(){
    $Contents = M('Contents');
    $data = array(
        'title'=>I('post.title'),
        'cat_name'=>I('post.cat_name'),
        'content'=>I('post.content'),
        'add_time'=>time(),
        );
    // cat_id 为空则执行添加，有值则执行修改
    if(empty(I('post.cat_id'))){
      $re = $Contents->add($data);
    }else{
      $re = $Contents->where(array('cat_id'=>I('post.cat_id')))->save($data);
    }
    if($re>0){
      $this->success('操作成功');
    }else{
      $this->error('系统繁忙，请稍后再试');
    }
  }
  // banner
  public function banner(){
    $this->display();
  }
  // banner添加或修改
  public function bannerChange(){
    
  }
}
