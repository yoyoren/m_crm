<?
require_once('../lib07/auto_load.php');
if(!defined('dbzz_net')) {
	exit('Access Denied');
}
require_once('../lib07/islogin.php');
$id=addslashes(trim($_GET['id']));

//exit;
//��ɾ����Ϣ����������ݣ�
		$delsql="delete from userinfo where id='".$id."'";
		if ($rsdel = mysql_query($delsql))
		{

					echo "<script language=javascript>alert('�û�ɾ���ɹ���');document.location.href=('user_manage_list.php');</script>";
					exit;				
			}
			else
			{
						echo "<script language=javascript>alert('�û�ɾ������');document.location.href=('user_manage_list.php');</script>";
						exit;						
				}

?>