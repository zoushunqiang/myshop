<?php
namespace Home\Controller;
use Think\Controller;
class ProductController extends Controller
{
  public function __construct(){
    parent::__construct();
    // 获取单页面列表
    $Contents = M('Contents');
    $content_list = $Contents->select();
    $this->assign('contents',$content_list);
  }
  // 产品列表
  public function Plist(){
    $Product = M('Product');
    if(!empty(I('get.sort'))){
      $sort = I('get.sort');
      $sortArr = array('is_new-asc', 'is_best-desc', 'price-desc', 'price-asc');
      if(!in_array($sort, $sortArr)){
        exit('参数错误');
        $this->error('参数错误');
      }
      $order = str_replace('-', ' ', $sort);
      $this->sort = $sort;
    }
    if(!empty(I('max',0,'intval'))){
      $min = I('min',0,'intval');
      $max = I('max',0,'intval');
      if(empty($min) && empty($max) ){
        exit('参数错误');
        $this->error('参数错误');
      }
      $where = "price>=$min AND price<$max ";
      $this->min = $min;
      $this->max = $max;
    }

    // 分页设定
    $count = $Product->where($where)->count();
    $Page = new \Think\Page($count, 5);
    $Page->setConfig('header','<span class="rows">共 %TOTAL_ROW% 条记录</span>');
    $Page->setConfig('prev','上一页');
    $Page->setConfig('next','下一页');
    $Page->setConfig('first','首页');
    $Page->setConfig('last','尾页');
    $Page->rollPage = 5;
    $Page->lastSuffix = false;
    $show = $Page->show();
    $list = $Product->where($where)->order($order)->limit($Page->firstRow.','.$Page->listRows)->select();
    $this->assign('list', $list);
    $this->assign('page', $show);
    $this->display('list');
  }
  // 产品详情
  public function info(){
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
}