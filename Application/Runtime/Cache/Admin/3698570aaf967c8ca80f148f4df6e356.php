<?php if (!defined('THINK_PATH')) exit();?> <!doctype html>
 <html lang="zh-CN">
 <head>
   <meta charset="UTF-8">
   <link rel="stylesheet" href="/Public/Admin/css/common.css">
   <link rel="stylesheet" href="/Public/Admin/css/main.css">
   <script type="text/javascript" src="/Public/Admin/js/jquery.min.js"></script>
   <script type="text/javascript" src="/Public/Admin/js/colResizable-1.3.min.js"></script>
   <script type="text/javascript" src="/Public/Admin/js/common.js"></script>
   <script type="text/javascript" charset="utf-8" src="/Public/Ueditor/ueditor.config.js"></script>
   <script type="text/javascript" charset="utf-8" src="/Public/Ueditor/ueditor.all.min.js"> </script>
   <script type="text/javascript" charset="utf-8" src="/Public/Ueditor/lang/zh-cn/zh-cn.js"></script>
   
   <script type="text/javascript">
    $(function(){  
      $(".list_table").colResizable({
        liveDrag:true,
        gripInnerHtml:"<div class='grip'></div>", 
        draggingClass:"dragging", 
        minWidth:30
      }); 

    }); 
  </script>
  <title>Document</title>
</head>
<body>
  <div id="forms" class="mt10">
    <div class="box">
      <div class="box_border">
        <div class="box_top"><b class="pl15">单页面</b></div>
        <div class="box_center">
          <form action="<?php echo U('Product/doInfo');?>" class="jqtransform" method="post" enctype="multipart/form-data" >
            <table class="form_table pt15 pb15" width="100%" border="0" cellpadding="0" cellspacing="0">
              <tr>
                <td class="td_right">标题：</td>
                <td class=""> 
                  <input type="text" name="title" class="input-text lh30" size="40" value="<?php echo ($Info["title"]); ?>">
                  <input type="hidden" name="pid" value="<?php echo ($Info["pid"]); ?>">
                </td>
              </tr>
              <tr>
                <td class="td_right">价格：</td>
                <td class=""> 
                  <input type="text" name="price" class="input-text lh30" size="40" value="<?php echo ($Info["price"]); ?>">
                </td>
              </tr>
              <tr>
                <td class="td_right">库存：</td>
                <td class=""> 
                  <input type="text" name="stock" class="input-text lh30" size="40" value="<?php echo ($Info["stock"]); ?>">
                </td>
              </tr>
              <tr>
                <td class="td_right">推荐：</td>
                <td class="">
                  <input type="checkbox" name="is_new" value="1" <?php if(($Info['is_new']) == "1"): ?>checked<?php endif; ?> > 新品
                  <input type="checkbox" name="is_best" value="1" <?php if(($Info['is_best']) == "1"): ?>checked<?php endif; ?> > 精品
                  <input type="checkbox" name="is_hot" value="1" <?php if(($Info['is_hot']) == "1"): ?>checked<?php endif; ?> > 热销
                </td>
              </tr>
              <tr>
                <td class="td_right">产品图：</td>
                <td class=""><input type="file" name="img" class="input-text lh30" size="10"></td>
              </tr>
              <tr>
                <td class="td_right">文本框：</td>
                <td class="">
                <textarea name="content" id="content" cols="30" rows="10" style="width:90%;height:300px" ><?php echo ($Info["content"]); ?></textarea>
                </td>
              </tr>
              <td class="td_right">&nbsp;</td>
              <td class="">
                <input type="submit" name="button" class="btn btn82 btn_save2" value="保存"> 
                <input type="reset" name="reset" class="btn btn82 btn_res" value="重置"> 
              </td>
            </tr>
          </table>
        </form>
      </div>
    </div>
  </div>
</div>
</div> 
<script type="text/javascript">
    //实例化编辑器
    //建议使用工厂方法getEditor创建和引用编辑器实例，如果在某个闭包下引用该编辑器，直接调用UE.getEditor('editor')就能拿到相关的实例
    var ue = UE.getEditor('content');
  </script>
</body>
</html>