<?
require_once('../lib07/auto_load.php');

if(!defined('dbzz_net')) {
	exit('Access Denied');
}
require_once('../lib07/islogin.php');
$classname=chk_num(chkstring(addslashes(trim($_POST['classname']))));
$id=chk_num(chkstring(addslashes(trim($_POST['id']))));
$type=chk_num(chkstring(addslashes(trim($_POST['type']))));

if (strcmp($type,"edit")==0)
{
//	echo $classname." type=".$type." id=".$id;

		//��鵱ǰID���Ƿ������࣬�����ø�����
	$sql="select classname from small_class where bid='".$id."'";
		if($rs=$obj->exec($sql))
			{
				if($obj->num_rows($rs))
				{
					mssql_free_result($rs);
						echo "<script language=javascript>alert('��ǰ�����������࣬�������������ɾ������С����ٸĴ�������');window.location='base.php'</script>";
						exit;
				}	
	
			}
			else 
			{
					echo "<script language=javascript>alert('�������ݿ����312');history.go(-1)</script>";
					exit;	
			}
			
	$sql="update small_class set classname='".$classname."' where id='".$id."'";	
			$result=$obj->exec($sql);
				if($result)
					{
						echo "<script language=javascript>alert('������Ϣ�༭�ɹ�!');document.location.href=('base.php');</script>";
						exit;
						}
					else
					{
						echo "<script language=javascript>alert('������Ϣ�༭ʧ�ܣ�����ϵͳ����Ա��ϵ!');document.location.href=('base.php');</script>";
						exit;
						}	
	}
	else
	{
				//����û������ݿ��з��Ѿ�����
				if ($classname=="") echo "<script language=javascript>alert('������ϢΪ��!');document.location.href=('base.php');</script>";
				$sql="select classname from small_class where classname='".$classname."'";
				
					if($rs=$obj->exec($sql))
						{
							if($obj->num_rows($rs))
							{
								mssql_free_result($rs);
								echo "<script language=javascript>alert('�˷��������Ѿ����ڣ�����������!');history.go(-1)</script>";
								exit;
							}	
				
						}
						else 
						{
								echo "<script language=javascript>alert('���ݿ����5');history.go(-1)</script>";
								exit;	
						}
				$strbid="0";		
				$sql="select * from small_class where bid='".$strbid."'";
				$queryresult=$obj->exec($sql);
				$ggallrows=$obj->num_rows($queryresult);
				if ($ggallrows>=100)
				{
						echo "<script language=javascript>alert('�������Ϊ99����Ŀǰ�Ѿ�����������������!');document.location.href=('base.php');</script>";
						exit;		
					}
					
				$sql="select max(classcode) as classcode from small_class where bid='".$strbid."'";
				$rs=$obj->fetchrow($sql);
				$bigestcode=$rs->classcode;
				$bigestcode=$bigestcode+1;
				$len=strlen($bigestcode);
				if ($len==1) 
				{
					$bigestcode="0".$bigestcode;
					}
				if ($len>=3)
				{
						echo "<script language=javascript>alert('����Ϊ0-99��Ŀǰ�Ѿ�����������������!');document.location.href=('base.php');</script>";
						exit;		
					}
			
				$sql="select max(id) as id from small_class";
				$rs=$obj->fetchrow($sql);
				$bid=$rs->id;
				$bid=$bid+1;
				
			$upcode="0";			
			$sql="insert into small_class(id,classname,classcode,bid,code) values ('$bid','$classname','$bigestcode','$upcode','$bigestcode')";
			$result=$obj->exec($sql);
				if($result)
					{
						echo "<script language=javascript>alert('������Ϣ�ɹ�����!');document.location.href=('base.php');</script>";
						exit;
						}
					else
					{
						echo "<script language=javascript>alert('������Ϣ����ʧ�ܣ�����ϵͳ����Ա��ϵ!');document.location.href=('base.php');</script>";
						exit;
						}
			}
?>