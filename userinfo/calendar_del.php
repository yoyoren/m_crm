<?
require_once('../lib07/auto_load.php');
if(!defined('dbzz_net')) {
	exit('Access Denied');
}
require_once('../lib07/islogin.php');
$id=addslashes(trim($_GET['id']));

//exit;
//��ɾ����Ϣ����������ݣ�
		$delsql="delete from calendar where id='".$id."'";
		if ($rsdel = mysql_query($delsql))
		{

					echo "<script language=javascript>alert('����ɾ���ɹ���');document.location.href=('calendar_manage_list.php');</script>";
					exit;				
			}
			else
			{
						echo "<script language=javascript>alert('ɾ������');document.location.href=('chance_manage_list.php');</script>";
						exit;						
				}

?>