<?php

namespace App\Http\Controllers\Common;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Geohash;
use App\Unis\School\School;

class RegionController extends Controller
{
    public function index()
    {
    	return 'aaa';
    }

    public function test()
    {
        $geohash = new Geohash;
        $n_latitude = -4.0899500;
        $n_longitude = 84.952600;

//当前 geohash值
$n_geohash = $geohash->encode($n_latitude,$n_longitude);
// dd($n_geohash);
//附近
$n = 6;
$like_geohash = substr($n_geohash, 0, $n);

// $sql = 'select * from mb_shop_ext where geohash like "'.$like_geohash.'%"';
$data = School::where('geohash', 'like', $like_geohash. '%')->get()->toArray();

// dd($data);

// $data = $mysql->queryAll($sql);

//算出实际距离
foreach($data as $key=>$val)
{
    $distance = $this->getDistance($n_latitude,$n_longitude,$val['latitude'],$val['longitude']);
// dd($distance);
    $data[$key]['distance'] = $distance;

    //排序列
    $sortdistance[$key] = $distance;
}

//距离排序
array_multisort($sortdistance,SORT_ASC,$data);

//结束
// $e_time = microtime(true);

// echo $e_time - $b_time;

var_dump($data);

    }

//根据经纬度计算距离 其中A($lat1,$lng1)、B($lat2,$lng2)
function getDistance($lat1,$lng1,$lat2,$lng2)
{
    //地球半径
    $R = 6378137;

    //将角度转为狐度
    $radLat1 = deg2rad($lat1);
    $radLat2 = deg2rad($lat2);
    $radLng1 = deg2rad($lng1);
    $radLng2 = deg2rad($lng2);

    //结果
    $s = acos(cos($radLat1)*cos($radLat2)*cos($radLng1-$radLng2)+sin($radLat1)*sin($radLat2))*$R;

    //精度
    $s = round($s* 10000)/10000;

    return  round($s);
}     

}
