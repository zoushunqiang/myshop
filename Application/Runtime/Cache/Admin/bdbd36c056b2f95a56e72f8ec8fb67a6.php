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
                            if (d == 1)  else if (d == 2)  else if 
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
            <input type="button" name="button" class="btn btn82 btn_del" value="删除" id="selectdel"></td>
            
            <td width="35%">
              订单号 : <input type="text" name="name" class="input-text lh25" size="30">   <input type="submit" name="button" class="btn btn82 btn_search" value="查询">   </td>
              
            </tr>
          </table>


          
        </div>
        <div id="table" class="mt10">
          <div class="box span10 oh">
            <table width="100%" border="0" cellpadding="0" cellspacing="0" class="list_table">
              <tr>
               <th width="40"></th>
               <th width="150" >订单号</th>
               <th width="100">下单人</th>
               <th width="100">总金额</th>
               <th width="100">下单时间</th>
               <th width="180">状态</th>
               <th>操作</th>
             </tr>
             <tbody id="list">
              
              <tr class="tr">
               <td class="td_center"><input type="checkbox" value="1"></td>
               <td>201611111250123</td>
               <td class="td_left">张三 13245678944<br>安徽省合肥市高新区科学大道5F</td>
               <td>288</td>
               <td>2016-11-11 12:51:20</td>
               <td>未支付</td>
               <td><a href="order_info.html">查看订单</a></td>
             </tr>
             
             <tr class="tr">
               <td class="td_center"><input type="checkbox" value="1"></td>
               <td>201611111250123</td>
               <td class="td_left">张三 13245678944<br>安徽省合肥市高新区科学大道5F</td>
               <td>288</td>
               <td>2016-11-11 12:51:20</td>
               <td>未支付</td>
               <td>查看订单</td>
             </tr>
             
             
             <tr class="tr">
               <td class="td_center"><input type="checkbox" value="1"></td>
               <td>201611111250123</td>
               <td class="td_left">张三 13245678944<br>安徽省合肥市高新区科学大道5F</td>
               <td>288</td>
               <td>2016-11-11 12:51:20</td>
               <td>未支付</td>
               <td>查看订单</td>
             </tr>
             
             
             
             <tr class="tr">
               <td class="td_center"><input type="checkbox" value="1"></td>
               <td>201611111250123</td>
               <td class="td_left">张三 13245678944<br>安徽省合肥市高新区科学大道5F</td>
               <td>288</td>
               <td>2016-11-11 12:51:20</td>
               <td>未支付</td>
               <td>查看订单</td>
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