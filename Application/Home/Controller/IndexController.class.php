<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
  public function __construct(){
    parent::__construct();

    // 获取单页面列表
    $Contents = M('Contents');
    $content_list = $Contents->select();
    $this->assign('contents',$content_list);
  }
  public function index(){
    $Banner = M('Banner');
    $WebConfig = M('WebConfig');
    $ban_list = $Banner->select();
    $web_config = $WebConfig->find();
    $this->assign('ban_list',$ban_list);
    $this->assign('web_config',$web_config);
    $this->display();
  }
  public function content(){
    $cat_id = I('get.cat_id',1,'');
    $Contents = M('Contents');
    $content = $Contents->where(array('cat_id'=>$cat_id))->find();
    $this->assign('content',$content);
    $this->display();
  }
}
