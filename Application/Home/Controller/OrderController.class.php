<?php
namespace Home\Controller;
use \Think\Controller;
// 前台订单处理
class OrderController extends Controller
{
  public function __construct(){
    parent::__construct();
    if(empty($_SESSION['uid'])){
      redirect(U('User/login'));
      exit;
    }
    $Contents = M('Contents');
    $content_list = $Contents->select();
    $this->assign('contents',$content_list);
  }
  // 展示订单提交页面
  public function order(){
    // 获取购物车信息
    $Cart = M('Cart');
    $list = $Cart->where(array('uid'=>session('uid')))->join('tp_product ON tp_cart.pid = tp_product.pid')->select();
    $sumAll = $Cart->where(array('uid'=>session('uid')))->join('tp_product ON tp_cart.pid = tp_product.pid')->sum('tp_product.price * tp_cart.number  ');
    if(empty($list)){
      $this->error('购物车为空，请添加商品',U('Product/Plist'));
      exit;
    }
    // 输出地址
    $addr = M('UserAddress')->where(array('uid'=>session('uid')))->order('id desc')->select();
    // 省 市 级三级联动
    $City = M('City');
    $province = $City->where(array('pid'=>'100000'))->select();
    $this->province = $province;
    $this->sumAll = $sumAll;
    $this->addr = $addr;
    $this->list = $list;
    $this->display('Cart:submit');
  }
  // 保存订单 
  public function saveOrder(){
    // 保证购物车中有商品
    if(empty(M('Cart')->where(array('uid'=>session('uid')))->select())){
      $this->error('购物车中没有商品，请将需要购买的商品添加到购物车');
      exit;
    }
    // 获取收货信息
    $total = I('total');
    $payid = I('payid');
    $addrid = I('addrid');
    $addrInfo = M('UserAddress')->where(array('id'=>$addrid))->find();
    $addr = $addrInfo['province'].$addrInfo['city'].$addrInfo['area'].$addrInfo['addr'];
    $sn = 'sn_'.date("YmdHis").rand(1000,9999);
    $data = array(
      'uid' => session('uid'),
      'sn' => $sn,
      'total' => $total,
      'payid' => $payid,
      'consignee' => $addrInfo['consignee'],
      'tel' => $addrInfo['tel'],
      'addr' => $addr,
      'status' => 1,
      'add_time' => time(),
      );
    // 逐一比对商品库存状况
    $Cart = M('Cart');
    $Product = M('Product');
    $commoditys = $Cart->where(array('uid'=>session('uid')))->select();
    foreach ($commoditys as $v) {
      $re = $Product->where(array('pid'=>$v['pid']))->find();
      if($v['number']>$re['stock']){
        $error = $re['title'].'的库存只剩'.$re['stock'].'件。请修改下单数量';
        exit($error);
      }
    }
    // 保存信息到订单表
    $Orders = M('Orders');
    $oid = $Orders->add($data);
    if(!($oid > 0)){
      exit('订单保存失败');
    }
    // 循环保存商品到订单产品表  修改库存
    $OrdersProduct = M('OrdersProduct');
    foreach ($commoditys as $v) {
      $re = $Product->where(array('pid'=>$v['pid']))->find();
      $data = array(
        'oid' => $oid,
        'pid' => $v['pid'],
        'uid' => session('uid'),
        'title' => $re['title'],
        'img' => $re['water_img'],
        'price' => $re['price'],
        'number' => $v['number'],
        'add_time' => time(),
        );
      $re2 = $OrdersProduct->add($data);
      if(!($re2>0)){ exit('操作失败，请稍后再试'); }
      // 修改库存
      $stock = $re['stock']-$v['number'];
      $re3 = $Product->where(array('pid'=>$v['pid']))->save(array('stock'=>$stock));
      if(!($re3>0)){ exit('修改库存失败'); }
    }
    // 清除购物车中的商品
    $re4 = $Cart->where(array('uid'=>session('uid')))->delete();
    if($re4>0){
      session('cartCount', null);
    }else{
      exit('提交失败');
    }
    // 保存订单日志
    $dataLog = array(
      'uid' => session('uid'),
      'oid' => $oid,
      'value' => '',
      'username' => session('username'),
      'uid' => session('uid'),
      'status' => 1,
      'add_time' => time(),
      );
    $re5 = M('OrdersLog')->add($dataLog);
    if(empty($re5)){
      exit('操作失败，请稍后再试');
    }else{
      echo 1; // 返回给ajax 跳转到订单提交成功页面
    }
  }
  /**
   * 省 市 区三级联动查询
   * @return [type] [description]
   */
  public function getCity(){
    $pid = I('pid');
    $City = M('City');
    $row = $City->where(array('pid'=>$pid))->select();
    foreach ($row as $v) {
      $str .= '<option pid="'.$v['id'].'">'.$v['name'].'</option>';
    }
    echo $str;
  }
  public function confirm(){
    $province = I('province');
    $city = I('city');
    $area = I('area');
    $addr = I('addr');
    $tel = I('tel');
    $consignee = I('consignee');
    if(empty($province) || empty($city) || empty($area)||
     empty($addr) || empty($tel) || empty($consignee)){
      exit('请保证地址完整填写');
    }
    if(!preg_match('/^1[3578]\d{9}$/', $tel)){
      exit('手机格式错误');
    }
    $UserAddress = M('UserAddress');
    $count = $UserAddress->where(array('uid'=>session('uid')))->count();
    if($count>=5){
      exit('最多保存5个地址');
    }
    $data = array(
      'province' => $province,
      'city' => $city,
      'area' => $area,
      'addr' => $addr,
      'tel' => $tel,
      'consignee' => $consignee,
      'add_time' => time(),
      'uid' => session('uid'),
      );
    $addr_id = I('addr_id');
    if(empty($addr_id)){
      $re = $UserAddress->add($data);
    }else{
      $re = $UserAddress->where(array('id'=>$addr_id))->save($data);
    }
    echo $re;
      // echo $consignee,'&nbsp;&nbsp;',$province,$city,$area,$addr,'&nbsp;&nbsp;',$tel;
  }
  // 提交成功页面
  public function success(){
    $this->display('Cart:success');
  }
  // 用户订单查看
  public function user(){
    $uid = session('uid');
    $Orders = M('Orders');
    $OrdersProduct = M('OrdersProduct');
    $orders_list = $Orders->where(array('uid'=>$uid))->select();
    $orders_product = array();
    foreach ($orders_list as $v) {
      $row = $OrdersProduct->where(array('uid'=>$uid,'oid'=>$v['oid']))->select();
        $orders_product[$v['oid']] = $row;
    }
    $this->orders_list = $orders_list;
    $this->orders_product = $orders_product;
    $this->display('Cart:user');
  }
}

