<?
require_once('../lib07/auto_load.php');
if(!defined('dbzz_net')) {
	exit('Access Denied');
}
require_once('../lib07/islogin.php');
$id=addslashes(trim($_GET['id']));

//exit;
//先删除信息留言里的数据；
		$delsql="delete from meddic where id='".$id."'";
		if ($rsdel = mysql_query($delsql))
		{

					echo "<script language=javascript>alert('MEDDIC分析数据删除成功！');history.go(-1);</script>";
					exit;				
			}
			else
			{
						echo "<script language=javascript>alert('删除错误！');history.go(-1);</script>";
						exit;						
				}

?>