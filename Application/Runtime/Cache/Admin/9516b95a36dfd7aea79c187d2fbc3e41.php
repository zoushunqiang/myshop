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
      <table width="100%" border="0">
        <tr>
          <td > 
            <input type="button" name="button" class="btn btn82 btn_add" value="新增" onclick="location.href='<?php echo U('Content/info');?>'"></td>
            <td width="35%" >
            </td>
          </tr>
        </table>
      </div>
      <div id="table" class="mt10">
        <div class="box span10 oh">
          <table width="100%" border="0" cellpadding="0" cellspacing="0" class="list_table">
            <tr>
             <th width="150" >ID</th>
             <th width="150" >分类</th>
             <th width="250">标题</th>
             <th width="280">添加时间</th>
             <th>操作</th>
           </tr>
            <tbody id="list">
              <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
                  <td><?php echo ($vo["cat_id"]); ?></td>
                  <td><?php echo ($vo["cat_name"]); ?></td>
                  <td><?php echo ($vo["title"]); ?></td>
                  <td><?php echo (date('Y-m-d',$vo["add_time"])); ?></td>
                  <td>
                    <a href="<?php echo U('Content/info',array('cat_id'=>$vo[cat_id]),'');?>">修改</a>
                    <a href="<?php echo U('Content/delete');?>">删除</a>
                  </td>
                </tr><?php endforeach; endif; else: echo "" ;endif; ?>
            </tbody>
          </table>
     </div>
   </div>
 </div> 
</body>
</html>