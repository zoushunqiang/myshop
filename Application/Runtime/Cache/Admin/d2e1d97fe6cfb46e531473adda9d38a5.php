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
       // alert(vals);
          //AJAX提交到PHP中处理
          $.ajax({
            url: "<?php echo U('Product/delInfo',array('pid'=>$vo[pid]),'');?>",
            type: 'post',
            data: {'pids': vals},
            dataType: 'text',
            success: function (d) {
              if (d == 1) {
              //删除成功
                window.location.reload();//刷新当前页 
              } else if (d == 2) {
              //删除失败
                alert('删除失败');
              } else if (d == 3){
              //未登录
                window.location.href = 'login.html'
              }
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
            <input type="button" name="button" class="btn btn82 btn_add" value="新增" onclick="location.href='<?php echo U('Product/info');?>' " ></td>
            <td width="35%">
            </td>
          </tr>
        </table>
      </div>
      <div id="table" class="mt10">
        <div class="box span10 oh">
          <table width="100%" border="0" cellpadding="0" cellspacing="0" class="list_table">
            <tr>
              <th width="50"></th>
              <th width="50" >编号</th>
              <th >标题</th>
              
              <th width="80">产品图</th>
              <th width="50">价格</th>
              <th width="50">精品</th>
              <th width="50">新品</th>
              <th width="50">热销</th>
              <th width="50">库存</th>
              <th width="180">添加时间</th>
              <th width="80">操作</th>
            </tr>
            <tbody id="list">
              <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr class="tr">
                  <td class="td_center" style="width:30px"><input type="checkbox" value="<?php echo ($vo["pid"]); ?>"></td>
                  <td><?php echo ($vo["pid"]); ?></td>
                  <td class="td_left"><?php echo ($vo["title"]); ?></td>
                  
                  <td><img src="<?php echo ($vo["water_img"]); ?>" alt="" height='80' ></td>
                  <td><?php echo ($vo["price"]); ?></td>
                  <td><?php echo ($vo["is_best"]); ?></td>
                  <td><?php echo ($vo["is_new"]); ?></td>
                  <td><?php echo ($vo["is_hot"]); ?></td>
                  <td><?php echo ($vo["stock"]); ?></td>
                  <td><?php echo (date("Y-m-d H:i:s",$vo["add_time"])); ?></td>
                  <td>
                    <a href="<?php echo U('Product/info',array('pid'=>$vo[pid]),'');?>">修改</a>
                    <a href="<?php echo U('Product/delInfo',array('pid'=>$vo[pid]),'');?>">删除</a>
                  </td>
                </tr><?php endforeach; endif; else: echo "" ;endif; ?>
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