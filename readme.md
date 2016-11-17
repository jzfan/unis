##接口文档

###购物车
* 加入购物车  method:get uri: /wechat/cart/add/{food_id}
* 取消购物车  method:get uri: /wechat/cart/cancle/{food_id}
* 购物车列表  method:get uri: /wechat/ajax/cart

###收藏
* 加入收藏  method:get uri: /wechat/favorite/add/{food_id}
* 取消收藏  method:get uri: /wechat/favorite/cancle/{food_id}

###我的订单
* 所有订单   method:get uri: /wechat/ajax/order
* 买方完成订单   method:get uri: /wechat/ajax/order/completed_buy
* 卖方完成订单   method:get uri: /wechat/ajax/order/completed_sale
* 买方未完成订单   method:get uri: /wechat/ajax/order/uncompleted_buy
* 卖方未完成订单   method:get uri: /wechat/ajax/order/uncompleted_sale
* 没人接单的（排除自己）   method:get uri: /wechat/ajax/order/untaken


###意见反馈
* 提交  method:post uri: /api/report?openid=xxxx
* 我的消息  method:get uri: /api/feed?openid=xxx

###用户信息
*  method:get  uri: /wechat/user
*  method:get  uri: /wechat/wx_user
* 取余额     method:get     uri: /user/balance?openid=xxx

*  最后一个用户信息  method:get  uri: /api/user/last
*  删除最后一个用户 method:get  uri: /api/user/delete

*  绑定用户  method:post  uri: /api/user

###用户地址
* 新建地址 method:post     uri: /api/address/?openid=xxxx
* 删除地址 method:delete   uri: /api/address/{address_id}?openid=xxxx
* 更新地址 method:put      uri: /api/address/{address_id}?openid=xxxx
* 取默认地址 method:get    uri: /api/address/default?openid=xxx
* 取所有地址 method:get    uri: /api/address?openid=xxx
* 取默认地址数组 method:get    uri: /api/address/me?openid=xxx



###订单
* 取订单列表        method:get      uri: /api/order?openid=xxxx
* 接单             method:get        uri: /api/order/taken/{order_no}

* 确认送达  method:get uri: /api/order/delivered/{order_no}?openid=xxxx
* 确认收到  method:get uri: /api/order/received/{order_no}?openid=xxxx
* 确认付款  method:get uri: /wechat/paid/{order_no}
* 点击付款  method:get  uri: /wechat/paid?shop_id=1&food[]=1&food[]=2

* 订单详情  method:get  uri: /api/order/show/{order_no}


###食品
* 取窗口食品列表   method:get     uri:/api/food_of_shop/{shop_id}
* 食品窗口列表     method:get     uri:/api/shops_of_canteen/{canteen_id}

###校区
* 取所有食堂  method:get    uri: /wechat/ajax/index_data
* 取所有校区  method:get    uri: /api/campuses_of_school/{school_id}
* 取所有食堂  method:get    uri: /api/canteens_of_campus/{campus_id}
* 取所有窗口  method:get    uri: /api/shops_of_canteen/{canteen_id}
* 取宿舍校区  method:get    uri: /api/campus/query_by_dorm/{dorm_id}
* 取校区宿舍  method:get    uri: /api/dorms_of_campus/{campus_id}



| 接口       | method   | uri                            | 成功返回 | 错误返回 | 失败返回 |   |
| -----------|:--------:| :----------------------------: |:--------:| --------:|:--------:| -----:|
| 加入购物车 | get      | /wechat/cart/add/{food_id}            | success  | error    | failed   | |
| 取消购物车 | get      | /wechat/cart/cancle/{food_id}            | success  | error    | failed   |    |
| 加入收藏   | get      | /wechat/favorite/add/{food_id}            | success  | error    | failed   |     |
| 取消收藏   | get      | /wechat/favorite/cancle/{food_id}            | success  | error    | failed   |     |
| 食堂菜品   | get      | /api/foods_of_canteen/{canteen_id}    |    |      |     |     |

