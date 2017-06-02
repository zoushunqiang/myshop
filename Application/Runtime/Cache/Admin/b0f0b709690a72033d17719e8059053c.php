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
   <div class="main_top">
    <div class="main_left fl span6">
      <div class="box pr5">
        <div class="box_border">
          <div class="box_top">
            <div class="box_top_l fl"><b class="pl15">登录信息</b></div>

          </div>
          <div class="box_center">
            <p> <b><?php echo (session('admin_user')); ?>,欢迎使用信息管理系统</b>
              <a href="">帐号设置</a></p>
              <p>您上次登录的时间：<?php echo (date('Y-m-d H:i:s',$uerInfo["login_time"])); ?></p>
            </div>
          </div>
        </div>
      </div>
      <div class="main_right fr span4">

        <div class="box pl5">
          <div class="box_border">
            <div class="box_top">
              <div class="box_top_l fl"><b class="pl15">最新订单</b></div>
              <div class="box_top_r fr pr15"><a href="#" class="color307fb1">更多</a></div>
            </div>
            <div class="box_center">
              <ul class="newlist">
                <li><a href="#">上海自贸区今日正式挂牌成立</a><b>10-09</b></li>
                <li><a href="#">习近平将访东南亚两国 首次出席APEC峰会</a><b>10-08</b></li>
                <li><a href="#">最高法:谎称炸弹致航班备降者从重追刑责</a><b>10-09</b></li>
                <li><a href="#">华北大部遭遇雾霾天 北京全城陷重污染</a><b>10-06</b></li>
                <li><a href="#">"环保专家"董良杰涉嫌寻衅滋事被刑拘</a><b>10-05</b></li>
                <li><a href="#">中央巡视组：重庆对一把手监督不到位</a><b>10-04</b></li>
                <li><a href="#">囧!悍马没改好成华丽马车(图)</a><b>10-03</b></li>
              </ul>   </div>
            </div>
          </div>
        </div>
        <div class="clear"></div>
      </div>
      <div class="main_center">
        <div class="span3 fl pt10">
          <div class="box pr5">
            <div class="box_border">
             <div class="box_top">
              <div class="box_top_l fl"><b class="pl15">最新产品</b></div>
              <div class="box_top_r fr pr15"><a href="#" class="color307fb1">更多</a></div>
            </div>
            <div class="box_center">   <ul class="newlist">
              <li><a href="#">上海自贸区今日正式挂牌成立</a><b>10-09</b></li>
              <li><a href="#">习近平将访东南亚两国 首次出席APEC峰会</a><b>10-08</b></li>
              <li><a href="#">最高法:谎称炸弹致航班备降者从重追刑责</a><b>10-09</b></li>
              <li><a href="#">华北大部遭遇雾霾天 北京全城陷重污染</a><b>10-06</b></li>
              <li><a href="#">"环保专家"董良杰涉嫌寻衅滋事被刑拘</a><b>10-05</b></li>
              <li><a href="#">中央巡视组：重庆对一把手监督不到位</a><b>10-04</b></li>
              <li><a href="#">囧!悍马没改好成华丽马车(图)</a><b>10-03</b></li>
            </ul>   </div>
          </div>
        </div>
      </div>
      <div class="span3 fl pt10">
        <div class="box pl5">
          <div class="box_border">
            <div class="box_top">
              <div class="box_top_l fl"><b class="pl15">信息统计</b></div>
            </div>
            <div class="box_center tjb">
              <ul class="newlist">
                <li><i>会员数：</a></i>2535462</li>
                <li><i>产品数：</a></i>2315</li>
                <li><i>订单数：</a></i>1585</li>
              </ul>     
            </div>
          </div>
        </div>
      </div>
      <div class="clear"></div>
    </div>  
  </body>
  </html>