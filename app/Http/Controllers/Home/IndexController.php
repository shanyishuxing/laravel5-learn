<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class IndexController extends Controller
{
    //use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
	
	public function index()
	{
		//$arr=$this->uniqueRandom(1,10000);
		function uniqueRandom($min, $max, $num)
		{
			$count = 0;
			$return = [];
			while($count < $num) {
				$return[] = mt_rand($min, $max);
				//去重
				$return = array_flip(array_flip($return));
				$count = count($return);
			}
			shuffle($return);
			return $return;
		}
		function bubbleSort(&$arr) : void
		{
			for ($i = 0, $c = count($arr); $i < $c; $i++) {
				$swapped = false;
				for ($j = 0; $j < $c - 1; $j++) {
					if ($arr[$j + 1] < $arr[$j]) {
						list($arr[$j], $arr[$j + 1]) = array($arr[$j + 1], $arr[$j]);
						$swapped = true;
					}
				}
				if (!$swapped) break; //没有发生交换，算法结束
			}
		}
		$arr = uniqueRandom(1, 100000, 5000);
		$arr1=$arr2=$arr3=$arr4=$arr;
		$start = microtime(true);
		bubbleSort($arr1);
		$end = microtime(true);
		$used = $end - $start;
		echo "V1 used $used s" . PHP_EOL;
		//V1 used 4.3315870761871 s
		function bubbleSortV2(&$arr) : void
		{
			for ($i = 0, $c = count($arr); $i < $c; $i++) {
				$swapped = false;
				for ($j = 0; $j < $c - $i - 1; $j++) {
					if ($arr[$j + 1] < $arr[$j]) {
						list($arr[$j], $arr[$j + 1]) = array($arr[$j + 1], $arr[$j]);
						$swapped = true;
					}
				}
				if (!$swapped) break; //没有发生交换，算法结束
			}
		}
		function bubbleSortV3(&$arr) : void
		{
			$bound = count($arr) - 1;
			for ($i = 0, $c = count($arr); $i < $c; $i++) {
				$swapped = false;
				for ($j = 0; $j < $bound; $j++) {
					if ($arr[$j + 1] < $arr[$j]) {
						list($arr[$j], $arr[$j + 1]) = array($arr[$j + 1], $arr[$j]);
						$swapped = true;
						$newBound = $j;
					}
				}
				$bound = $newBound;
				if (!$swapped) break; //没有发生交换，算法结束
			}
		}
		//$arr = uniqueRandom(1, 100000, 5000);
		$start = microtime(true);
		bubbleSortV2($arr2);
		$end = microtime(true);
		$used = $end - $start;
		echo "</br>V2 used $used s" . PHP_EOL;
		
		//$arr = uniqueRandom(1, 100000, 5000);
		$start = microtime(true);
		bubbleSortV3($arr3);
		$end = microtime(true);
		$used = $end - $start;
		echo "<br/> V3 used $used s" . PHP_EOL;
		
		//V2 used 2.4826340675354 s
		//$arr = uniqueRandom(1, 100000, 5000);
		$start = microtime(true);
		asort($arr4);
		$end = microtime(true);
		$used = $end - $start;
		echo "</br>asort() used $used s" . PHP_EOL;
		//asort() used 0.00070095062255859 s
	}
	
	public function home()
	{	
		//斐波那契数列
		function feibonaqi($num){ //参数$num表示为第$num个数之前的所有斐波那契数列
			$arr = array(); //定义一个空变量用来存放斐波那契数列的数组
			for($i=1;$i<=$num;$i++){
				if($i == 1 || $i == 2){
					$arr[$i-1] = 1;
				}else{
					$arr[$i-1] = $arr[$i-2] + $arr[$i-3];
				}
			}
			
			return $arr;
		}
		$start = microtime(true);		
		feibonaqi(1000);
		$end = microtime(true);
		$used = $end - $start;
		echo "</br>asort() used $used s" . PHP_EOL;
		
		function counNum($num){
			if($num==0 || $num==1) return $num;
			return (counNum($num-1) + counNum($num-2));
		}
		$start = microtime(true);
		counNum(40);
		$end = microtime(true);
		$used = $end - $start;
		echo "</br>asort() used $used s" . PHP_EOL;
		
		function Fibonaqi($n)
		{
			if($n<=0)
				return 0;
			else if($n==1)
				return 1;

			else
			{
				//当n>=2时，初始化pre=f(0)=0,post=f(1)=1,f(n)=0;
				$pre=0;
				$post=1;
				$fn=0;
				//采用循环计算斐波那契数列，通过两个临时变量pre和post保存中间结果，避免重复计算
				for($i=2;$i<=$n;$i++)
				{
					$fn=$pre+$post;//fn等于其前面两个元素值的和
					//然后让pre和post分别直线他们后面的元素。
					$pre=$post;
					$post=$fn;
				}
				return $fn;
			}
		}
		
		$start = microtime(true);
		Fibonaqi(20);
		$end = microtime(true);
		$used = $end - $start;
		echo "</br>asort() used $used s" . PHP_EOL;

	}
	
	public function cctv()
	{		
		/**
		 * CCTV(央视网)视频解析
		 * 作者：iqiqiya (77sec.cn)
		 * 日期：2018/7/10
		 */
		error_reporting(0);
		function curl($url) {
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5000);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt($ch, CURLOPT_HTTPHEADER, array(
				'User-Agent: Mozilla/5.0 (iPhone; CPU iPhone OS 8_0 like Mac OS X) AppleWebKit/600.1.3 (KHTML, like Gecko) Version/8.0 Mobile/12A4345d Safari/600.1.4'
			));
			curl_setopt($ch, CURLOPT_URL, $url);
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
			curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
			curl_setopt($ch, CURLOPT_REDIR_PROTOCOLS, -1);
			curl_setopt($ch, CURLOPT_REFERER, 'http://www.cctv.com/');//修改Referer
			$contents = curl_exec($ch);
			curl_close($ch);
			return $contents;  
		}
		function getCctv($VideoUrl) {
			$contents = curl($VideoUrl);
			//"videoCenterId","3ebb32c9a2474758b86d8a98f433c3b3");
			preg_match("~videoCenterId\"\,\"(.*?)\"~", $contents, $matches);
			if (count($matches) == 0) {
				echo '无法解析此视频，请换个链接试一下。';
				exit;
			}
			$video_url = $matches[1];
			//echo $video_url;
			//echo "~~~~~~~~~";
			$video_url_parse = "http://asp.cntv.myalicdn.com/asp/hls/main/0303000a/3/default/".$video_url."/main.m3u8?maxbr=2048";
			echo $video_url_parse;    //输出url
			//header("Location: http://player.77sec.cn/m3u8/?url=$video_url_parse");    //header跳转
		}
		//$VideoUrl = $_GET['url'];
		$VideoUrl = "http://tv.cctv.com/2017/03/04/VIDEhOELsnCYlUtKhOmfO4Qu170304.shtml?spm=C55924871139.PKgX4CXWWE68.0.0";
		getCctv($VideoUrl);
		//http://asp.cntv.myalicdn.com/asp/hls/main/0303000a/3/default/3ebb32c9a2474758b86d8a98f433c3b3/main.m3u8?maxbr=2048
		exit; 

	}
	
	
}
