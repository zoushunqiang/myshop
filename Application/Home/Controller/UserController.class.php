<?php
namespace Home\Controller;
use Think\Controller;
class UserController extends Controller
{
  public function __construct(){
    parent::__construct();
    // 获取单页面列表
    $Contents = M('Contents');
    $content_list = $Contents->select();
    $this->assign('contents',$content_list);
  }
  // 用户注册
  public function reg(){
    $this->display(); // 载入模版 替换内容字符串 生成缓存 输出模版渲染
  }
  // 用户登录
  public function login(){
    $this->display();
  }
  // 用户注册验证
  public function regsave(){
    $User = D('User');
    if (!$User->create()){
      // 如果创建失败 表示验证没有通过 输出错误提示信息
      $this->error($User->geterror());
    }
    else{
      // 验证通过 可以进行其他数据操作
      $username = $User->username;
      $User->reg_ip = get_client_ip();
      $re = $User->add();
      $remember = I('remember');
      if(!empty($remember)){
        cookie('username',$username);
        cookie('login',$username);
      }
      session('username',$username);
      session('uid',$re);
      echo session('username');
      $this->success('注册成功',U('Index/index'),3);
    }
  }
  // 用户登录验证
  public function doLogin(){
    $login = D('User');
    if(!$login->create($_post,4)){
      $this->error($login->geterror());
    }else{
      $this->success('登陆成功',U('Index/index'),3);
    }
  }
  // 用户注销
  public function doLogout(){
    if(!empty(cookie('login'))) cookie('login',null);
    if(!empty(session('username'))) session('username',null);
    if(!empty(session('uid'))) session('uid',null);
    if(!empty(session('cartCount'))) session('cartCount',null);  // 清空购物车统计
    $this->redirect('Index/index');
  }
  // 生成验证码
  public function verify(){
    $config = array(
      'fontSize' => 18,
      'length'   => 4,
      'useNoise' => false,
      );
    $verify = new \Think\verify($config);
    return $verify->entry();
  }
}
