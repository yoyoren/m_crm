<?
require_once('../lib07/auto_load.php');
require_once('../lib07/pages.inc.php');
if(!defined('dbzz_net')) {
	exit('Access Denied');
}
require_once('../lib07/islogin.php');

?>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<link href="../css/style.css" rel="stylesheet" type="text/css" />
<link href="../css/inputstyle.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="../js/lefttoggler.js"></script>
<script language="javascript">
<!--
function FormCheck() 
{

  if (myform.rctitle.value=="")
  {
    alert("����д�ճ̱��⣡");
    document.myform.rctitle.focus();
    return false;
  }
 

         
    
  return true;  
}

 
  function   select_linkmans(){   
    window.open("calendar_select_linkman.php","mywin",   "menubar=no,width=410,height=480,resizeable=yes");   
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
          <td>&nbsp;��������->�½�����</td>
  </tr>
</table>


<table border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#CCCCCC"  class="bianmamanage" style="padding:0px;">
  <tr> 
          <td bgcolor="#EBEBEB" class="tishi">&nbsp;�½�����(<font color="#FF0000">*</font>����д)</td>
  </tr>
  <tr> 
    <td bgcolor="#FFFFFF" height="30" style="padding:0px;border-bottom:1px solid #C6CBEE;"> 
	<form name="myform" method="post" action="calendar_addto.php" onsubmit="return FormCheck();" style="padding:0px;margin:0px 0px 0px 0px;">
	          
        <table width="100%" border="0" cellspacing="0" cellpadding="0" >
          <tr> 
            <td   class="crm_td">sales name��</td>
            <td   class="crm_input"><input name="userid" type="text" value="<?=$_SESSION["userdlname"];?>" id="userid" size="20" maxlength="30" readonly>
              </td>
            <td align="right"   class="crm_td">�ճ����ͣ�</td>
            <td   class="crm_tdright"> <select name="activitytype" class="crm_select" >
                <option value="�绰�ݷ�">�绰�ݷ�</option>
                <option value="����">����</option>
                <option value="�����ʼ�">�����ʼ�</option>
                <option value="���Űݷ�">���Űݷ�</option>
                <option value="�ʼ�">�ʼ�</option>
                <option value="����">����</option>
                <option value="����">����</option>
				<option value="����">����</option>
              </select>
              <font color="#FF0000">&nbsp; </font></td>
          </tr>
          <tr> 
            <td width="15%"   class="crm_td"><font color="#FF0000">*</font>�������⣺ 
            </td>
            <!--ԭ������<td width="45%"   class="crm_input"><input name="rctitle" type="text" id="rctitle" size="30" maxlength="50" > </td>-->
            <!--�����-->
            <td   class="crm_tdright"> <select name="rctitle" class="crm_select" >
            <option value="��ѡ���������">��ѡ���������</option>
                <option value="��ͨĿ������10%������">��ͨĿ������10%������</option>
                <option value="��ͨĿ������25% ��ѿ��">��ͨĿ������25% ��ѿ��</option>
                <option value="��ͨĿ������75% ������">��ͨĿ������75% ������</option>
                <option value="��ͨĿ������100% ������">��ͨĿ������100% ������</option>
                <option value="100% �������� �ٴ���������">100% �������� �ٴ���������</option>
                <option value="����ȡ��">����ȡ��</option>
                <option value="����">����</option>
				<option value="����">����</option>
              </select>
              <font color="#FF0000">&nbsp; </font></td>
            <!--����ӽ���-->
            <td width="40%" align="right"   class="crm_td"><font color="#FF0000">&nbsp; 
              </font>�ݷÿͻ���</td>
            <td width="40%"   class="crm_tdright"><input name="clientname" type="text" id="clientname" size="30" maxlength="40" readonly> 
              <input type="hidden" name="clientid"  id="clientid"> <input name="select_linkman" type="button"   class="submit" id="select_linkman"   onClick="select_linkmans();"   value="ѡ��" title="ѡ��ͻ�ʱ����ϵ��Ҳ���Զ���д��"> 
          </tr>
          <tr> 
            <td   class="crm_td"><font color="#FF0000">&nbsp; </font>��ϵ�ˣ�</td>
            <td   class="crm_input"> <input name="linkname" type="text" id="linkname" readonly size="10" maxlength="20" > 
              <input type="hidden" name="linknameid"  id="linknameid"> </td>
            <td align="right"   class="crm_td"><font color="#FF0000">&nbsp; </font>�׶Σ�</td>
            <td   class="crm_tdright"> <select name="eventstatus" id="eventstatus" class=crm_select  >
                <option value="�Ѽƻ�" selected>�Ѽƻ�</option>
                <option value="������">������</option>
                <option value="δ��ʼ">δ��ʼ</option>
                <option value="δ���">δ���</option>
                <option value="����">����</option>
                <option value="�����">�����</option>
                <!--��ӿ�ʼ
              <OPTION value="10% ������" >-10% ������-</OPTION>
              <OPTION value="25% ��ѿ��" >-25% ��ѿ��-</OPTION>
              <OPTION value="50% ������" >-50% ������-</OPTION>
              <OPTION value="75% ������" >-75% ������-</OPTION>
              <OPTION value="90% ժ����" >-90% ժ����-</OPTION>
              <OPTION value="100% �����" >-100% �����-</OPTION>
            ��ӽ���-->
              </select> </td>
          </tr>
          <!--�Ƿ��Գ�-->
          <tr>
          <td   class="crm_td">
          <input name="yes" type="checkbox" id="yes" value="��">
             
          </td>
          <td   class="crm_input"> <label for="��">��/���͹��Գ�</label></td>
          <td align="right"   class="crm_td">
           �Գ����ڣ�
          </td>
                  <td   class="crm_tdright"><script type="text/javascript" src="../js/date_select.js"></script> 
                  
                    <input name="tryDate"  onClick="return Calendar('tryDate');" type="text"  id="tryDate" size="20"  maxlength="20"> 
                  </td>
          </tr>
           <!--�Ƿ��Գ�-->
          <tr id=chinaaddress1> 
            <td   class="crm_td"><font color="#FF0000">&nbsp; </font>�ƻ�ʱ�䣺</td>
            <td   class="crm_input"><script type="text/javascript" src="../js/date_select.js"></script> 
			<?
			$zcdate=date('Y-n-d', time());
			?>
              <input name="jhtime"  onClick="return Calendar('jhtime');" type="text"  value="<?=$zcdate;?>" id="jhtime" size="20"  maxlength="20">
              <select name="jhm" id="jhm" class=crm_select  >
                <option value="����" selected>����</option>
                <option value="����">����</option>
 
              </select> </td>
            <td align="right"   class="crm_td">�ص㣺</td>
            <td   class="crm_input"><input name="str_address" type="text" id="str_address" size="30" maxlength="50" ></td>
          </tr>
          <tr> 
            <td   class="crm_td">���ΰݷ����ݼ������</td>
            <td colspan="3"   class="crm_input"><textarea name="beiz" cols="85" rows="6"  id="beiz" onkeyUp="textLimitCheck(this, 500);"></textarea>
              ���500���֣� 
              <input type="hidden" name="address"  id="address"> <input type="hidden" name="postcode"  id="postcode"></td>
          </tr>
          <!---->
          <tr> 
            <td   class="crm_td">�����ƻ���</td>
            <td colspan="3"   class="crm_input"><textarea name="plan" cols="85" rows="6"  id="plan" onkeyUp="textLimitCheck(this, 500);"></textarea>
              ���500���֣� 
              <input type="hidden" name="address1"  id="address1"> <input type="hidden" name="postcode1"  id="postcode1"></td>
          </tr>
          <!---->
          <tr align="center"> 
            <td colspan="5"   class="crm_submit"> <input type="submit" name="submit" class="submit" value="-����-" title="����󲢷��ع����ճ�"> 
              &nbsp;&nbsp;&nbsp;&nbsp; <input type="submit" name="submit" class="submit" value="-���沢�½�-" title="����󲢷��ص�ǰ����"> 
			  &nbsp;&nbsp;&nbsp;&nbsp; <input type="reset" name="Submit2" class="submit" value="-����-"> 
              &nbsp;&nbsp;&nbsp;&nbsp; <input type="button" value="-����-" onClick="history.go(-1)" class="buttons"> 
            </td>
          </tr>
        </table>

        </form></td>
  </tr>
  <tr>
    <td bgcolor="#FFFFFF" height="30" style="padding:3px;line-height:22px;"><strong>˵����</strong><br>
      1��<font color="#000000">�½��ճ���Ϣ����ϸ��д</font><font color="#FF0000"> *</font>Ϊ������д��<br>
      2��ѡ��ͻ�����ʱ����ϵ��������ַ�����Զ���д����ַ��Ϣ���ֹ��޸ġ�</td>
  </tr>
</table>