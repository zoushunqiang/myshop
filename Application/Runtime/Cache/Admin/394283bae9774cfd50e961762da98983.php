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
        $('#selectAll').click(function () {
                    //全选
                    var ss=$("#selectAll").prop('class');
					   if(ss=='btn btn82 btn_nochecked'){
						    $('#list :checkbox').prop('checked',true); 
							$("#selectAll").prop('class','btn btn82 btn_checked');
					   }else{
						    $('#list :checkbox').prop('checked',false); 
							$("#selectAll").prop('class','btn btn82 btn_nochecked');
					    }                 
            });
			
		  $('#selectdel').click(function () {
                    var valArr = new Array;
                    $('#list :checkbox[checked]').each(function (i) {
                        valArr[i] = $(this).val();
                    });
                    var vals = valArr.join(',');// 方法用于把数组中的所有元素放入一个字符串。//1,2,3
					 if(vals==''){
						   alert('请选择要删除的记录');
						   return;
						 }
                    alert(vals);
					return;
                    //AJAX提交到PHP中处理
                    $.ajax({
                        url: '',
                        type: 'post',
                        data: {'ids': vals},
                        dataType: 'text',
                        success: function (d) {
                            if (d == 1)  else if (d == 2)  else if (d == 3) 
                        }
                    });

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
  
    <td >    <input type="button" name="button2" class="btn btn82 btn_nochecked" value="全选" id="selectAll">
      <input type="button" name="button" class="btn btn82 btn_del" value="删除" id="selectdel">
      <input type="button" name="button" class="btn btn82 btn_add" value="新增"></td>
      
    <td width="35%">
     </td>
    
  </tr>
</table>


      
    </div>
    <div id="table" class="mt10">
  <div class="box span10 oh">
              <table width="100%" border="0" cellpadding="0" cellspacing="0" class="list_table">
                <tr>
                   <th width="40"></th>
                   <th width="150" >编号</th>
                   <th width="180">标题</th>
                   <th width="100">价格</th>
                    <th width="180">数量</th>
                   <th width="100">添加时间</th>
                  
                    <th>操作</th>
                    </tr>
                    <tbody id="list">
                    
                <tr class="tr">
                   <td class="td_center"><input type="checkbox" value="1"></td>
                   <td>100</td>
                   <td class="td_left">产品标题显示部分</td>
                   <td>288</td>
                     <td>100</td>
                <td>2016-11-11 12:51:20</td>
              
                <td>修改 删除</td>
                 </tr>
                 <tr class="tr">
                   <td class="td_center"><input type="checkbox" value="1"></td>
                   <td>100</td>
                   <td class="td_left">产品标题显示部分</td>
                   <td>288</td>
                     <td>100</td>
                <td>2016-11-11 12:51:20</td>
              
                <td>修改 删除</td>
                 </tr>
                 
                 <tr class="tr">
                   <td class="td_center"><input type="checkbox" value="1"></td>
                   <td>100</td>
                   <td class="td_left">产品标题显示部分</td>
                   <td>288</td>
                     <td>100</td>
                <td>2016-11-11 12:51:20</td>
              
                <td>修改 删除</td>
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