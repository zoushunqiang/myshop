<?php
namespace Home\Controller;
use Think\Controller;
class TestController extends Controller
{
  public function test(){ // 0526
    echo '<pre>';
    // 连接数据库 
    $User = M('User');  // User表示去除前缀的表名，首字母大写为书写规范／ 同：$User = new \Think\Model('User');
    // 查询数据库
    //var_dump($User->select()); // 查询所有
    var_dump($User->field('uid,username')->where(array('uid'=>'1'))->select()); // 条件查询指定字段

    // 添加
    $data = array(  // 数组的方式保存需要添加的值
      'username'=>'zousq3',
      'password'=>md5(123456),
      'reg_time'=>time()
      );
    // echo $User->data($data)->add();  // 返回值为自增长字段的值

    // 修改
    $data2 = array(  // 数组的方式保存需要添加的值
      'username'=>'zousq2',
      'reg_time'=>time()
      );
    //echo $User->where('uid=2')->save($data2);  // 修改一定要加条件，没有条件不执行

    // 删除
    // echo $User->where(array('uid'=>3))->delete();  // 删除一定要加条件，没有条件不执行


    echo 'test';
    echo '</pre>';
  }
}