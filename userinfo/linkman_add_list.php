<?
require_once('../lib07/auto_load.php');
require_once('../lib07/pages.inc.php');
if(!defined('dbzz_net')) {
	exit('Access Denied');
}
require_once('../lib07/islogin.php');
$userid=$_SESSION["userdlname"];
//modify
$departmentid=$_SESSION["departmentid"];
$parentid=$_SESSION["parentid"];
?>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<link href="../css/style.css" rel="stylesheet" type="text/css" />
<link href="../css/inputstyle.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="../js/lefttoggler.js"></script> 
<script language="javascript">
<!--
function FormCheck() 
{

  if (myform.xingming.value=="")
  {
    alert("�ͻ���������Ϊ�գ�");
    document.myform.xingming.focus();
    return false;
  }
   if (myform.clientname.value=="")
  {
    alert("�����ͻ����Ʋ���Ϊ�գ�");
    document.myform.clientname.focus();
    return false;
  }
  if (myform.officetel.value=="")
  {
    alert("��ѡ��д�칫�̻�");
    document.myform.officetel.focus();
    return false;
  }  
 
  if (myform.address.value=="")
  {
    alert("����ѡ��д��ϵ����ϵ��ַ��");
    document.myform.address.focus();
    return false;
  }  
  

 
    
  return true;  
}

  function   openSubWindow(){   
    window.open("linkman_select_client.php","mywin",   "menubar=no,width=410,height=480,resizeable=yes");   
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
          <td>&nbsp;�ͻ���Դ����->������ϵ��</td>
  </tr>
</table>


<table border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#CCCCCC"  class="bianmamanage" style="padding:0px;">
  <tr> 
          <td bgcolor="#EBEBEB" class="tishi">&nbsp;������ϵ��(<font color="#FF0000">*����д</font>)</td>
  </tr>
  <tr> 
    <td bgcolor="#FFFFFF" height="30" style="padding:0px;border-bottom:1px solid #C6CBEE;"> 
	<form name="myform" method="post" action="linkman_addto.php" onsubmit="return FormCheck();" style="padding:0px;margin:0px 0px 0px 0px;">
	          <table width="100%" border="0" cellspacing="0" cellpadding="0" >
                <tr> 
                  <td   class="crm_td">sales name��</td>
                  <td   class="crm_input"><input name="userid" type="text" value="<?=$_SESSION["userdlname"];?>" id="userid" size="20" maxlength="30" readonly></td>
                  <td align="right"   class="crm_td">������Դ��</td>
                  <td   class="crm_tdright"> <select name=xiansuo size=1 id="xiansuo" class="crm_select">
                      <OPTION value="��" selected>-��-</OPTION>
                      <OPTION value="���" >-���-</OPTION>
                      <OPTION value="�����绰" >-�����绰-</OPTION>
                      <OPTION value="���׻�" >-���׻�-</OPTION>
                      <OPTION value="�������" >-�������-</OPTION>
                      <OPTION value="�ⲿ����" >-�ⲿ����-</OPTION>
                      <OPTION value="����ý��" >-����ý��-</OPTION>
                      <OPTION value="�����ʼ�" >-�����ʼ�-</OPTION>
                      <OPTION value="��������" >-��������-</OPTION>
                      <OPTION value="����" >-����-</OPTION>
                    </select></td>
                </tr>
                <tr> 
                  <td width="15%"   class="crm_td"> <font color="#FF0000">*</font>������</td>
                  <td width="45%"   class="crm_input"> 
                    <input name="xingming" type="text" id="xingming" size="10" maxlength="10" >
                    <select name=sex size=1 id="sex" class="crm_select">
                      <option value="" selected>-�Ա�-</option>
                      <option value="����" >-����-</option>
                      <option value="Ůʿ" >-Ůʿ-</option>
                    </select> </td>
                  <td width="40%" align="right"   class="crm_td">ְ��</td>
                  <td width="40%"   class="crm_tdright"> <input name="zhiwu"  type="text"  id="zhiwu" size="20"  maxlength="30"> 
                </tr>
                <tr> 
                  <td   class="crm_td"><font color="#FF0000">*</font>�����ͻ����ƣ�</td>
                  <td   class="crm_input"><input name="clientname" readonly type="text" id="clientname" size="30" maxlength="40" >&nbsp;<INPUT   class="submit" TYPE="button"   onclick="openSubWindow();"   value="ѡ��">
                    <input type="hidden" name="clientid"  id="clientid"> </td>
                  <td align="right"   class="crm_td">���ţ�</td>
                  <td   class="crm_tdright"><input name="bumen"  type="text"  id="bumen" size="20"  maxlength="30"></td>
                </tr>
                <tr> 
                  <td   class="crm_td">�ʼ���</td>
                  <td   class="crm_input"><input name="email" type="text" id="email" size="30" maxlength="40" > 
                  </td>
                  <td align="right"   class="crm_td">סլ�绰��</td>
                  <td   class="crm_tdright"><input name="hometel"  type="text"  id="hometel" size="20"  maxlength="30"> 
                  </td>
                </tr>
                <tr id=chinaaddress1> 
                  <td   class="crm_td"><font color="#FF0000">*</font>�칫�̻���</td>
                  <td   class="crm_input"><input name="officetel"  type="text"  id="hometel3" size="20"  maxlength="30"> 
                  </td>
                  <td align="right"   class="crm_td">�ֻ���</td>
                  <td   class="crm_input"><input name="mobile"  type="text"  id="mobile" size="30"  maxlength="50"> 
                  </td>
                </tr>
                <tr> 
                  <td   class="crm_td">���棺</td>
                  <td  id=areacodetd class="crm_input"><input name="fax"  type="text"  id="hometel4" size="20"  maxlength="30"></td>
                  <td align="right"   class="crm_td">���գ�</td>
                  <td   class="crm_tdright"><script type="text/javascript" src="../js/date_select.js"></script> 
                    <input name="birthday" type="text"  id="birthday" size="20" onClick="return Calendar('birthday');" maxlength="30"></td>
                </tr>
                <tr> 
                  <td   class="crm_td">QQ��</td>
                  <td   class="crm_input"><input name="qq"  type="text"  id="fax" size="20"  maxlength="30"></td>
                  <td align="right"   class="crm_td">Skype ID��</td>
                  <td   class="crm_tdright"><input name="skypeid"  type="text"  id="skypeid" size="20"  maxlength="30"></td>
                </tr>
                <tr> 
                  <td   class="crm_td">����</td>
                  <td   class="crm_input"><input name="zhuli"  type="text"  id="zhuli" size="20"  maxlength="30"></td>
                  <td align="right"   class="crm_td">����绰��</td>
                  <td   class="crm_tdright"> <input name="zhulitel"  type="text"  id="zhuli3" size="20"  maxlength="30"></td>
                </tr>
                <tr> 
                  <td   class="crm_td"><font color="#FF0000">*</font>��ϸ��ַ��</td>
                  <td   class="crm_input"><input name="address" type="text" id="address" size="35" maxlength="40" ></td>
                  <td align="right"   class="crm_td">�ʱࣺ</td>
                  <td   class="crm_tdright"><input name="postcode"  type="text"  id="postcode" size="10"  maxlength="10"></td>
                </tr>
                <tr> 
                  <td   class="crm_td">��ע��</td>
                  <td colspan="3"   class="crm_input"><textarea name="beiz" cols="85" rows="5"  id="beiz" onkeyUp="textLimitCheck(this, 500);"></textarea>
                    <br>
                    �ͻ���Ȥ�����á���Ŀǰ��ϵ�����500���֣� </td>
                </tr>
                <tr align="center"> 
                  <td colspan="5"   class="crm_submit"> <input type="submit" name="Submit" class="submit" value="-ȷ���½�-"> 
                    &nbsp;&nbsp;&nbsp;&nbsp; <input type="reset" name="Submit2" class="submit" value="-����-"> 
                    &nbsp;&nbsp;&nbsp;&nbsp; <input type="button" value="-����-" onClick="history.go(-1)" class="buttons"> 
                  </td>
                </tr>
              </table>

        </form></td>
  </tr>
  <tr>
    <td bgcolor="#FFFFFF" height="30" style="padding:3px;line-height:22px;"><strong>˵����</strong><br>
      1�����ͻ�����ϵ��ʽ���뾡����ϸ��д <font color="#FF0000">*</font>Ϊ������д��<br>
      2����ϸ��ַĬ��Ϊ��ҵͨ�ŵ�ַ����Ϊ��ͥ��ַ���޸ġ�
    </td>
  </tr>
</table>
<br>