<?
require_once('../lib07/auto_load.php');
if(!defined('dbzz_net')) {
	exit('Access Denied');
}
require_once('../lib07/islogin.php');
$userid=chkstring(addslashes(trim(isset($_POST['userid'])?$_POST['userid']:"")));
$old_pwd=chkstring(addslashes(trim($_POST['old_pwd'])));
$userpwd=chkstring(addslashes(trim($_POST['userpwd'])));
$userpwdconfirm=chkstring(addslashes(trim($_POST['userpwdconfirm'])));
$userid=$_SESSION["userdlname"];
//modify
$departmentid=$_SESSION["departmentid"];
$parentid=$_SESSION["parentid"];
	//��鲿���и�������
	$sqlbm="select * from userinfo where userid='".$userid."'";
	$rsbm=$obj->fetchrow($sqlbm);
	$dbuserpwd=trim($rsbm->userpwd);
//	echo $allid;
//	exit;
		if($dbuserpwd<>$old_pwd)
			{
					echo "<script language=javascript>alert('ԭ���벻�ԣ��뷵���������룡');history.go(-1)</script>";
					exit;
			}


$sql="update userinfo set userpwd='".$userpwd."' where userid='".$userid."'";
//echo $sql;
$result=$obj->exec($sql);
	if($result)
		{
			echo "<script language=javascript>alert('�����޸ĳɹ�!');document.location.href=('user_mody_pwd_list.php');</script>";
			exit;
			}
		else
		{
			echo "<script language=javascript>alert('�����޸�ʧ�ܣ�����ϵͳ����Ա��ϵ!');document.location.href=('user_mody_pwd_list.php');</script>";
			exit;
			}

?>