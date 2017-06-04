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
  <div class="container">
    <div id="button" class="mt10">
      <form action="<?php echo U('User/user');?>" method="get">
        <table width="100%" border="0">
          <tr>
            <td > 
              <input type="button" name="button" class="btn btn82 btn_add" value="新增" onclick="location.href='<?php echo U('System/info');?>'"></td>
              <td width="35%" >
              用户名 : <input type="text" name="search" class="input-text lh25" size="30" value="<?php echo ($_GET['search']); ?>" >   <input type="submit" name="button" class="btn btn82 btn_search" value="查询">
              </td>
            </tr>
          </tr>
        </table>
      </form>
    </div>
      <div id="table" class="mt10">
        <div class="box span10 oh">
          <table width="100%" border="0" cellpadding="0" cellspacing="0" class="list_table">
            <tr>
             <th width="150" >ID</th>
             <th >用户名</th>
             <th width="350">登陆次数</th>
             <th width="200">注册时间</th>            
             <th width="100">操作</th>
            </tr>
            <tbody id="list">
            <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
                <td><?php echo ($vo["uid"]); ?></td>
                <td><?php echo ($vo["username"]); ?></td>
                <td><?php echo ($vo["login_num"]); ?></td>
                <td><?php echo (date("Y-m-d H:i:s",$vo["reg_time"])); ?></td>
                <td>
                <a href="<?php echo U('System/info',array('uid'=>$vo[uid]),'');?>">修改</a>
                <a href="<?php echo U('System/delUser',array('uid'=>$vo[uid]),'');?>">删除</a>
                </td>
              </tr><?php endforeach; endif; else: echo "" ;endif; ?>
         </tbody>
       </table>
       <div class="page mt10">
        <div class="pagination">
          <?php echo ($header); ?>
          <?php echo ($page); ?>
        </div>
      </div>
    </div>
  </div>
</div> 
</body>
</html>