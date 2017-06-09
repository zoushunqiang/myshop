<?php
namespace Home\Controller;
use \Think\Controller;
class OrderController extends Controller
{
  public function __construct(){
    parent::__construct();
    if(empty($_SESSION['uid'])){
      redirect(U('User/login'));
    }
    $Contents = M('Contents');
    $content_list = $Contents->select();
    $this->assign('contents',$content_list);
    
  }
  public function order(){
    // 获取购物车信息
    $Cart = M('Cart');
    $list = $Cart->where(array('uid'=>session('uid')))->join('tp_product ON tp_cart.pid = tp_product.pid')->select();
    $sumAll = $Cart->where(array('uid'=>session('uid')))->join('tp_product ON tp_cart.pid = tp_product.pid')->sum('tp_product.price * tp_cart.number  ');
    if(empty($list)){
      $this->error('购物车为空，请前往添加商品');
    }
    // 输出地址
    $addr = M('UserAddress')->where(array('uid'=>session('uid')))->select();
    // 省 市 级三级联动
    $City = M('City');
    $province = $City->where(array('pid'=>'100000'))->select();

    $this->province = $province;
    $this->sumAll = $sumAll;
    $this->addr = $addr;
    $this->list = $list;
    $this->display('Cart:submit');
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
    $UserAssress = M('UserAddress');
    $count = $UserAddress->where(array('uid'=>session('uid')))->count();
    if($count>=4){
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

    $re = $UserAssress->add($data);
    if($re>0){
      echo '添加成功';
      // echo $consignee,'&nbsp;&nbsp;',$province,$city,$area,$addr,'&nbsp;&nbsp;',$tel;
    }else{
      echo '添加失败';
    }
  }
}



