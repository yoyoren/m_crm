<?
require_once('../lib07/auto_load.php');
require_once('../lib07/pages.inc.php');
if(!defined('dbzz_net')) {
	exit('Access Denied');
}
require_once('../lib07/islogin.php');
$userid=$_GET['userid'];

	$sql="select * from userinfo where userid='".$userid."'";
//	echo $sql;
	$rs=$obj->fetchrow($sql);
	$userpwd=trim($rs->userpwd);
	$username=trim($rs->username);
	$xingb=trim($rs->xingb);
	$usertel=trim($rs->usertel);
	$usermail=trim($rs->usermail);
	$department_id=trim($rs->departmentid);
	$fuze=trim($rs->fuze);
//	echo $department_id;
	if ($username=="")
	{
			echo "<script language=javascript>alert('�û����ݴ���3');document.location.href=('user_manage.php');</script>";
			exit;			
		}
?>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<link href="../css/style.css" rel="stylesheet" type="text/css" />
<link href="../css/inputstyle.css" rel="stylesheet" type="text/css" />
<script language="javascript">
<!--
function FormCheck() 
{

  if (myform.userid.value=="")
  {
    alert("������д�û�ID��");
    document.myform.userid.focus();
    return false;
  }
  
var filter=/^\s*[A-Za-z0-9_-]{4,20}\s*$/;
if (!filter.test(document.myform.userid.value)) { 
alert("�û�����д����ȷ,��������д����ʹ�õ��ַ�Ϊ��A-Z a-z 0-9 �»��� ���ţ����Ȳ�С��4���ַ���������20���ַ���ע�ⲻҪʹ�ÿո�"); 
document.myform.username.focus();
//document.myform.username.select();
return false; 
}   
  
  if (myform.userpwd.value=="")
  {
    alert("������д���룡");
    document.myform.userpwd.focus();
    return false;
  }  
  
var filter=/^\s*[A-Za-z0-9_-]{4,20}\s*$/;
if (!filter.test(document.myform.userpwd.value)) { 
alert("������д����ȷ,��������д����ʹ�õ��ַ�Ϊ��A-Z a-z 0-9 �»��� ���ţ����Ȳ�С��4���ַ���������20���ַ���ע�ⲻҪʹ�ÿո�"); 
document.myform.userpwd.focus();
document.myform.userpwd.select();
return false; 
}   
  
  if (myform.userpwdconfirm.value=="")
  {
    alert("������дȷ�����룡");
    document.myform.userpwdconfirm.focus();
    return false;
  }    

if (document.myform.userpwd.value!=document.myform.userpwdconfirm.value ){
alert("������д�����벻һ�£���������д��"); 
document.myform.userpwd.focus();
document.myform.userpwd.select();
return false; 
}   
	
  if (myform.username.value=="")
  {
    alert("������д������");
    document.myform.username.focus();
    return false;
  } 
  if (myform.xingb.value=="")
  {
    alert("����ѡ���Ա�");
    document.myform.xingb.focus();
    return false;
  }
  if (myform.department.value=="")
  {
    alert("����ѡ���������ţ�");
    document.myform.department.focus();
    return false;
  }  
           
  if (myform.usertel.value=="")
  {
    alert("������д�绰��");
    document.myform.usertel.focus();
    return false;
  } 


  if (myform.usermail.value=="")
  {
    alert("������д�����ʼ���");
    document.myform.usermail.focus();
    return false;
  }   
  
var str1 = document.myform.usermail.value
if(str1.indexOf("@") == -1 || str1.indexOf(".") == -1){ 
alert("E-mail��ʽ����ȷ,��������д��"); 
document.myform.usermail.focus();
document.myform.usermail.select();
return false; 
}   
  
  
  return true;  
}


function yesvalue()
{
	if(document.getElementById("fuze").checked==true)
	{
		document.getElementById("fuze").value=1;
	}
}

function textLimitCheck(thisArea, maxLength)
{
    if (thisArea.value.length > maxLength)
	{
      alert(maxLength + ' ��������. \r�����Ľ��Զ�ȥ��.');
      thisArea.value = thisArea.value.substring(0, maxLength);
      thisArea.focus();
    }
    /*��дspan��ֵ����ǰ��д���ֵ�����*/
   
  }


//-->
</script>

<table  border="0" class="daohang" cellspacing="0" cellpadding="0">
  <tr>
    <td>&nbsp;�û�����->�༭�û���Ϣ</td>
  </tr>
</table>
<br>

<table border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#CCCCCC" class="inputtable" style="padding:0px;">
  <tr> 
    <td bgcolor="#EBEBEB" class="tishi">&nbsp;�༭�û���Ϣ(����ȫ������Ϊ��)</td>
  </tr>
  <tr> 
    <td bgcolor="#FFFFFF" height="30" style="padding:0px;border-bottom:1px solid #C6CBEE;"> 
	<form name="myform" method="post" action="user_editto.php" onsubmit="return FormCheck();" style="padding:0px;margin:0px 0px 0px 0px;">
	    <table width="100%" border="0" cellspacing="0" cellpadding="0" >
          <tr> 
            <td   style="text-align:right;height:25px;line-height:25px;padding:2px;width:15%;border-bottom:1px solid #e8e8e8;border-right:1px solid #e8e8e8;">�û�ID��</td>
            <td   style="text-align:left;height:25px;line-height:25px;padding:2px;width:45%;border-bottom:1px solid #e8e8e8;border-right:1px solid #e8e8e8;">
              <?=$userid;?>
              <input type="hidden" name="userid" value="<?echo $userid;?>"></td>
            <td   style="text-align:left;height:25px;line-height:25px;padding:2px;width:40%;border-bottom:1px solid #e8e8e8;">��:�����ᣬ�û�ID����Ϊzhangsf(4-20λ)</td>
          </tr>
          <tr> 
            <td   style="text-align:right;height:25px;line-height:25px;padding:2px;width:15%;border-bottom:1px solid #e8e8e8;border-right:1px solid #e8e8e8;">���룺</td>
            <td   style="text-align:left;height:25px;line-height:25px;padding:2px;width:45%;border-bottom:1px solid #e8e8e8;border-right:1px solid #e8e8e8;"> 
              <input name="userpwd" type="text" value="<?=$userpwd;?>" id="userpwd" size="10" maxlength="20"></td>
            <td rowspan="2"   style="text-align:left;height:25px;line-height:25px;padding:2px;width:40%;border-bottom:1px solid #e8e8e8;">��ʹ�õ��ַ�Ϊ��A-Z 
              a-z 0-9 �»��� ���ţ����Ȳ�С��4���ַ���������20���ַ�</td>
          </tr>
          <tr> 
            <td   style="text-align:right;height:25px;line-height:25px;padding:2px;width:15%;border-bottom:1px solid #e8e8e8;border-right:1px solid #e8e8e8;">ȷ�����룺</td>
            <td   style="text-align:left;height:25px;line-height:25px;padding:2px;width:45%;border-bottom:1px solid #e8e8e8;border-right:1px solid #e8e8e8;"><input name="userpwdconfirm" type="text" value="<?=$userpwd;?>" id="userpwdconfirm" size="10" maxlength="20"></td>
          </tr>
          <tr> 
            <td   style="text-align:right;height:25px;line-height:25px;padding:2px;width:15%;border-bottom:1px solid #e8e8e8;border-right:1px solid #e8e8e8;">�û�������</td>
            <td   style="text-align:left;height:25px;line-height:25px;padding:2px;width:45%;border-bottom:1px solid #e8e8e8;border-right:1px solid #e8e8e8;"><input name="username" type="text" id="username" value="<?=$username;?>" size="10" maxlength="10"></td>
            <td   style="text-align:left;height:25px;line-height:25px;padding:2px;width:40%;border-bottom:1px solid #e8e8e8;">���ֻ��óƺ�</td>
          </tr>
          <tr> 
            <td   style="text-align:right;height:25px;line-height:25px;padding:2px;width:15%;border-bottom:1px solid #e8e8e8;border-right:1px solid #e8e8e8;">�Ա�</td>
            <td   style="text-align:left;height:25px;line-height:25px;padding:2px;width:45%;border-bottom:1px solid #e8e8e8;border-right:1px solid #e8e8e8;"> 
              <?
							$xingb=trim(str_replace("��","nan",$xingb));
							$xingb=trim(str_replace("Ů","nv",$xingb));

							?>
              <SELECT   name=xingb size=1 id="select" style="background-color:#F0F0F0;">
                <OPTION value="" >-��ѡ���Ա�-</OPTION>
                <OPTION value="��" <?if (strcmp($xingb,"nan")==0) echo"selected";?>>��</OPTION>
                <OPTION value="Ů" <?if (strcmp($xingb,"nv")==0) echo"selected";?>>Ů</OPTION>
              </SELECT></td>
            <td   style="text-align:left;height:25px;line-height:25px;padding:2px;width:40%;border-bottom:1px solid #e8e8e8;">&nbsp;</td>
          </tr>
          <tr>
            <td   style="text-align:right;height:25px;line-height:25px;padding:2px;width:15%;border-bottom:1px solid #e8e8e8;border-right:1px solid #e8e8e8;">�������ţ�</td>
            <td   style="text-align:left;height:25px;line-height:25px;padding:2px;width:45%;border-bottom:1px solid #e8e8e8;border-right:1px solid #e8e8e8;"> 
              <SELECT   name=department size=1 id="department" style="background-color:#F0F0F0;">
                <OPTION value="" selected>-��ѡ����-</OPTION>
				<OPTION value="0|admin|-1">-����Ա-</OPTION>
				<OPTION value="-1|manager|-1">-������-</OPTION>
                <?
          $fenleisql="select * from department";
				  $queryresult=$obj->exec($fenleisql);
				  $ggallrows=$obj->num_rows($queryresult);
				  $arrrow=$obj->fetch($queryresult);            
				for ($i=0;$i<$ggallrows;$i++)	
				{  
					$departmentname=trim($arrrow[$i]['departmentname']);
					$departmentid=trim($arrrow[$i]['departmentid']);
					if ($departmentid==$department_id) {$partid="selected";}
					else {$partid="";}
					echo "<OPTION value=".$departmentid."|".$departmentname." ".$partid.">-".$departmentname."|".$departmentid."-</OPTION>";
					
					}          
            ?>
              </SELECT>
			  <input name="fuze" type="checkbox" onclick="yesvalue()" id="fuze"> <label for="fuze">��/���Ÿ�����</label></td>
            <td   style="text-align:left;height:25px;line-height:25px;padding:2px;width:40%;border-bottom:1px solid #e8e8e8;">&nbsp;</td>
          </tr>
          <tr> 
            <td   style="text-align:right;height:25px;line-height:25px;padding:2px;width:15%;border-bottom:1px solid #e8e8e8;border-right:1px solid #e8e8e8;">�绰��</td>
            <td   style="text-align:left;height:25px;line-height:25px;padding:2px;width:45%;border-bottom:1px solid #e8e8e8;border-right:1px solid #e8e8e8;"><input name="usertel" type="text" value="<?=$usertel;?>" id="usertel" size="30" maxlength="40"></td>
            <td   style="text-align:left;height:25px;line-height:25px;padding:2px;width:40%;border-bottom:1px solid #e8e8e8;">�κε绰���룬��������԰�Ƕ���&quot;,&quot;�ָ�</td>
          </tr>
          <tr> 
            <td   style="text-align:right;height:25px;line-height:25px;padding:2px;width:15%;border-bottom:1px solid #e8e8e8;border-right:1px solid #e8e8e8;">�ʼ���</td>
            <td   style="text-align:left;height:25px;line-height:25px;padding:2px;width:45%;border-bottom:1px solid #e8e8e8;border-right:1px solid #e8e8e8;"><input name="usermail" type="text" value="<?=$usermail;?>" id="usermail" size="30" maxlength="40"></td>
            <td   style="text-align:left;height:25px;line-height:25px;padding:2px;width:40%;border-bottom:1px solid #e8e8e8;">���õ����ʼ�</td>
          </tr>
          <tr align="center"> 
            <td colspan="3"   style="text-align:center;height:25px;line-height:25px;padding:2px;width:15%;border-bottom:1px solid #e8e8e8;border-right:1px solid #e8e8e8;"><input type="submit" name="Submit" class="submit" value="-�޸�-"> 
              &nbsp;&nbsp;&nbsp;&nbsp; <input type="reset" name="Submit2" class="submit" value="-����-"> 
            </td>
          </tr>
        </table>

        </form></td>
  </tr>
  <tr>
    <td bgcolor="#FFFFFF" height="30" style="padding:3px;line-height:22px;"><strong>˵����</strong><br>
      1������ԱID:admin�����������ɾ����<br>
      2���û�IDһ�����ӣ�����ʹ�ô��û����ӹ��κ����ݺ󣬴�ID������ɾ����<br>
      3������ʧ���������û�IDΪ׼(������ͳ�Ƶ�)�����������Ʊ�������ID����¼�������޸����롣</td>
  </tr>
</table>