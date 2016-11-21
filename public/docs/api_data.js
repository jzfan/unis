define({ "api": [
  {
    "type": "get",
    "url": "/address?openid=xxx",
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
          "title": "错误返回:",
          "content": "HTTP/1.1 401 Unauthorized\n{\n   \"message\": \"Unauthorized action.\",\n   \"status_code\": 401\n}",
          "type": "json"
        }
      ]
    }
  },
  {
    "type": "get",
    "url": "/address/default?openid=xxx",
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
          "title": "错误返回:",
          "content": "HTTP/1.1 401 Unauthorized\n{\n   \"message\": \"Unauthorized action.\",\n   \"status_code\": 401\n}",
          "type": "json"
        }
      ]
    }
  },
  {
    "type": "get",
    "url": "/address/me?openid=xxx",
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
          "title": "错误返回:",
          "content": "HTTP/1.1 401 Unauthorized\n{\n   \"message\": \"Unauthorized action.\",\n   \"status_code\": 401\n}",
          "type": "json"
        }
      ]
    }
  },
  {
    "type": "post",
    "url": "/address?openid=xxx",
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
    "success": {
      "examples": [
        {
          "title": "成功返回:",
          "content": "HTTP/1.1 200 OK",
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
          "title": "错误返回:",
          "content": "HTTP/1.1 401 Unauthorized\n{\n   \"message\": \"Unauthorized action.\",\n   \"status_code\": 401\n}",
          "type": "json"
        }
      ]
    }
  }
] });
