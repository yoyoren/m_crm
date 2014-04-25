<?php
//header("Pragma: no-cache");  
//header("Expires: 0");  
session_start();
$act=$_SESSION["act"];;
$filename=$act==chance?"销售管理":"跟进管理";

header("Content-type: application/vnd.ms-excel; charset=utf-8");
header("Content-Disposition: attachment; filename=$filename.xls");
$data="";
$top=$act==chance?$_SESSION["chancetop"]:$_SESSION["calendartop"];
$tablecontent=$act==chance?$_SESSION["chancecontent"]:$_SESSION["calendarcontent"];

foreach($top as $value)
{
	$data.=$value."\t";
}
$data.="\n";
foreach($tablecontent as $key=>$value)
{
	$data.=($key+1)."\t";
	foreach($value as $k=>$val)
	{
		if($act==chance&&($k=="itemname"||$k=="clientname"||$k=="linkname"||$k=="itemmoney"||$k=="possibility"))
		{
			$data.=$val."\t";
		}
		if($act==calendar&&($k=="rctitle"||$k=="clientname"||$k=="linkname"||$k=="activitytype"||$k=="jhtime"))
		{
			$data.=$val."\t";
		}
	}
	$data.="\n";	
}
/*$encode = mb_detect_encoding($data, array("ASCII","UTF-8","GB2312","GBK","BIG5")); 
if ($encode =="UTF-8")
{ 
	$data = iconv("UTF-8","GB2312",$data);
}
if ($encode =="GBK")
{ 
	$data = iconv("GBK","GB2312",$data);
}*/
echo $data. "\t";
?>


