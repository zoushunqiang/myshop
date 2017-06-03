<?php if (!defined('THINK_PATH')) exit();?> <!doctype html>
 <html lang="zh-CN">
 <head>
   <meta charset="UTF-8">
   <link rel="stylesheet" href="/Public/Admin/css/common.css">
   <link rel="stylesheet" href="/Public/Admin/css/main.css">
   <script type="text/javascript" src="/Public/Admin/js/jquery.min.js"></script>
   <script type="text/javascript" src="/Public/Admin/js/colResizable-1.3.min.js"></script>
   <script type="text/javascript" src="/Public/Admin/js/common.js"></script>
   
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
        <div class="box_top"><b class="pl15">banner轮播图</b></div>
        <div class="box_center">
          <form action="<?php echo U('Content/doBanner');?>" class="jqtransform" method="post" enctype="multipart/form-data">
            <table class="form_table pt15 pb15" width="100%" border="0" cellpadding="0" cellspacing="0">
              <tr>
                <td class="td_right">标题：</td>
                <td class=""> 
                  <input type="text" name="title" class="input-text lh30" size="40" value="<?php echo ($banInfo["title"]); ?>">
                  <input type="hidden" name="banner_id" value="<?php echo ($banInfo["banner_id"]); ?>">
                </td>
              </tr>
              <tr>
                <td class="td_right">文件：</td>
                <td class=""><input type="file" name="img" class="input-text lh30" size="10"></td>
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
</body>
</html>