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
    $Product = M('Product');
    $ban_list = $Banner->select();
    $web_config = $WebConfig->find();
    $new_list = $Product->where(array('is_new'=>'1'))->order('pid desc')->limit(5)->select();
    $best_list = $Product->where(array('is_best'=>'1'))->order('pid desc')->limit(5)->select();
    $this->assign('ban_list',$ban_list);
    $this->assign('web_config',$web_config);
    $this->assign('new_list',$new_list);
    $this->assign('best_list',$best_list);
    $this->display();
  }
  public function Plist(){
    $this->display('list');
  }
  public function product(){
    $pid = I('pid','','intval');
    $Product = M('Product');
    if(empty($pid)){
      $this->error('产品已下架');
    }else{
      
      $Info = $Product->where(array('pid'=>$pid))->find();
      if(empty($Info)){
        $this->error('产品已下架');
      }else{
        $this->assign('Info',$Info);
      }
    }
    $is_hot = $Product->where(array('is_hot'=>1))->limit(3)->select();
    $this->assign('is_hot',$is_hot);
    $this->display();
  }
  public function content(){
    $cat_id = I('get.cat_id',1,'intval');
    $Contents = M('Contents');
    $content = $Contents->where(array('cat_id'=>$cat_id))->find();
    $this->assign('content',$content);
    $this->display();
  }
}
