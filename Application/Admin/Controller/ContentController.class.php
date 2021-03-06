<?php
namespace Admin\Controller;
use Think\Controller;
class ContentController extends Controller
{
  public $Contents = '';
  public function __construct(){
    parent::__construct();
    if(empty(session('admin_user'))){
      $this->error('请先登陆',U('Login/login'));
    }
    $this->Contents = M('Contents');
  }
  // 单页面
  public function content(){
    $list = $this->Contents->select();
    $this->assign('list',$list);
    $this->display();
  }
  // 单页面修改或添加
  public function info(){
      $Info = $this->Contents->where(array('cat_id'=>I('get.cat_id','','intval')))->find();
      $this->assign('Info',$Info);
      $this->display();
  }
  // 单页面执行修改或添加
  public function doChange(){
    $data = array(
        'title'=>I('post.title'),
        'cat_name'=>I('post.cat_name'),
        'content'=>I('post.content'),
        'add_time'=>time(),
        );
    // cat_id 为空则执行添加，有值则执行修改
    if(empty(I('post.cat_id'))){
      $re = $this->Contents->add($data);
    }else{
      $re = $this->Contents->where(array('cat_id'=>I('post.cat_id','','intval')))->save($data);
    }
    if($re>0){
      $this->success('操作成功');
    }else{
      $this->error('系统繁忙，请稍后再试');
    }
  }
  // banner
  public function banner(){
    $Banner = M('Banner');
    $list = $Banner->select();
    $this->assign('list',$list);
    $this->display();
  }
  public function bannerinfo(){
    $Banner = M('Banner');
    $b_id = I('b_id','','intval');
    $banInfo = $Banner->where(array('b_id'=>$b_id))->find();
    $this->assign('banInfo',$banInfo);
    $this->display();
  }
  // banner添加或修改
  public function doBanner(){
    $Banner = M('Banner');
    $title = I('title');
    $b_id = I('b_id','','intval');
    // echo $b_id;exit;
    $img = $_FILES['img'];
    // 若为修改 同时未上传图片则不做处理图片
    if(($img['error']==4) && (!empty($b_id))){
      $data = array(
      'title'=>$title,
      'add_time'=>time(),
      );
      $re = $Banner->where(array('b_id'=>$b_id))->save($data);
    }else{
      // 上传图片
      $upload = new \THink\Upload();
      // $upload->maxSize = 314578;
      $upload->exts = array('jpg','jpeg','png','gif');
      $upload->rootPath = '.';
      $upload->savePath = '/upload/banner/';
      $info = $upload->uploadOne($img);
      if(!$info){
        $this->error($upload->getError());
      }
      // 缩略图 和 水印图
      $orgPath = $info['savepath'].$info['savename'];
      $pathArr = explode('.', $info['savename']);
      $thumbPath = $info['savepath'].$pathArr[0].'_thumb.'.$pathArr[1];
      $waterPath = $info['savepath'].$pathArr[0].'_water.'.$pathArr[1];
      
      $image = new \Think\Image();
      
      $image->open('.'.$orgPath)->thumb(1000, 310,\Think\Image::IMAGE_THUMB_CENTER)->save('.'.$thumbPath);
      $image->open('.'.$thumbPath)->text('ZouSq','./Public/china.ttf',20,'#000',\Think\Image::IMAGE_WATER_SOUTHEAST)->save('.'.$waterPath);
      $data = array(
        'title'=>$title,
        'org_img'=>$orgPath,
        'thumb_img'=>$thumbPath,
        'water_img'=>$waterPath,
        'add_time'=>time(),
        );
      // 判定是修改，还是新增
      if(!empty($b_id)){
        // 删除旧图片
        $Info = $Banner->where(array('b_id'=>$b_id))->find();
        $root = dirname(dirname(dirname(dirname(__FILE__))));
        unlink($root.$Info['org_img']);
        unlink($root.$Info['thumb_img']);
        unlink($root.$Info['water_img']);
        // 修改数据
        $re = $Banner->where(array('b_id'=>$b_id))->data($data)->save();
      }else{
        $re = $Banner->data($data)->add();
      }
    }
    if($re>0){
      $this->success("操作成功");
    }else{
      $this->error('系统繁忙');
    }
  }
  public function delBanner(){
    $Banner = M('Banner');
    $b_id = I('b_id','','intval');
    // 删除图片
    $Info = $Banner->where(array('b_id'=>$b_id))->find();
    $root = dirname(dirname(dirname(dirname(__FILE__))));
    unlink($root.$Info['org_img']);
    unlink($root.$Info['thumb_img']);
    unlink($root.$Info['water_img']);
    // 删除数据库数据
    $re = $Banner->where(array('b_id'=>$b_id))->delete();
    if($re>0){
      $this->success('操作成功');
    }else{
      $this->error('系统繁忙，请稍后再试');
    }
  }
}
