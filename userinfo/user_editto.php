<?
require_once('../lib07/auto_load.php');
if(!defined('dbzz_net')) {
	exit('Access Denied');
}
require_once('../lib07/islogin.php');
$userid=chkstring(addslashes(trim(isset($_POST['userid'])?$_POST['userid']:"")));
$userpwd=chkstring(addslashes(trim(isset($_POST['userpwd'])?$_POST['userpwd']:"")));
$username=chkstring(addslashes(trim(isset($_POST['username'])?$_POST['username']:"")));
$xingb=chkstring(addslashes(trim(isset($_POST['xingb'])?$_POST['xingb']:"")));
$usertel=chkstring(addslashes(trim(isset($_POST['usertel'])?$_POST['usertel']:"")));
$usermail=chkstring(addslashes(trim(isset($_POST['usermail'])?$_POST['usermail']:"")));
$department=chkstring(addslashes(trim(isset($_POST['department'])?$_POST['department']:"")));
	$bigls=split("\|",$department);
	$departmentname=$bigls[1];
	$departmentid=$bigls[0]; 
	$a=chkstring(addslashes(trim(isset($_POST['fuze'])?$_POST['fuze']:"")));
$parentid=($a==1)?0:$departmentid;
if($bigls[2]==-1)
{
	$parentid=-1;
}
$zcdate=date('Y-m-d H:i:s', time());			
//$fuze=chkstring(addslashes(trim($_POST['fuze']))); 


	//��鲿���и�������
	//$sqlbm="select count(id) as allid from userinfo where departmentname='".$departmentname."' and fuze=1";
	$sqlbm="select count(id) as allid from userinfo where departmentname='".$departmentname."' and parentid=0";
	$rsbm=$obj->fetchrow($sqlbm);
	$allid=trim($rsbm->allid);
//	echo $allid;
//	exit;
		if($allid>$global_departmenttotal)
			{
					
//					mssql_free_result($rsbm);
					echo "<script language=javascript>alert('���������Ϊ3������ϵͳ����Ա��config�н������ã�');history.go(-1)</script>";
					exit;
			}


/*$sql="update userinfo set userpwd='".$userpwd."'".","."username='".$username."'".","."xingb='".$xingb."'".","."usertel='".$usertel."'".","."usermail='".$usermail."'".","."modytime='".$zcdate."'".","."departmentname='".$departmentname."'".","."departmentid='".$departmentid."'".","."fuze='".$fuze."' where userid='".$userid."'";*/
$sql="update userinfo set userpwd='".$userpwd."'".","."username='".$username."'".","."xingb='".$xingb."'".","."usertel='".$usertel."'".","."usermail='".$usermail."'".","."modytime='".$zcdate."'".","."departmentname='".$departmentname."'".","."departmentid='".$departmentid."'".","."parentid='".$parentid."' where userid='".$userid."'";
//echo $sql;
$result=$obj->exec($sql);
	if($result)
		{
			echo "<script language=javascript>alert('�û���Ϣ�ɹ��޸�!');document.location.href=('user_manage_list.php');</script>";
			exit;
			}
		else
		{
			echo "<script language=javascript>alert('�û���Ϣ�ɹ��޸�ʧ�ܣ�����ϵͳ����Ա��ϵ!');document.location.href=('bianma_manage.php');</script>";
			exit;
			}

?>