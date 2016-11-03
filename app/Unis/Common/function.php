<?php

function mapRegionFrom($request)
{
	$data = $request->input();
	list($data['province'], $data['city'], $data['block']) = explode('/', $request->input('region'));
	return $data;
}

function getWechatViewUrl($uri)
{
	$redirect = env('APP_URL').$uri;
	return "https://open.weixin.qq.com/connect/oauth2/authorize?appid=".env('WECHAT_APPID')."&redirect_uri=".$redirect."&response_type=code&scope=snsapi_base";
}

function getWechatOpenid()
{
	$appid = env('WECHAT_APPID'); 
	$secret = env('WECHAT_SECRET'); 
	$code = $_GET["code"]; 
	$get_token_url = 'https://api.weixin.qq.com/sns/oauth2/access_token?appid='.$appid.'&secret='.$secret.'&code='.$code.'&grant_type=authorization_code';
	$ch = curl_init();
	curl_setopt($ch,CURLOPT_URL,$get_token_url); 
	curl_setopt($ch,CURLOPT_HEADER,0); 
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1 ); 
	curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10); 
	$res = curl_exec($ch); 
	curl_close($ch); 
	$json_obj = json_decode($res,true); 
	//根据openid和access_token查询用户信息 
	$access_token = $json_obj['access_token']; 
	$openid = $json_obj['openid']; 
	return $openid;
}