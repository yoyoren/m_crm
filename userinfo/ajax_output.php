<?
header("Content-type: text/html;charset=GB2312");//�������,������������
require_once('../lib07/auto_load.php');
if(!defined('dbzz_net')) {
	exit('Access Denied');
}
require_once('../lib07/islogin.php');
//      echo $_POST['user_name']."<br>";
//      echo $_POST['user_age']."<br>";
//      echo $_POST['user_sex'];
      $user_name=$_POST['user_name'];
      $user_age=$_POST['user_age'];
      $user_sex=$_POST['user_sex'];
$zcdate=date('Y-m-d H:i:s', time());			
$sql="insert into userinfo(userid,userpwd,username) values ('$user_name','$user_age','$user_sex')";
echo $sql;
$result=$obj->exec($sql);
	if($result)
		{
			echo "1";
//			echo "<script language=javascript>alert('�û���Ϣ�ɹ�����!');document.location.href=('user_add.php');</script>";
			exit;
			}
		else
		{
			echo "<script language=javascript>alert('�û���Ϣ����ʧ�ܣ�����ϵͳ����Ա��ϵ!');document.location.href=('user_add.php');</script>";
			exit;
			}      
?>
