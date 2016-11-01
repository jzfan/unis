<?php

function mapRegionFrom($request)
{
	$data = $request->input();
	list($data['province'], $data['city'], $data['block']) = explode('/', $request->input('region'));
	return $data;
}