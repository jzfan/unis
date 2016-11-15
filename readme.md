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
* 完成订单   method:get uri: /wechat/ajax/order/completed
* 未完成订单  method:get uri: /wechat/ajax/order/uncompleted

###意见反馈
* 提交  method:post uri: /api/report?openid=oLn0awp7W5-J6qEeamsACqC9BCeE

###用户信息
*  method:get  uri: /wechat/user
*  method:get  uri: /wechat/wx_user

* 最后一个用户信息  method:get  uri: /api/user/last
*  删除最后一个用户 method:get  uri: /api/user/delete

*  绑定用户  method:post  uri: /api/user
增加表单参数
'name' => $request->nickname, 
'avatar' => $request->avatar,
'wechat_openid' => $request->id,
'email' => $request->email,
'phone' => (string)$request->phone,

###用户地址
* 新建地址 method:post     uri: /api/address/?openid=xxxx
* 删除地址 method:delete   uri: /api/address/{address_id}?openid=xxxx
* 更新地址 method:put      uri: /api/address/{address_id}?openid=xxxx
* 取默认地址 method:get    uri: /api/address/default?openid=xxx

###订单
*取订单列表          method:get      uri: /api/order?openid=oLn0awp7W5-J6qEeamsACqC9BCeE


| 接口       | method   | uri                            | 成功返回 | 错误返回 | 失败返回 |   |
| -----------|:--------:| :----------------------------: |:--------:| --------:|:--------:| -----:|
| 加入购物车 | get      | /wechat/cart/add/{food_id}            | success  | error    | failed   | |
| 取消购物车 | get      | /wechat/cart/cancle/{food_id}            | success  | error    | failed   |    |
| 加入收藏   | get      | /wechat/favorite/add/{food_id}            | success  | error    | failed   |     |
| 取消收藏   | get      | /wechat/favorite/cancle/{food_id}            | success  | error    | failed   |     |
| 食堂菜品   | get      | /api/foods_of_canteen/{canteen_id}    |    |      |     |     |

