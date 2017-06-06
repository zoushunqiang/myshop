<?php
namespace Admin\Controller;
use Think\Controller;
class ProductController extends Controller
{
  // 产品管理
  public function product(){
    $Product = M("Product");
    $list = $Product->select();
    $this->assign('list', $list);
    $this->display();
  }
  // 添加或修改页面
  public function info(){
    // 若有传递参数，则进入修改页面，否则为添加页面
    if(IS_GET){
      $Product = M("Product");
      $Info = $Product->where(array('pid'=>I('pid','','intval')))->find();
      $this->assign('Info', $Info);
    }
    $this->display();
  }
  // 添加或修改处理
  public function doInfo(){
    $Product = M("Product");
    $pid = I('pid','','intval');
    $img = $_FILES['img'];
    
    $title = I('title');
    $is_new = I('is_new','','intval');
    $is_best = I('is_best','','intval');
    $is_hot = I('is_hot','','intval');
    $stock = I('stock','','intval');
    $price = I('price','','intval');
    $content = I('content');
    $data = array(
      'title' => $title,
      'is_new' => $is_new,
      'is_best' => $is_best,
      'is_hot' => $is_hot,
      'stock' => $stock,
      'price' => $price,
      'content' => $content,
      'add_time' => time(),
      );
    // 
    if((!empty($pid))&&($img['error']==4)){
      $re = $Product->where(array('pid'=>$pid))->save($data);
    }else{
      // 获取上传文件
      $upload = new \Think\Upload();
      // 上传文件参数设定
      $upload->exts = array('jpg', 'jpeg', 'png', 'gif');
      $upload->rootPath = '.';
      $upload->savePath = '/upload/product/';
      $info = $upload->uploadOne($img);

      if(!$info){
        $this->error($upload->getError());
      }

      // 缩略图 水印图
      $orgPath = $info['savepath'].$info['savename'];
      $pathArr = explode('.', $info['savename']);
      $thumbPath = $info['savepath'].$pathArr[0].'_thumb.'.$pathArr[1];
      $waterPath = $info['savepath'].$pathArr[0].'_water.'.$pathArr[1];

      $image = new \Think\Image();
      $image->open('.'.$orgPath)->thumb(160, 160 , 2)->save('.'.$thumbPath);
      $image->open('.'.$thumbPath)->text('Shop Buy','./Public/china.ttf', 18, '#eee', 5)->save('.'.$waterPath);
      // 保存文件路径
      $data['org_img'] = $orgPath;
      $data['thumb_img'] = $thumbPath;
      $data['water_img'] = $waterPath;

      if(empty($pid)){
        $re = $Product->add($data);
      }else{
        // 删除图片
        self::delImg($pid);
        $re = $Product->where(array('pid'=>$pid))->save($data);
      }
    }
    if($re>0){
      $this->success('操作成功');
    }else{
      $this->error('系统繁忙，请稍后再试');
    }
  }
  // 删除
  public function delInfo(){
    $Product = M('Product');
    if(IS_GET){
      $pid = I('get.pid','','intval');
    }elseif(IS_POST){
      $pid = I('post.pids');
    }
    // 删除图片
    self::delImg($pid);
    // 删除数据库数据
    $map['pid'] = array('IN',"$pid");
    $re = $Product->where($map)->delete();
    if(IS_GET){
      if($re>0){
        $this->success('操作成功');
      }else{
        $this->error('系统繁忙，请稍后再试');
      }
    }elseif(IS_POST){
      if($re>0){
        $this->ajaxReturn('1');
      }else{
        $this->ajaxReturn('2');
      }
    }
  }
  /**
   * 删除图片
   * @param  int $pid 整形数据，用于删除一条
   * @param  str $pid 逗号隔开的字符串，用于删除多条例如：“1,2,3”
   * @return [type]      [description]
   */
  private function delImg($pid){
    $Product = M('Product');
    $root = dirname(dirname(dirname(dirname(__FILE__))));
    if(is_int($pid)){
      $Info = $Product->where(array('pid'=>$pid))->find();
      unlink($root.$Info['org_img']);
      unlink($root.$Info['thumb_img']);
      unlink($root.$Info['water_img']);
      
    }elseif(is_string($pid)){
      $arr = explode(',', $pid);
      foreach ($arr as $value) {
        $Info = $Product->where(array('pid'=>$value))->find();
        unlink($root.$Info['org_img']);
        unlink($root.$Info['thumb_img']);
        unlink($root.$Info['water_img']);
      }
    }
  }
}