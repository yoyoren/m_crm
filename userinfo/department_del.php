<?
require_once('../lib07/auto_load.php');
if(!defined('dbzz_net')) {
	exit('Access Denied');
}
require_once('../lib07/islogin.php');
$id=addslashes(trim($_GET['id']));

		$querysql="select id from userinfo where departmentid='".$id."'";

		$delsql="delete from department where departmentid='".$id."'";
		$re=$obj->exec($querysql);
		$rows=$obj->num_rows($re);
		if($rows<=0)
		{
			if ($rsdel = mysql_query($delsql))
			{
						echo "<script language=javascript>alert('����ɾ���ɹ���');document.location.href=('department_add_list.php');</script>";
						exit;				
				}
				else
				{
							echo "<script language=javascript>alert('����ɾ������');document.location.href=('department_add.php');</script>";
							exit;						
					}
					
				}
		else
		{
			echo "<script language=javascript>alert('�����г�Ա��');document.location.href=('department_add_list.php');</script>";
				exit;
		}

?>