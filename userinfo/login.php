<?
require_once('../lib07/auto_load.php');
if(!defined('dbzz_net')) {
	exit('Access Denied');
}
$userid=chkstring(strtolower(addslashes(trim($_POST['userid']))));	
$userpwd=chkstring(strtolower(addslashes(trim($_POST['pwd']))));
//echo $userid;
//exit;
$sql="select * from userinfo where userid='".$userid."' and userpwd='".$userpwd."'";
	$rs=$obj->fetchrow($sql);
	if ($rs)
	{
						$username=$rs->username;
						$_SESSION["userdlname"]=$userid;
						$_SESSION["username1"]=$username;
						$_SESSION["isfuze"]=trim($rs->fuze);
						//�Ķ�
						$_SESSION["departmentid"]=trim($rs->departmentid);
						$_SESSION["parentid"]=trim($rs->parentid);
 
						echo "<script language=javascript>document.location.href=('desktop_manage.php');</script>";		
		}
		else
		{
						echo "<script language=javascript>alert('�û�ID��������������µ�¼��');document.location.href=('../index.php');</script>";
						exit;				
			}


?>