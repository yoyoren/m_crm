<?
require_once('../lib07/auto_load.php');
if(!defined('dbzz_net')) {
	exit('Access Denied');
}
require_once('../lib07/islogin.php');

$userid=addslashes(trim($_POST['userid']));
$leix=addslashes(trim($_POST['leix']));
$marketname=chkstring(addslashes(trim($_POST['marketname'])));
$zhuangt=chkstring(addslashes(trim($_POST['zhuangt'])));
$kaisrq=chkstring(addslashes(trim($_POST['kaisrq'])));

$jiesrq=chkstring(addslashes(trim($_POST['jiesrq'])));
$qiwsy=chkstring(addslashes(trim($_POST['qiwsy'])));	
$qiwcgl=chkstring(addslashes(trim($_POST['qiwcgl'])));
$yuscb=chkstring(addslashes(trim($_POST['yuscb'])));
$shijcb=chkstring(addslashes(trim($_POST['shijcb'])));
$facsl=chkstring(addslashes(trim($_POST['facsl'])));
 
$remark=change2(chkstring(addslashes(trim($_POST['beiz']))));

$username=$_SESSION["username1"];

$zcdate=date('Y-m-d H:i:s', time());	
$sqllog="insert into market(userid,leix,marketname,zhuangt,starttime,endtime,qiwsy,qiwcgl,yuscb,shijcb,facsl,remark,addtime,username) values ('$userid','$leix','$marketname','$zhuangt','$kaisrq','$jiesrq','$qiwsy','$qiwcgl','$yuscb','$shijcb','$facsl','$remark','$zcdate','$username')";
//echo $sqllog;
//exit;
$result=$obj->exec($sqllog);
	if($result)
		{
 
						echo "<script language=javascript>alert('�г����Ϣ�ɹ�����!');history.go(-1);</script>";
						exit;						
 							

			}
		else
		{
			echo "<script language=javascript>alert('�г����Ϣ����ʧ�ܣ�����ϵͳ����Ա��ϵ!');history.go(-1);</script>";
			exit;
			}

?>