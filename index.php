<?php
include('lib07/function_form.inc.php');
include('lib07/config.inc.php');
if(!defined('dbzz_net')) {
	exit('Access Denied');
}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title><?php echo $global_websitename;?></title>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<link href="css/style.css" rel="stylesheet" type="text/css" />
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
document.myform.userid.focus();
//document.myform.username.select();
return false; 
}   
 if (myform.pwd.value=="")
  {
    alert("������д���룡");
    document.myform.pwd.focus();
    return false;
  } 
var filter=/^\s*[A-Za-z0-9_-]{4,20}\s*$/;
if (!filter.test(document.myform.pwd.value)) { 
alert("������д����ȷ,��������д����ʹ�õ��ַ�Ϊ��A-Z a-z 0-9 �»��� ���ţ����Ȳ�С��4���ַ���������20���ַ���ע�ⲻҪʹ�ÿո�"); 
document.myform.pwd.focus();
document.myform.pwd.select();
return false; 
}   
   
  return true;  
}

//function shutwin(){opener=null;self.close();}
//
//function showme1() {
//window.open("","pop","scrollbars=no,status=yes,resizable=yes,top=0,left=0,width="+(screen.availWidth-10)+",height="+(screen.availHeight-30)+",channelmode=no");
//shutwin();
//}

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
</head>

<body style="background:#145597 url(myimages/one/login_back.gif) repeat-x top;" scroll=no>
<table width="1004" height="618" border="0"  cellpadding="0" cellspacing="0" background="myimages/1/loginback.jpg">
  <tr>
    <td align="center" ><table width="498" height="222" border="0" cellpadding="0" cellspacing="9" bgcolor="215992">
        <tr>
          <td background="myimages/1/loginback_mid.jpg" bgcolor="#FFFFFF"><table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td height="40"  class="websitename">&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $global_websitename;?>��¼</td>
              </tr>
              <tr>
                <td><form name="myform" method="post" onSubmit="return FormCheck();" action="userinfo/login.php">
                    <table width="100%" border="0" cellspacing="0" cellpadding="2">
                      <tr> 
                        <td width="25%" height="40" align="right"><font color="#0057AE">�û�ID��</font></td>
                        <td width="38%"><input name="userid" type="text" id="userid" style="width:148px;padding-bottom:2px;padding-left:3px;line-height:22px;margin:0px auto;" tabindex=1  size="18" maxlength="20"></td>
                        <td width="37%" rowspan="2"><input type="image" src="myimages/1/loginbutton.gif" name="Submit" style="height:62px;width:62px;border:0px;" width="62" height="62" tabindex=3 value="-���̵�¼-" >
                         </td>
                      </tr>
                      <tr> 
                        <td height="40" align="right"><font color="#0057AE">���룺</font></td>
                        <td><input name="pwd" type="password" id="pwd" style="width:148px;padding-bottom:2px;line-height:22px;padding-left:3px;margin:0px auto;" tabindex=2  size="20" maxlength="20" ></td>
                      </tr>
                    </table>
                  </form></td>
              </tr>
              <tr>
                <td height="40" style="color:#53a3c6;line-height:22px;">&nbsp;&nbsp;&nbsp;&nbsp;֧�ֵ�������������������Ӧ�õ�CRMϵͳ��<br>&nbsp;&nbsp;&nbsp;&nbsp;
</td>
              </tr>
            </table></td>
        </tr>
      </table></td>
  </tr>
</table>
</body>
</html>
