/**
 * 购物车 页面自定义JS
 * wll-2013/03/29
 */
jQuery(function(){
	/* 购物车商品加减 */
	jQuery(".this_good_nums").goodnums({zid:'good_zongjia',xclass:'good_xiaojis',max:5,min:1,typ:'+'});
	/* 删除购物车商品 */
	jQuery(".shop_good_delete").goodDelete({zid:'good_zongjia',xclass:'good_xiaojis'});
});

// 计算金额小计 总计
function count(){
  var sumAll = 0;
  for (var i = 0; i < $('tr .good_nums').length; i++) {
    var num = parseFloat($('tr .good_nums').eq(i).val());
    var price = parseFloat($('tr #danjia_001').eq(i).html());
    var sum = num*price;
    sumAll += sum;
    $('tr .good_xiaojis').eq(i).html(sum.toFixed(2));
  }
  $('#good_zongjia').html(sumAll.toFixed(2));
}