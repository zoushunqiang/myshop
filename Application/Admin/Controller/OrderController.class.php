<?php
namespace Admin\Controller;
use Think\Controller;
// 后台订单处理
class OrderController extends Controller
{
  public function __construct(){
    parent::__construct();
    if(empty(session('admin_user'))){
      $this->error('请先登陆',U('Login/login'));
      $this->ajaxReturn(3);
    }
  }
  public function orders(){
    $_GET['search'] = trim(I('search'));
    $search = '%'.$_GET['search'].'%';
    $map['sn'] = array('LIKE', $search);
    $Orders = M('Orders');
    $count = $Orders->where($map)->count();
    $Page = new \Think\Page($count,1);
    $show = $Page->show();
    $list = $Orders->where($map)->limit($Page->firstRow.','.$Page->listRows)->select();
    $this->assign('list', $list);
    $this->assign('page', $show);
    $this->display();
  }
  // 订单详情
  public function order_info(){
    $oid = I('oid');
    if(empty($oid)){
      $this->error('参数错误');
      exit;
    }
    $Orders = M('Orders');
    $Info = $Orders->where(array('oid'=>$oid))->find();
    $OrdersProduct = M('OrdersProduct');
    $list = $OrdersProduct->where(array('oid'=>$oid))->select();
    $this->assign('Info',$Info);
    $this->assign('list',$list);
    $this->display();
  }
  public function delOrder(){
    echo 'delOrder';
  }
  public function editOrder(){
    echo 'eidtOrder';
  }
}