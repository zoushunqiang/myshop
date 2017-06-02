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
      <div class="box_top"><b class="pl15">管理员信息</b></div>
      <div class="box_center">
        <form action="<?php echo U('System/doChange');?>" class="jqtransform" method="post">
         <table class="form_table pt15 pb15" width="100%" border="0" cellpadding="0" cellspacing="0">
           <tr>
            <td class="td_right">用户名：</td>
            <td class=""> 
              <input type="text" name="username" class="input-text lh30" size="40" value="<?php echo ($Info["username"]); ?>">
              <input type="hidden" name="uid" value="<?php echo ($Info["uid"]); ?>">
            </td>
          </tr>
          <tr>
            <td class="td_right">密码：</td>
            <td class=""> 
              <input type="text" name="password" class="input-text lh30" size="40" placeholder="不填写表示不修改密码" >
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
</body>
</html>