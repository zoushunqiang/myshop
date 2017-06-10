<?php
namespace Admin\Controller;
use Think\Controller;
class OrderController extends Controller
{
  public function __construct(){
    parent::__construct();
    if(empty(session('admin_user'))){
      $this->error('请先登陆',U('Login/login'));
    }
  }
  public function orders(){
    $Orders = M('Orders');
    $list = $Orders->select();
    $this->assign('list', $list);
    $this->display();
  }
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
}