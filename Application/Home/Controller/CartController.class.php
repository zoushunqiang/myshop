<?php
namespace Home\Controller;
use \Think\Controller;
class CartController extends Controller
{
  public function __construct(){
    parent::__construct();
    // 获取单页面列表
    $Contents = M('Contents');
    $content_list = $Contents->select();
    $this->assign('contents',$content_list);
  }
  // 显示购物车产品信息
  public function cart(){
    if(empty(session('username'))){
      $pid = I('get.pid','','intval');
      if(empty($pid)){
        $this->error('参数错误');
      }
      $good_nums = I('good_nums','','intval');
      $Product = M('Product');
      $Info = $Product->where(array('pid'=>$pid))->find();
      $_SESSION['cart']["$pid"] = array(
          'pid' => $pid,
          'number' => $good_nums,
          'price' => $Info['price'],
          'title' => $Info['title'],
          'water_img' => $Info['water_img'],
          'count' => floatval($Info['price'])*$good_nums,
        );
      $this->list = $_SESSION['cart'];
    }else{
      $pid = I('get.pid','','intval');
      $uid = session('uid');
      $good_nums = I('good_nums','','intval');
      $Cart = M('Cart');
      if(!empty($_SESSION['cart'])){
        foreach ($_SESSION['cart'] as $v) {
          $check = $Cart->where(array('uid'=>$uid))->where(array('pid'=>$v['pid']))->find();

          if(!empty($check)){
            $good_nums = $check['number']+$v['number'];
            $data = array(
              'number' => $good_nums,
              'add_time' => time(),
              );
            $re = $Cart->where(array('uid'=>$uid))->where(array('pid'=>$pid))->save($data);
          }else{
            $data = array(
              'uid' => $uid,
              'pid' => $v['pid'],
              'number' => $v['number'],
              'add_time' => time(),
              );
            $Cart->add($data);
          }
        }
        session('cart',null);
      }
      if(!empty($pid)){
        $check = $Cart->where(array('uid'=>$uid))->where(array('pid'=>$pid))->find();

        if(!empty($check)){
          $good_nums = $check['number']+$good_nums;
          $data = array(
            'number' => $good_nums,
            'add_time' => time(),
            );
          $re = $Cart->where(array('uid'=>$uid))->where(array('pid'=>$pid))->save($data);
        }else{
          $data = array(
            'uid' => $uid,
            'pid' => $pid,
            'number' => $good_nums,
            'add_time' => time(),
            );
          $re = $Cart->add($data);
        }
      }
      $this->list = $Cart->where(array('uid'=>$uid))->join('tp_product ON tp_cart.pid = tp_product.pid')->select();
    }
    if(!empty($pid)){
      // 刷新去掉参数，防止用户刷新重复添加
      $this->redirect('Cart/cart');
    }
    $this->display();
  }
  // 添加产品到购物车

  // 减少数量
  // 增加数量
  // 数量

}