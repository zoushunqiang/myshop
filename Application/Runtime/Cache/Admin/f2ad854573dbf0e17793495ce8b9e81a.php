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
  
    <td >  </td>
      
    <td width="35%">
    用户名 : <input type="text" name="name" class="input-text lh25" size="30">   <input type="submit" name="button" class="btn btn82 btn_search" value="查询">   </td>
    
  </tr>
</table>


      
    </div>
    <div id="table" class="mt10">
  <div class="box span10 oh">
              <table width="100%" border="0" cellpadding="0" cellspacing="0" class="list_table">
                <tr>
                
                   <th width="150" >ID</th>
                   <th width="180">用户名</th>
                   <th width="350">收货信息</th>
                   <th width="200">注册时间</th>            
                    <th>操作</th>
                    </tr>
                    <tbody id="list">
                    
                <tr class="tr">
                  
                   <td>100</td>
                   <td >user1</td>
                     <td class="td_left">张三 13245678944<br>安徽省合肥市高新区科学大道5F</td>
                <td>2016-11-11 12:51:20</td>
            
                <td>修改  删除</td>
                 </tr>
                 
                                    <tr class="tr">
                  
                   <td>100</td>
                   <td >user1</td>
                     <td class="td_left">张三 13245678944<br>安徽省合肥市高新区科学大道5F</td>
                <td>2016-11-11 12:51:20</td>
            
                <td>修改  删除</td>
                 </tr>
                 
                    <tr class="tr">
                  
                   <td>100</td>
                   <td >user1</td>
                     <td class="td_left">张三 13245678944<br>安徽省合肥市高新区科学大道5F</td>
                <td>2016-11-11 12:51:20</td>
            
                <td>修改  删除</td>
                 </tr>
                 
                 
              </tbody>
              </table>
              <div class="page mt10">
                <div class="pagination">
                  <ul>
                      <li class="first-child"><a href="#">首页</a></li>
                      <li class="disabled"><span>上一页</span></li>
                      <li class="active"><span>1</span></li>
                      <li><a href="#">2</a></li>
                      <li><a href="#">下一页</a></li>
                      <li class="last-child"><a href="#">末页</a></li>
                  </ul>
                </div>

              </div>
        </div>
     </div>
  </div> 
 </body>
 </html>