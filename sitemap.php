<?php
set_time_limit(300); 


function create_xml($file){
	if(file_exists($file)){
		// echo '旧文件已删除！';
		unlink($file);
	}
	if($handle=fopen($file, "ab+")){
			// echo "创建sitemap成功！";
	}
	return $handle;
}

// 返回文件资源句柄
function wt($handle,$arr,$time,$cq,$n){
	switch ($n) {
		case '1':
				foreach ($arr as $key => $v) {
					$p='1';
					$str="<?xml version=\"1.0\" encoding=\"utf-8\"?>\r\n<urlset xmlns=\"http://www.google.com/schemas/sitemap/0.84\">";
					fwrite($handle, $str);
					$sitemap="\r\n<url>\r\n<loc>$v</loc>\r\n<lastmod>$time</lastmod>\r\n<changefreq>$cq</changefreq>\r\n<priority>$p</priority>\r\n</url>\r\n";
					fwrite($handle, $sitemap);
				}
			break;
		case '2':
				$p=0.8;
				foreach ($arr as $key => $v) {
					$v=$GLOBALS['ht'].'p/'.$v.'/';
					$sitemap="<url>\r\n<loc>$v</loc>\r\n<lastmod>$time</lastmod>\r\n<changefreq>$cq</changefreq>\r\n<priority>$p</priority>\r\n</url>\r\n";
					fwrite($handle, $sitemap);

				}

			break;
		case '3':

				$p=0.8;
				foreach ($arr as $key => $v) {
					$v=$GLOBALS['ht'].'p/'.$v.'.html';
					$sitemap="<url>\r\n<loc>$v</loc>\r\n<lastmod>$time</lastmod>\r\n<changefreq>$cq</changefreq>\r\n<priority>$p</priority>\r\n</url>\r\n";
					fwrite($handle, $sitemap);
				}

			break;
		case '4':

				$p=0.7;
				foreach ($arr as $key => $v) {
					$v=$GLOBALS['ht'].'n/'.$v.'.html';
					$sitemap="<url>\r\n<loc>$v</loc>\r\n<lastmod>$time</lastmod>\r\n<changefreq>$cq</changefreq>\r\n<priority>$p</priority>\r\n</url>\r\n";
					fwrite($handle, $sitemap);
				}

			break;
		case '5':

				$p=0.6;
				foreach ($arr as $key => $v) {
					$v=$GLOBALS['ht'].$v.'/';
					$sitemap="<url>\r\n<loc>$v</loc>\r\n<lastmod>$time</lastmod>\r\n<changefreq>$cq</changefreq>\r\n<priority>$p</priority>\r\n</url>\r\n";
					fwrite($handle, $sitemap);
				}

			break;
		case '6':

				$p=0.6;
				foreach ($arr as $key => $v) {
					$v=$GLOBALS['ht'].$v.'/';
					$sitemap="<url>\r\n<loc>$v</loc>\r\n<lastmod>$time</lastmod>\r\n<changefreq>$cq</changefreq>\r\n<priority>$p</priority>\r\n</url>\r\n";
					fwrite($handle, $sitemap);
				}

			break;
		case '7':
				$p=0.6;
				foreach ($arr as $key => $v) {
					$v=$GLOBALS['ht'].$v;
					$sitemap="<url>\r\n<loc>$v</loc>\r\n<lastmod>$time</lastmod>\r\n<changefreq>$cq</changefreq>\r\n<priority>$p</priority>\r\n</url>\r\n";
					fwrite($handle, $sitemap);
				}
			break;
		case '8':
				$p=0.5;
				foreach ($arr as $key => $v) {
					$v=$v.'/';
					$sitemap="<url>\r\n<loc>$v</loc>\r\n<lastmod>$time</lastmod>\r\n<changefreq>$cq</changefreq>\r\n<priority>$p</priority>\r\n</url>\r\n";
					fwrite($handle, $sitemap);
				}
			break;
		case '9':
				$p=0.5;
				foreach ($arr as $key => $v) {
					$v=$v.'/';
					$sitemap="<url>\r\n<loc>$v</loc>\r\n<lastmod>$time</lastmod>\r\n<changefreq>$cq</changefreq>\r\n<priority>$p</priority>\r\n</url>\r\n</urlset>";
					fwrite($handle, $sitemap);
				}
			break;
		default:
			# code...
			break;
	}
	
	
	
}
//写入操作
function get_url($n){
	$con=mysql_connect($GLOBALS['db']['db_host'],$GLOBALS['db']['db_uname'],$GLOBALS['db']['db_pass']);
	mysql_select_db($GLOBALS['db']['db_database']);
	switch ($n) {
		case '1':
			$sql="select val from zl_sysinfo where keysname='sys_siteurl'";
			$res=mysql_query($sql);
			$arr=array();
			$i=0;
			while($bwt=mysql_fetch_assoc($res)){$arr[$i]=$bwt['val'];$GLOBALS['ht']=$bwt['val'].'/';$i++;}

			return $arr;
			break;
		case '2':
			$i=0;
			$arr=array();
			$sql="select id from zl_product";
			break;
		case '3':
			$i=0;
			$arr=array();
			$sql="select id from zl_producttype";
			break;
		case '4':
			$i=0;
			$arr=array();
			$sql="select id from zl_arcticle";
			break;
		case '5':
			$i=0;
			$arr=array();
			$sql="select id from zl_area";
			break;
		// case '6':
		// 	$i=0;
		// 	$arr=array();
		// 	$sql_area="select id from zl_area";
		// 	$res_area=mysql_query($sql_area,$con);
		// 	$sql_product="select id from zl_product";
		// 	$res_product=mysql_query($sql_product,$con);
		// 	$arr_product=array();
		// 	while($bwt=mysql_fetch_assoc($res_product)){$arr_product[$i]=$bwt['id'];$i++;}

		// 	$i=0;
		// 	$arr_area=array();
		// 	while($bwt=mysql_fetch_assoc($res_area)){$arr_area[$i]=$bwt['id'];$i++;}

		// 	$i=0;


		// 	foreach ($arr_area as $key => $value) {
		// 		foreach ($arr_product as $ke => $val) {
		// 			$arr[$i]=$value.'/p'.$val;$i++;
		// 		}
		// 	}
		// 	return $arr;
		// 	break;
		// case '7':
		// 	$i=0;
		// 	$arr=array();
		// 	$sql_area="select id from zl_area";
		// 	$res_area=mysql_query($sql_area,$con);
		// 	$sql_product="select id from zl_product";
		// 	$res_product=mysql_query($sql_product,$con);
		// 	$sql_producttype="select id from zl_producttype";
		// 	$res_producttype=mysql_query($sql_producttype);
		// 	$i=0;
		// 	$arr_area=array();
		// 	while($bwt=mysql_fetch_assoc($res_area)){$arr_area[$i]=$bwt['id'];$i++;}

		// 	$i=0;
		// 	$arr_producttype=array();
		// 	while ($bwt=mysql_fetch_assoc($res_producttype)){$arr_producttype[$i]=$bwt['id'];$i++;}

		// 	$i=0;
		// 	foreach ($arr_area as $key => $value) {
		// 			foreach ($arr_producttype as $k => $v) {
		// 				$arr[$i]=$value.'/p/'.$v.'.html';$i++;
		// 			}
		// 	}
		// 	return $arr;
		// 	break;
		case '8':
			$arr=array();

			$arr[0]=$GLOBALS['ht'].'about.html';
			return $arr;
			break;
		case '9':
			$arr=array();
			$arr[0]=$GLOBALS['ht'].'contact.html';
			return $arr;
			break;
		default:
			break;
		
	}
	$i=0;
	$res=mysql_query($sql,$con);
	while($bwt=mysql_fetch_assoc($res)){
		$arr[$i]=$bwt['id'];
		$i++;
	}

	return $arr;
}
$file='Sitemap.xml';
if(file_exists($file)){
	$time=get_lastmod($file);
	$t=date('Y-m-d',time());
	if($t!=$time){
		$h=create_xml($file);
		for ($n=1; $n <10 ; $n++) { 
			if($n==6||$n==7){
			}else{
				$c='weekly';
				$url=get_url($n);
				wt($h,$url,$t,$c,$n);
			}
		}
	}
}else{
	$t=date('Y-m-d',time());
	$h=create_xml($file);
	for ($n=1; $n <10 ; $n++) { 
		if($n==6||$n==7){
			
		}else{
			$c='weekly';
			$url=get_url($n);
			wt($h,$url,$t,$c,$n);
		}
		
	}

}

function get_lastmod($xml){
	$reader = new XMLReader();
 	$reader->open($xml);
  	$reader->read();
	while($reader->read()){
		while($reader->localName=='lastmod'){
			$reader->read();
			return $reader->value;
		}
	}
}
?>