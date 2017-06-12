<?php
namespace Home\Controller;
use \Think\Controller;
class CartController extends Controller
{
  /**
   * 初始化单页面数据
   */
  public function __construct(){
    parent::__construct();
    // 获取单页面列表
    $Contents = M('Contents');
    $content_list = $Contents->select();
    $this->assign('contents',$content_list);
  }
  /**
   * 未登陆则显示sseion中的数据  统计购物车总数
   * 已登陆 有session数据 将session更新到数据库 超库存的提示并结束代码 小于等于0不执行
   * 已登则联表查询  统计购物车总数
   * 数据按时保存的时间重新排序
   */
  public function cart(){
    if(empty($_SESSION['uid'])){
      // 未登陆 读取session数据展示
      $Product = M('Product');
      foreach ($_SESSION['cart'] as $key => $v) {
        $carCount += $v['number'];
        $Info = $Product->where(array('pid'=>$v['pid']))->field('title','price','water_img','stock')->find();
        $list[] = array_merge($Info, $v);  // 合并session和数据库查询的数据
      }
      session('cartCount', $carCount); // 统计购物车中商品数量

      $this->list = $this->arrSort($list,'add_time');
    }else{
      // 已登陆 读取数据库的数据展示
      $Cart = M('Cart');
      $uid = session('uid');
      
      if(!empty($_SESSION['cart'])){
        foreach ($_SESSION['cart'] as $v) {
          $number = $this->getNum(array('uid'=>$uid, 'pid'=>$v['pid']));
          // 要判断购物车是否已存在该商品 存在则更新数量 不存在则新增
          if(!empty($number)){
            // $error = '你的购物车已有'.$number.'件'."再增加".$good_nums.'件，库存不足.';
            $number += $v['number'];
            if($number > $this->getStock($v['pid'])){ // 确认库存状况
              // $this->error($error);
              continue; // 库存不足跳出循环 保留数据的数据
            }
            $data = array(
              'number' => $number,
              'add_time' => time(),
              );
            $re = $Cart->where(array('uid'=>$uid, 'pid'=>$v['pid']))->save($data);
          }else{
            // 查库存
            if($number > $this->getStock($pid)){ // 确认库存状况
              // $error = '库存只剩'.$this->getStock($pid).'件';
              // $this->error($error);
              continue; // 库存不足跳出循环
            }
            $data = array(
              'uid' => $uid,
              'pid' => $v['pid'],
              'number' => $v['number'],
              'add_time' => time(),
              );
            $Cart->add($data);
          }
        }
        session('cart',null); // 清除session数据
      }

      $list = $Cart->where(array('uid'=>$uid))->join('tp_product ON tp_cart.pid = tp_product.pid')->select();
      $cartCount = $Cart->where(array('uid'=>$uid))->sum('number'); // 统计购物车中商品数量
      session('cartCount', $cartCount); // 统计购物车中商品数量
      $this->list = $this->arrSort($list,'add_time');
    }
    $this->display();
  }

  /**
   * 未登陆 购物车中已存在的商品 session中修改已有的数量 超库存的提示并结束代码 小于等于0不执行
   * 未登陆 购物车中不存在的商品 添加数据到session 超库存的提示
   * 已登陆 将新增数据添加到数据库 超库存的提示并结束代码 小于等于0不执行
   */
  public function add(){
    $pid = I('pid','','intval');
    $good_nums = I('good_nums','','intval');
    if(empty($pid)){
      $this->error('参数错误');
    }
    if(empty(session('uid'))){  // 未登陆
      // 要判断是否已存在该商品 存在则更新数量 不存在则新增
      if(isset($_SESSION['cart']["$pid"])){
        $number = $this->getNum($pid); // 获取已添加的数量
        $error = '你的购物车已有'.$number.'件'."再增加".$good_nums.'件，库存不足.';
        $number += $good_nums;
        if($number > $this->getStock($pid)){ // 确认库存状况 
          $this->error($error);
          $this->ajaxReturn(0);
          exit;
        }elseif($number <= 0){
          $this->ajaxReturn(0);
          exit;
        }
        $_SESSION['cart']["$pid"]['number'] = $number;
        if(IS_AJAX){
          $this->ajaxReturn($number);
        }
      }else{
        $_SESSION['cart']["$pid"] = array(
            'pid' => $pid,
            'number' => $good_nums,
            'add_time' => time(),
          );
        if(IS_AJAX){
          $this->ajaxReturn(1); // js判断，动态更新头部购物车数据
        }
      }
    }else{   // 已登陆
      $uid = session('uid');
      $Cart = M('Cart');
      // 新增的商品添加到数据库
      $number = $this->getNum(array('uid'=>$uid, 'pid'=>$pid));
      // 要判断是否已存在该商品 存在则更新数量 不存在则新增
      if(!empty($number)){
        $number += $good_nums;
        if($number > $this->getStock($pid)){ // 确认库存状况
          $this->error($error);
          $this->ajaxReturn(0);
          exit;
        }elseif($number <= 0){
          $this->ajaxReturn(0);
          exit;
        }
        $data = array(
          'number' => $number,
          'add_time' => time(),
          );
        $re = $Cart->where(array('uid'=>$uid))->where(array('pid'=>$pid))->save($data);
        if(IS_AJAX){
          $this->ajaxReturn($number);
        }
      }else{
        if($number > $this->getStock($pid)){ // 确认库存状况
          $this->error($error);
        }
        $data = array(
          'uid' => $uid,
          'pid' => $pid,
          'number' => $good_nums,
          'add_time' => time(),
          );
        $re = $Cart->add($data);
        if($re>0){
          if(IS_AJAX){
            $this->ajaxReturn(1); // js判断，动态更新头部购物车数据
          }
        }
      }
    }
    redirect(U('Cart/cart')); // 跳转到购物车
  }

  /**
   * 未登陆则删除session中的对应元素
   * 已登陆则删除数据库中的数据
   * 删除后，重新定向到购物车页面
   */
  public function delInfo(){
    $pid = I('pid','','intval');
    if(empty(session('uid'))){
      if(empty($pid)){
        $this->error('参数错误');
      }
      unset($_SESSION['cart'][$pid]);
    }else{
      if(empty($pid)){
        $this->error('参数错误');
      }
      $Cart = M('Cart');
      $re = $Cart->where(array('pid'=>$pid,'uid'=>session('uid')))->delete();
    }
    redirect(U('Cart/cart')); // 跳转到购物车
  }

  /**
   * 获取当前用户指定产品在购物车中已有的数量
   * @param  str $target 传入字符串时，session中查找
   * @param  arr $target 传入数组时，数据库中查找
   * @return int         购物车中已有数量
   */
  private function getNum($target){
    $number = 0;
    if(empty($_SESSION['uid'])){
      if(isset($_SESSION['cart'][$target])){
        $number = $_SESSION['cart'][$target]['number'];
      }
    }elseif(is_array($target)){
      $check = M('Cart')->where($target)->find();
      $number = $check['number'];
    }
    return $number;
  }
  /**
   * 获取商品库存
   * @param  int $pid 商品id
   * @return int      商品库存数量
   */
  private function getStock($pid){
    $Product = M('Product');
    $Info = $Product->where(array('pid'=>$pid))->find();
    return $Info['stock'];
  }
  /**
   * 数组排序
   * @param  arr $arr   排序的数组
   * @param  str $filed 排序的字段名
   * @return arr        排序后的数组
   */
  private function arrSort($arr, $filed){
    $arrSort = array();
    foreach ($arr as $key => $value) {
      foreach ($value as $k => $v) {
        $arrSort[$k][$key] = $v;
      }
    }
    array_multisort($arrSort[$filed], SORT_DESC, $arr);
    $temArr = array();
    foreach ($arr as $key => $value) {
      $temArr[$value['pid']] = $value;
    }
    return $temArr;
  }
}