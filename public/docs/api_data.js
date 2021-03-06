define({ "api": [
  {
    "type": "delete",
    "url": "/address/{address_id}",
    "title": "删除地址",
    "version": "1.0.0",
    "name": "deleteAddress",
    "group": "Address",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "openid",
            "description": "<p>微信用户openid</p>"
          }
        ]
      }
    },
    "error": {
      "examples": [
        {
          "title": "404 地址未找到:",
          "content": "HTTP/1.1 404 Not Found\n{\n   \"error\": \"Address Not Found\"\n}",
          "type": "json"
        },
        {
          "title": "403 禁止删除默认地址:",
          "content": "HTTP/1.1 403 Forbidden\n{\n   \"error\": \"Can Not Delete Default Address\"\n}",
          "type": "json"
        }
      ]
    },
    "filename": "app/Http/Controllers/Api/V1/AddressController.php",
    "groupTitle": "Address",
    "success": {
      "examples": [
        {
          "title": "成功返回:",
          "content": "HTTP/1.1 200 OK\n\t  success",
          "type": "json"
        }
      ]
    }
  },
  {
    "type": "get",
    "url": "/address",
    "title": "取该用户所有地址",
    "version": "1.0.0",
    "name": "getAddress",
    "group": "Address",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "openid",
            "description": "<p>微信用户openid</p>"
          }
        ]
      }
    },
    "success": {
      "examples": [
        {
          "title": "成功返回:",
          "content": "HTTP/1.1 200 OK\n [\n   {\n     \"text\": \"江汉大学北区南1宿舍11\",\n     \"id\": 1,\n     \"school_id\": 2,\n     \"campus_id\": 4,\n     \"dorm_id\": 1,\n     \"room_number\": \"11\",\n     \"status\": \"1\"\n   }\n ]",
          "type": "json"
        }
      ]
    },
    "filename": "app/Http/Controllers/Api/V1/AddressController.php",
    "groupTitle": "Address",
    "error": {
      "fields": {
        "Error 4xx": [
          {
            "group": "Error 4xx",
            "optional": false,
            "field": "UserNotFound",
            "description": "<p>这个<code>openid</code> 的用户未找到.</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "404 用户未找到:",
          "content": "HTTP/1.1 404 Not Found\n{\n   \"message\": \"User Not Found.\",\n   \"status_code\": 404\n}",
          "type": "json"
        }
      ]
    }
  },
  {
    "type": "get",
    "url": "/address/default",
    "title": "取该用户默认地址文本字符",
    "version": "1.0.0",
    "name": "getDefault",
    "group": "Address",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "openid",
            "description": "<p>微信用户openid</p>"
          }
        ]
      }
    },
    "success": {
      "examples": [
        {
          "title": "成功返回:",
          "content": "HTTP/1.1 200 OK\n江汉大学北区南1宿舍11",
          "type": "json"
        }
      ]
    },
    "filename": "app/Http/Controllers/Api/V1/AddressController.php",
    "groupTitle": "Address",
    "error": {
      "fields": {
        "Error 4xx": [
          {
            "group": "Error 4xx",
            "optional": false,
            "field": "UserNotFound",
            "description": "<p>这个<code>openid</code> 的用户未找到.</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "404 用户未找到:",
          "content": "HTTP/1.1 404 Not Found\n{\n   \"message\": \"User Not Found.\",\n   \"status_code\": 404\n}",
          "type": "json"
        }
      ]
    }
  },
  {
    "type": "get",
    "url": "/address/me",
    "title": "取该用户默认地址数组",
    "version": "1.0.0",
    "name": "getDefaultArr",
    "group": "Address",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "openid",
            "description": "<p>微信用户openid</p>"
          }
        ]
      }
    },
    "success": {
      "examples": [
        {
          "title": "成功返回:",
          "content": "HTTP/1.1 200 OK\n{\n          \"address\": {\n            \"id\": 1,\n            \"user_id\": 2,\n            \"school_id\": 2,\n            \"campus_id\": 4,\n            \"dorm_id\": 1,\n            \"room_number\": \"11\",\n            \"mark\": null,\n            \"status\": \"1\",\n            \"created_at\": \"2016-11-16 17:53:58\",\n            \"updated_at\": \"2016-11-16 17:53:58\"\n          }\n        }",
          "type": "json"
        }
      ]
    },
    "filename": "app/Http/Controllers/Api/V1/AddressController.php",
    "groupTitle": "Address",
    "error": {
      "fields": {
        "Error 4xx": [
          {
            "group": "Error 4xx",
            "optional": false,
            "field": "UserNotFound",
            "description": "<p>这个<code>openid</code> 的用户未找到.</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "404 用户未找到:",
          "content": "HTTP/1.1 404 Not Found\n{\n   \"message\": \"User Not Found.\",\n   \"status_code\": 404\n}",
          "type": "json"
        }
      ]
    }
  },
  {
    "type": "post",
    "url": "/address",
    "title": "新建地址保存",
    "version": "1.0.0",
    "name": "postAddress",
    "group": "Address",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "openid",
            "description": "<p>微信用户openid</p>"
          },
          {
            "group": "Parameter",
            "type": "Number",
            "optional": false,
            "field": "school_id",
            "description": "<p>学校id</p>"
          },
          {
            "group": "Parameter",
            "type": "Number",
            "optional": false,
            "field": "campus_id",
            "description": "<p>校区id</p>"
          },
          {
            "group": "Parameter",
            "type": "Number",
            "optional": false,
            "field": "dorm_id",
            "description": "<p>宿舍id</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "room_number",
            "description": "<p>房间号</p>"
          }
        ]
      }
    },
    "filename": "app/Http/Controllers/Api/V1/AddressController.php",
    "groupTitle": "Address",
    "success": {
      "examples": [
        {
          "title": "成功返回:",
          "content": "HTTP/1.1 200 OK\n\t  success",
          "type": "json"
        }
      ]
    },
    "error": {
      "fields": {
        "Error 4xx": [
          {
            "group": "Error 4xx",
            "optional": false,
            "field": "UserNotFound",
            "description": "<p>这个<code>openid</code> 的用户未找到.</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "404 用户未找到:",
          "content": "HTTP/1.1 404 Not Found\n{\n   \"message\": \"User Not Found.\",\n   \"status_code\": 404\n}",
          "type": "json"
        }
      ]
    }
  },
  {
    "type": "put",
    "url": "/address/{address_id}",
    "title": "换默认地址",
    "version": "1.0.0",
    "name": "updateAddress",
    "group": "Address",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "openid",
            "description": "<p>微信用户openid</p>"
          },
          {
            "group": "Parameter",
            "type": "Number",
            "optional": false,
            "field": "address_id",
            "description": "<p>地址ID</p>"
          }
        ]
      }
    },
    "filename": "app/Http/Controllers/Api/V1/AddressController.php",
    "groupTitle": "Address",
    "success": {
      "examples": [
        {
          "title": "成功返回:",
          "content": "HTTP/1.1 200 OK\n\t  success",
          "type": "json"
        }
      ]
    },
    "error": {
      "fields": {
        "Error 4xx": [
          {
            "group": "Error 4xx",
            "optional": false,
            "field": "UserNotFound",
            "description": "<p>这个<code>openid</code> 的用户未找到.</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "404 用户未找到:",
          "content": "HTTP/1.1 404 Not Found\n{\n   \"message\": \"User Not Found.\",\n   \"status_code\": 404\n}",
          "type": "json"
        }
      ]
    }
  },
  {
    "type": "get",
    "url": "campuses_of_school/{school_id}",
    "title": "根据学校ID查询下属校区",
    "version": "1.0.0",
    "name": "queryBySchool",
    "group": "Campus",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "Number",
            "optional": false,
            "field": "school_id",
            "description": "<p>学校ID</p>"
          }
        ]
      }
    },
    "success": {
      "examples": [
        {
          "title": "成功返回:",
          "content": "HTTP/1.1 200 OK\n     [\n       {\n         \"id\": 18,\n         \"text\": \"corporis校区\"\n       },\n       {\n         \"id\": 17,\n         \"text\": \"dolore校区\"\n       }\n     ]",
          "type": "json"
        }
      ]
    },
    "filename": "app/Http/Controllers/Api/V1/CampusController.php",
    "groupTitle": "Campus"
  },
  {
    "type": "get",
    "url": "/canteens_of_campus/{campus_id}",
    "title": "根据校区取出食堂列表",
    "version": "1.0.0",
    "name": "listCanteensByCampus",
    "group": "Canteen",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "Number",
            "optional": false,
            "field": "campus_id",
            "description": "<p>校区ID</p>"
          }
        ]
      }
    },
    "success": {
      "examples": [
        {
          "title": "成功返回:",
          "content": "    HTTP/1.1 200 OK\n\t    [\n\t      {\n\t        \"id\": 17,\n\t        \"text\": \"tempora食堂\"\n\t      },\n\t      {\n\t        \"id\": 18,\n\t        \"text\": \"unde食堂\"\n\t      }\n\t    ]",
          "type": "json"
        }
      ]
    },
    "filename": "app/Http/Controllers/Api/V1/CanteenController.php",
    "groupTitle": "Canteen"
  },
  {
    "type": "get",
    "url": "/campus/query_by_dorm/{dorm_id}",
    "title": "根据宿舍查校区",
    "version": "1.0.0",
    "name": "getCampusByDorm",
    "group": "Dorm",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "Number",
            "optional": false,
            "field": "dorm_id",
            "description": "<p>宿舍ID</p>"
          }
        ]
      }
    },
    "success": {
      "examples": [
        {
          "title": "成功返回:",
          "content": "HTTP/1.1 200 OK\n    {\n      \"id\": 1,\n      \"school_id\": 1,\n      \"name\": \"culpa校区\",\n      \"address\": null,\n      \"x\": null,\n      \"y\": null,\n      \"geohash\": null,\n      \"status\": \"禁用\",\n      \"created_at\": \"2016-11-21 16:44:04\",\n      \"updated_at\": \"2016-11-21 16:44:04\"\n    }",
          "type": "json"
        }
      ]
    },
    "filename": "app/Http/Controllers/Api/V1/DormController.php",
    "groupTitle": "Dorm"
  },
  {
    "type": "get",
    "url": "/dorms_of_campus/{campus_id}",
    "title": "根据校区取出宿舍列表",
    "version": "1.0.0",
    "name": "listDormsByCampus",
    "group": "Dorm",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "Number",
            "optional": false,
            "field": "campus_id",
            "description": "<p>校区ID</p>"
          }
        ]
      }
    },
    "success": {
      "examples": [
        {
          "title": "成功返回:",
          "content": "    HTTP/1.1 200 OK\n\t    [\n\t      {\n\t        \"id\": 24,\n\t        \"text\": \"est宿舍\"\n\t      },\n\t      {\n\t        \"id\": 25,\n\t        \"text\": \"repellat宿舍\"\n\t      },\n\t      {\n\t        \"id\": 26,\n\t        \"text\": \"doloribus宿舍\"\n\t      }\n\t    ]",
          "type": "json"
        }
      ]
    },
    "filename": "app/Http/Controllers/Api/V1/DormController.php",
    "groupTitle": "Dorm"
  },
  {
    "type": "get",
    "url": "/foods_of_canteen/{canteen_id}",
    "title": "食堂食品分页",
    "version": "1.0.0",
    "name": "foodsPageByCanteen",
    "group": "Food",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "openid",
            "description": "<p>微信用户openid</p>"
          }
        ]
      }
    },
    "success": {
      "examples": [
        {
          "title": "成功返回:",
          "content": "HTTP/1.1 200 OK\n    {\n      \"data\": [\n        {\n          \"id\": 178,\n          \"name\": \"糯米栗子粥\",\n          \"price\": 7.5,\n          \"original_price\": \"8.0\",\n          \"img\": \"/uploads/food/1479312890ZC.jpg\",\n          \"sold\": 0\n        },\n        ......\n      ],\n      \"meta\": {\n        \"pagination\": {\n          \"total\": 31,\n          \"count\": 10,\n          \"per_page\": 10,\n          \"current_page\": 1,\n          \"total_pages\": 4,\n          \"links\": {\n            \"next\": \"http://un-sv.com/api/foods_of_canteen/2?page=2\"\n          }\n        }\n      }\n    }",
          "type": "json"
        }
      ]
    },
    "filename": "app/Http/Controllers/Api/V1/FoodController.php",
    "groupTitle": "Food"
  },
  {
    "type": "get",
    "url": "/food",
    "title": "食品分页列表",
    "version": "1.0.0",
    "name": "getFoodList",
    "group": "Food",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "openid",
            "description": "<p>微信用户openid</p>"
          },
          {
            "group": "Parameter",
            "type": "Number",
            "optional": false,
            "field": "page",
            "description": "<p>第几页</p>"
          },
          {
            "group": "Parameter",
            "type": "Number",
            "optional": false,
            "field": "limit",
            "description": "<p>每页多少条</p>"
          }
        ]
      }
    },
    "success": {
      "examples": [
        {
          "title": "成功返回:",
          "content": "HTTP/1.1 200 OK\n{\n  \"data\": [\n    {\n      \"id\": 3,\n      \"name\": \"expedita食品\",\n      \"price\": 9.5,\n      \"original_price\": \"13.5\",\n      \"img\": \"http://lorempixel.com/50/50/?44005\",\n      \"sold\": 2\n    }\n  ],\n  \"meta\": {\n    \"pagination\": {\n      \"total\": 3360,\n      \"count\": 1,\n      \"per_page\": 1,\n      \"current_page\": 3,\n      \"total_pages\": 3360,\n      \"links\": {\n        \"previous\": \"http://unis.com/api/food?page=2\",\n        \"next\": \"http://unis.com/api/food?page=4\"\n      }\n    }\n  }\n}",
          "type": "json"
        }
      ]
    },
    "filename": "app/Http/Controllers/Api/V1/FoodController.php",
    "groupTitle": "Food"
  },
  {
    "type": "get",
    "url": "/food/{food_id}",
    "title": "取一条食品",
    "version": "1.0.0",
    "name": "getOneFood",
    "group": "Food",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "openid",
            "description": "<p>微信用户openid</p>"
          }
        ]
      }
    },
    "success": {
      "examples": [
        {
          "title": "成功返回:",
          "content": "HTTP/1.1 200 OK\n    {\n      \"data\": {\n        \"id\": 77,\n        \"name\": \"牛肉拉面\",\n        \"price\": 11,\n        \"original_price\": \"12.0\",\n        \"img\": \"/uploads/food/14793132235u.jpg\",\n        \"sold\": 0\n      }\n    }",
          "type": "json"
        }
      ]
    },
    "filename": "app/Http/Controllers/Api/V1/FoodController.php",
    "groupTitle": "Food"
  },
  {
    "type": "post",
    "url": "/food/ids",
    "title": "根据多个ID取食品列表",
    "version": "1.0.0",
    "name": "postIdsToGetFoods",
    "group": "Food",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "openid",
            "description": "<p>微信用户openid</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "ids",
            "description": "<p>多个食品id以逗号链接</p>"
          }
        ]
      }
    },
    "success": {
      "examples": [
        {
          "title": "成功返回:",
          "content": "HTTP/1.1 200 OK\n      {\n        \"data\": [\n          {\n            \"id\": 11,\n            \"name\": \"nostrum食品\",\n            \"price\": \"13.0\",\n            \"original_price\": \"26.0\",\n            \"img\": \"http://lorempixel.com/50/50/?94472\",\n            \"sold\": 151,\n            \"canteen\": \"dicta食堂\"\n          },\n      }",
          "type": "json"
        }
      ]
    },
    "filename": "app/Http/Controllers/Api/V1/FoodController.php",
    "groupTitle": "Food"
  },
  {
    "type": "delete",
    "url": "/feed/{feed_id}",
    "title": "删除一条消息",
    "version": "1.0.0",
    "name": "deleteOneFeed",
    "group": "Message",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "Number",
            "optional": false,
            "field": "feed_id",
            "description": "<p>消息ID</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "openid",
            "description": "<p>微信用户openid</p>"
          }
        ]
      }
    },
    "filename": "app/Http/Controllers/Api/V1/FeedController.php",
    "groupTitle": "Message",
    "success": {
      "examples": [
        {
          "title": "成功返回:",
          "content": "HTTP/1.1 200 OK\n\t  success",
          "type": "json"
        }
      ]
    }
  },
  {
    "type": "get",
    "url": "/feed",
    "title": "查用户收到消息",
    "version": "1.0.0",
    "name": "getFeedList",
    "group": "Message",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "openid",
            "description": "<p>微信用户openid</p>"
          }
        ]
      }
    },
    "success": {
      "examples": [
        {
          "title": "成功返回:",
          "content": "HTTP/1.1 200 OK\n[\n  {\n    \"id\": 1,\n    \"title\": \"交易订单消息\",\n    \"status\": \"send\",\n    \"subject\": \"dolores食品|omnis食品\",\n    \"time\": \"1988-01-18\"\n  },\n    ......\n]",
          "type": "json"
        }
      ]
    },
    "filename": "app/Http/Controllers/Api/V1/FeedController.php",
    "groupTitle": "Message"
  },
  {
    "type": "get",
    "url": "/feed/{feed_id}",
    "title": "取一条消息",
    "version": "1.0.0",
    "name": "getOneFeed",
    "group": "Message",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "Number",
            "optional": false,
            "field": "feed_id",
            "description": "<p>消息ID</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "openid",
            "description": "<p>微信用户openid</p>"
          }
        ]
      }
    },
    "success": {
      "examples": [
        {
          "title": "成功返回:",
          "content": "HTTP/1.1 200 OK\n{\n  \"feed\": {\n    \"id\": 1,\n    \"order_id\": 367,\n    \"sender_id\": 1,\n    \"receiver_id\": 1003,\n    \"status\": \"send\",\n    \"type\": \"received\",\n    \"created_at\": \"2016-11-21 16:44:27\",\n    \"updated_at\": \"2016-11-21 16:44:27\"\n  }\n}",
          "type": "json"
        }
      ]
    },
    "filename": "app/Http/Controllers/Api/V1/FeedController.php",
    "groupTitle": "Message"
  },
  {
    "type": "get",
    "url": "/order/delivered/{order_id}",
    "title": "确认送达",
    "version": "1.0.0",
    "name": "OrderDelivered",
    "group": "Order",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "Number",
            "optional": false,
            "field": "order_id",
            "description": "<p>订单ID</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "openid",
            "description": "<p>微信用户openid</p>"
          }
        ]
      }
    },
    "filename": "app/Http/Controllers/Api/V1/OrderController.php",
    "groupTitle": "Order",
    "success": {
      "examples": [
        {
          "title": "成功返回:",
          "content": "HTTP/1.1 200 OK\n\t  success",
          "type": "json"
        }
      ]
    }
  },
  {
    "type": "get",
    "url": "/order/received/{order_id}",
    "title": "确认收到",
    "version": "1.0.0",
    "name": "OrderReceived",
    "group": "Order",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "Number",
            "optional": false,
            "field": "order_id",
            "description": "<p>订单ID</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "openid",
            "description": "<p>微信用户openid</p>"
          }
        ]
      }
    },
    "filename": "app/Http/Controllers/Api/V1/OrderController.php",
    "groupTitle": "Order",
    "success": {
      "examples": [
        {
          "title": "成功返回:",
          "content": "HTTP/1.1 200 OK\n\t  success",
          "type": "json"
        }
      ]
    }
  },
  {
    "type": "get",
    "url": "/order/taken/{order_id}",
    "title": "接单",
    "version": "1.0.0",
    "name": "OrderTaked",
    "group": "Order",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "Number",
            "optional": false,
            "field": "order_id",
            "description": "<p>订单ID</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "openid",
            "description": "<p>微信用户openid</p>"
          }
        ]
      }
    },
    "filename": "app/Http/Controllers/Api/V1/OrderController.php",
    "groupTitle": "Order",
    "success": {
      "examples": [
        {
          "title": "成功返回:",
          "content": "HTTP/1.1 200 OK\n\t  success",
          "type": "json"
        }
      ]
    }
  },
  {
    "type": "get",
    "url": "/order/all_buy",
    "title": "我下的单分页",
    "version": "1.0.0",
    "name": "getMyAllBuyPage",
    "group": "Order",
    "filename": "app/Http/Controllers/Api/V1/OrderController.php",
    "groupTitle": "Order",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "openid",
            "description": "<p>微信用户openid</p>"
          }
        ]
      }
    },
    "success": {
      "examples": [
        {
          "title": "成功返回:",
          "content": "HTTP/1.1 200 OK\n    {\n      \"data\": [\n        {\n          \"id\": 3031,\n          \"order_no\": \"1003161126192356\",\n          \"orderer\": {\n            \"name\": \"LMercury小敏\",\n            \"phone\": \"18622525566\"\n          },\n          \"deliver\": null,\n          \"address\": \"上海9大学dicta校区aspernatur宿舍22\",\n          \"total\": \"上海9大学dicta校区aspernatur宿舍22\",\n          \"apponitment_at\": \"2016/11/26 - 19:53\",\n          \"status\": \"未付款\",\n          \"foods\": {\n            \"data\": [\n              {\n                \"id\": 141,\n                \"name\": \"est食品\",\n                \"price\": \"14.0\",\n                \"quntity\": null,\n                \"original_price\": \"20.0\",\n                \"img\": \"http://lorempixel.com/50/50/?52894\",\n                \"sold\": 79,\n                \"canteen\": \"ad食堂\"\n              }\n            ]\n          }\n        },\n        ......\n      ],\n      \"meta\": {\n        \"pagination\": {\n          \"total\": 18,\n          \"count\": 2,\n          \"per_page\": 8,\n          \"current_page\": 3,\n          \"total_pages\": 3,\n          \"links\": {\n            \"previous\": \"http://unis.com/api/order?page=2\"\n          }\n        }\n      }\n    }",
          "type": "json"
        }
      ]
    }
  },
  {
    "type": "get",
    "url": "/order/completed_sale",
    "title": "我已接单完成分页",
    "version": "1.0.0",
    "name": "getMyCompletedSalePage",
    "group": "Order",
    "filename": "app/Http/Controllers/Api/V1/OrderController.php",
    "groupTitle": "Order",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "openid",
            "description": "<p>微信用户openid</p>"
          }
        ]
      }
    },
    "success": {
      "examples": [
        {
          "title": "成功返回:",
          "content": "HTTP/1.1 200 OK\n    {\n      \"data\": [\n        {\n          \"id\": 3031,\n          \"order_no\": \"1003161126192356\",\n          \"orderer\": {\n            \"name\": \"LMercury小敏\",\n            \"phone\": \"18622525566\"\n          },\n          \"deliver\": null,\n          \"address\": \"上海9大学dicta校区aspernatur宿舍22\",\n          \"total\": \"上海9大学dicta校区aspernatur宿舍22\",\n          \"apponitment_at\": \"2016/11/26 - 19:53\",\n          \"status\": \"未付款\",\n          \"foods\": {\n            \"data\": [\n              {\n                \"id\": 141,\n                \"name\": \"est食品\",\n                \"price\": \"14.0\",\n                \"quntity\": null,\n                \"original_price\": \"20.0\",\n                \"img\": \"http://lorempixel.com/50/50/?52894\",\n                \"sold\": 79,\n                \"canteen\": \"ad食堂\"\n              }\n            ]\n          }\n        },\n        ......\n      ],\n      \"meta\": {\n        \"pagination\": {\n          \"total\": 18,\n          \"count\": 2,\n          \"per_page\": 8,\n          \"current_page\": 3,\n          \"total_pages\": 3,\n          \"links\": {\n            \"previous\": \"http://unis.com/api/order?page=2\"\n          }\n        }\n      }\n    }",
          "type": "json"
        }
      ]
    }
  },
  {
    "type": "get",
    "url": "/order/uncompleted_sale",
    "title": "我已接单未完成列表",
    "version": "1.0.0",
    "name": "getMyUncompletedSalePage",
    "group": "Order",
    "success": {
      "examples": [
        {
          "title": "成功返回:",
          "content": "HTTP/1.1 200 OK\n      {\n        \"data\": [\n          {\n            \"id\": 1099,\n            \"order_no\": \"368161123154046\",\n            \"orderer\": {\n              \"name\": \"Dr. Narciso O'Kon\",\n              \"phone\": \"14849947418\"\n            },\n            \"deliver\": {\n              \"name\": \"LMercury小敏\",\n              \"phone\": \"18622525566\"\n            },\n            \"address\": \"合肥9大学laborum校区asperiores宿舍3\",\n            \"total\": 74.5,\n            \"apponitment_at\": \"2013/12/13 - 17:17\",\n            \"status\": \"配送中\"\n          },\n          ......\n        ]\n      }",
          "type": "json"
        }
      ]
    },
    "filename": "app/Http/Controllers/Api/V1/OrderController.php",
    "groupTitle": "Order",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "openid",
            "description": "<p>微信用户openid</p>"
          }
        ]
      }
    }
  },
  {
    "type": "get",
    "url": "/order/show/{order_id}",
    "title": "取一条订单",
    "version": "1.0.0",
    "name": "getOneOrder",
    "group": "Order",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "Number",
            "optional": false,
            "field": "order_id",
            "description": "<p>订单ID</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "openid",
            "description": "<p>微信用户openid</p>"
          }
        ]
      }
    },
    "success": {
      "examples": [
        {
          "title": "成功返回:",
          "content": "HTTP/1.1 200 OK\n      {\n        \"data\": {\n          \"id\": 100,\n          \"order_no\": \"35161123154028\",\n          \"orderer\": {\n            \"name\": \"Julian Padberg IV\",\n            \"phone\": \"18884950881\"\n          },\n          \"deliver\": null,\n          \"address\": \"南京7大学numquam校区et宿舍1\",\n          \"total\": 81.5,\n          \"apponitment_at\": \"2003/10/23 - 23:21\",\n          \"status\": \"已提现\",\n          \"foods\": {\n            \"data\": [\n              {\n                \"id\": 2291,\n                \"name\": \"odio食品\",\n                \"price\": \"2.0\",\n                \"quntity\": null,\n                \"original_price\": \"3.5\",\n                \"img\": \"http://lorempixel.com/50/50/?79622\",\n                \"sold\": 57,\n                \"canteen\": \"blanditiis食堂\"\n              },\n              ......\n            ]\n          }\n        }\n      }",
          "type": "json"
        }
      ]
    },
    "filename": "app/Http/Controllers/Api/V1/OrderController.php",
    "groupTitle": "Order"
  },
  {
    "type": "get",
    "url": "/order",
    "title": "订单列表分页",
    "version": "1.0.0",
    "name": "getOrderList",
    "group": "Order",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "Number",
            "optional": false,
            "field": "page",
            "description": "<p>第几页</p>"
          },
          {
            "group": "Parameter",
            "type": "Number",
            "optional": false,
            "field": "limit",
            "description": "<p>每页多少条</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "openid",
            "description": "<p>微信用户openid</p>"
          }
        ]
      }
    },
    "filename": "app/Http/Controllers/Api/V1/OrderController.php",
    "groupTitle": "Order",
    "success": {
      "examples": [
        {
          "title": "成功返回:",
          "content": "HTTP/1.1 200 OK\n    {\n      \"data\": [\n        {\n          \"id\": 3031,\n          \"order_no\": \"1003161126192356\",\n          \"orderer\": {\n            \"name\": \"LMercury小敏\",\n            \"phone\": \"18622525566\"\n          },\n          \"deliver\": null,\n          \"address\": \"上海9大学dicta校区aspernatur宿舍22\",\n          \"total\": \"上海9大学dicta校区aspernatur宿舍22\",\n          \"apponitment_at\": \"2016/11/26 - 19:53\",\n          \"status\": \"未付款\",\n          \"foods\": {\n            \"data\": [\n              {\n                \"id\": 141,\n                \"name\": \"est食品\",\n                \"price\": \"14.0\",\n                \"quntity\": null,\n                \"original_price\": \"20.0\",\n                \"img\": \"http://lorempixel.com/50/50/?52894\",\n                \"sold\": 79,\n                \"canteen\": \"ad食堂\"\n              }\n            ]\n          }\n        },\n        ......\n      ],\n      \"meta\": {\n        \"pagination\": {\n          \"total\": 18,\n          \"count\": 2,\n          \"per_page\": 8,\n          \"current_page\": 3,\n          \"total_pages\": 3,\n          \"links\": {\n            \"previous\": \"http://unis.com/api/order?page=2\"\n          }\n        }\n      }\n    }",
          "type": "json"
        }
      ]
    }
  },
  {
    "type": "get",
    "url": "/canteens/{canteen_id}/orders",
    "title": "食堂订单条件分页",
    "version": "1.0.0",
    "name": "getOrdersByCanteen",
    "group": "Order",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "billing_id",
            "description": "<p>订单交易号</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "type",
            "description": "<p>订单交易类型</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "order_no",
            "description": "<p>订单流水号</p>"
          },
          {
            "group": "Parameter",
            "type": "Number",
            "optional": false,
            "field": "user_id",
            "description": "<p>下单用户ID</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "status",
            "description": "<p>订单状态</p>"
          },
          {
            "group": "Parameter",
            "type": "Number",
            "optional": false,
            "field": "school_id",
            "description": "<p>订单所属学校ID</p>"
          },
          {
            "group": "Parameter",
            "type": "Number",
            "optional": false,
            "field": "campus_id",
            "description": "<p>订单所属校区ID</p>"
          },
          {
            "group": "Parameter",
            "type": "Number",
            "optional": false,
            "field": "canteen_id",
            "description": "<p>订单所属食堂ID</p>"
          },
          {
            "group": "Parameter",
            "type": "Number",
            "optional": false,
            "field": "dorm_id",
            "description": "<p>订单所属宿舍ID</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "appointment_at",
            "description": "<p>订单预约时间</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "sort",
            "description": "<p>排序字段</p>"
          },
          {
            "group": "Parameter",
            "type": "Bool",
            "optional": false,
            "field": "direction",
            "description": "<p>顺序或倒序</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "openid",
            "description": "<p>微信用户openid</p>"
          }
        ]
      }
    },
    "filename": "app/Http/Controllers/Api/V1/OrderController.php",
    "groupTitle": "Order"
  },
  {
    "type": "get",
    "url": "/orders",
    "title": "订单条件分页",
    "version": "1.0.0",
    "name": "getOrdersByQueryStr",
    "group": "Order",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "billing_id",
            "description": "<p>订单交易号</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "type",
            "description": "<p>订单交易类型</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "order_no",
            "description": "<p>订单流水号</p>"
          },
          {
            "group": "Parameter",
            "type": "Number",
            "optional": false,
            "field": "user_id",
            "description": "<p>下单用户ID</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "status",
            "description": "<p>订单状态</p>"
          },
          {
            "group": "Parameter",
            "type": "Number",
            "optional": false,
            "field": "school_id",
            "description": "<p>订单所属学校ID</p>"
          },
          {
            "group": "Parameter",
            "type": "Number",
            "optional": false,
            "field": "campus_id",
            "description": "<p>订单所属校区ID</p>"
          },
          {
            "group": "Parameter",
            "type": "Number",
            "optional": false,
            "field": "dorm_id",
            "description": "<p>订单所属宿舍ID</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "appointment_at",
            "description": "<p>订单预约时间</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "sort",
            "description": "<p>排序字段</p>"
          },
          {
            "group": "Parameter",
            "type": "Bool",
            "optional": false,
            "field": "direction",
            "description": "<p>顺序或倒序</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "openid",
            "description": "<p>微信用户openid</p>"
          }
        ]
      }
    },
    "filename": "app/Http/Controllers/Api/V1/OrderController.php",
    "groupTitle": "Order"
  },
  {
    "type": "get",
    "url": "/order/untaken",
    "title": "未接订单分页",
    "version": "1.0.0",
    "name": "getUntakenPage",
    "group": "Order",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "Number",
            "optional": false,
            "field": "order_id",
            "description": "<p>订单ID</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "openid",
            "description": "<p>微信用户openid</p>"
          }
        ]
      }
    },
    "filename": "app/Http/Controllers/Api/V1/OrderController.php",
    "groupTitle": "Order",
    "success": {
      "examples": [
        {
          "title": "成功返回:",
          "content": "HTTP/1.1 200 OK\n    {\n      \"data\": [\n        {\n          \"id\": 3031,\n          \"order_no\": \"1003161126192356\",\n          \"orderer\": {\n            \"name\": \"LMercury小敏\",\n            \"phone\": \"18622525566\"\n          },\n          \"deliver\": null,\n          \"address\": \"上海9大学dicta校区aspernatur宿舍22\",\n          \"total\": \"上海9大学dicta校区aspernatur宿舍22\",\n          \"apponitment_at\": \"2016/11/26 - 19:53\",\n          \"status\": \"未付款\",\n          \"foods\": {\n            \"data\": [\n              {\n                \"id\": 141,\n                \"name\": \"est食品\",\n                \"price\": \"14.0\",\n                \"quntity\": null,\n                \"original_price\": \"20.0\",\n                \"img\": \"http://lorempixel.com/50/50/?52894\",\n                \"sold\": 79,\n                \"canteen\": \"ad食堂\"\n              }\n            ]\n          }\n        },\n        ......\n      ],\n      \"meta\": {\n        \"pagination\": {\n          \"total\": 18,\n          \"count\": 2,\n          \"per_page\": 8,\n          \"current_page\": 3,\n          \"total_pages\": 3,\n          \"links\": {\n            \"previous\": \"http://unis.com/api/order?page=2\"\n          }\n        }\n      }\n    }",
          "type": "json"
        }
      ]
    }
  },
  {
    "type": "post",
    "url": "report",
    "title": "意见反馈",
    "version": "1.0.0",
    "name": "postReport",
    "group": "Report",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "content",
            "description": "<p>反馈内容，不少于10个字</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "openid",
            "description": "<p>微信用户openid</p>"
          }
        ]
      }
    },
    "filename": "app/Http/Controllers/Api/V1/ReportController.php",
    "groupTitle": "Report",
    "success": {
      "examples": [
        {
          "title": "成功返回:",
          "content": "HTTP/1.1 200 OK\n\t  success",
          "type": "json"
        }
      ]
    }
  },
  {
    "type": "get",
    "url": "school",
    "title": "学校列表",
    "version": "1.0.0",
    "name": "listSchool",
    "group": "School",
    "success": {
      "examples": [
        {
          "title": "成功返回:",
          "content": "HTTP/1.1 200 OK\n    [\n      {\n        \"id\": 1,\n        \"text\": \"南昌2大学\"\n      },\n        ......\n    ]",
          "type": "json"
        }
      ]
    },
    "filename": "app/Http/Controllers/Api/V1/SchoolController.php",
    "groupTitle": "School"
  },
  {
    "type": "get",
    "url": "school/like/{keyword}",
    "title": "根据关键字查学校",
    "version": "1.0.0",
    "name": "querySchoolByKeyword",
    "group": "School",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "keyword",
            "description": "<p>关键字</p>"
          }
        ]
      }
    },
    "success": {
      "examples": [
        {
          "title": "成功返回:",
          "content": "HTTP/1.1 200 OK\n    {\n      \"schools\": [\n        {\n          \"id\": 1,\n          \"name\": \"南昌2大学\",\n          \"province\": \"江苏省\",\n          \"city\": \"南昌\",\n          \"block\": \"屈 Street\",\n          \"address\": \"58 牟 Street\",\n          \"x\": 1,\n          \"y\": -41,\n          \"geohash\": \"k0b87vmd9g1\",\n          \"status\": \"启用\",\n          \"created_at\": \"2016-11-21 16:44:04\",\n          \"updated_at\": \"2016-11-21 16:44:04\"\n        }\n      ]\n    }",
          "type": "json"
        }
      ]
    },
    "filename": "app/Http/Controllers/Api/V1/SchoolController.php",
    "groupTitle": "School"
  },
  {
    "type": "get",
    "url": "/food_of_shop/{shop_id}",
    "title": "取窗口食品",
    "version": "1.0.0",
    "name": "getFoodsOfShop",
    "group": "Shop",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "Number",
            "optional": false,
            "field": "shop_id",
            "description": "<p>窗口ID</p>"
          }
        ]
      }
    },
    "success": {
      "examples": [
        {
          "title": "成功返回:",
          "content": "HTTP/1.1 200 OK\n    [\n      {\n        \"id\": 896,\n        \"name\": \"consequuntur食品\",\n        \"img\": \"http://lorempixel.com/50/50/?26143\",\n        \"price\": 900,\n        \"original_price\": \"17.50\",\n        \"sold\": 10\n        \"canteen\": xx食堂\n      },\n      ......\n    ]",
          "type": "json"
        }
      ]
    },
    "filename": "app/Http/Controllers/Api/V1/ShopController.php",
    "groupTitle": "Shop"
  },
  {
    "type": "get",
    "url": "/shops_of_canteen/{canteen_id}",
    "title": "取食堂窗口列表",
    "version": "1.0.0",
    "name": "listShopsOfCanteen",
    "group": "Shop",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "Number",
            "optional": false,
            "field": "canteen_id",
            "description": "<p>食堂ID</p>"
          }
        ]
      }
    },
    "success": {
      "examples": [
        {
          "title": "成功返回:",
          "content": "HTTP/1.1 200 OK\n    {\n      \"shops\": [\n        {\n          \"id\": 18,\n          \"name\": \"omnis 小店\",\n          \"canteen_id\": 4,\n          \"suplier_id\": 10,\n          \"created_at\": \"2016-11-21 16:44:04\",\n          \"updated_at\": \"2016-11-21 16:44:04\"\n        },\n        ......\n      ]\n    }",
          "type": "json"
        }
      ]
    },
    "filename": "app/Http/Controllers/Api/V1/ShopController.php",
    "groupTitle": "Shop"
  }
] });
