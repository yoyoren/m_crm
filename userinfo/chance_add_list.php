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
    alert("�������Ʋ���Ϊ�գ�");
    document.myform.rctitle.focus();
    return false;
  }
  if (myform.chengjrq.value=="")
  {
    alert("��ѡ��Ԥ�Ƴɽ�����");
    document.myform.chengjrq.focus();
    return false;
  }  
   if (myform.linkname.value=="")
  {
    alert("����ѡ����ϵ������");
    document.myform.linkname.focus();
    return false;
  } 
  if (myform.clientname.value=="")
  {
    alert("����ѡ��ͻ����ƣ�");
    document.myform.clientname.focus();
    return false;
  }  
  
  if (myform.jied.value=="")
  {
    alert("����ѡ��׶Σ�");
    document.myform.jied.focus();
    return false;
  } 
    
   

         
    
  return true;  
}

  function   select_clients(){   
    window.open("linkman_select_client.php","mywin",   "menubar=no,width=410,height=480,resizeable=yes");   
  } 
  function   select_linkmans(){ 
    window.open("chance_select_linkman.php","mywin",   "menubar=no,width=410,height=480,resizeable=yes");   
  } 
  function   select_markets(){   
    window.open("chance_select_market.php","mywin",   "menubar=no,width=410,height=480,resizeable=yes");   
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
          <td>&nbsp;�ͻ���Դ����->���������Ϣ</td>
  </tr>
</table>


<table border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#CCCCCC"  class="bianmamanage" style="padding:0px;">
  <tr> 
          <td bgcolor="#EBEBEB" class="tishi">&nbsp;��������(<font color="#FF0000">*</font>����д)</td>
  </tr>
  <tr> 
    <td bgcolor="#FFFFFF" height="30" style="padding:0px;border-bottom:1px solid #C6CBEE;"> 
	<form name="myform" method="post" action="chance_addto.php" onsubmit="return FormCheck();" style="padding:0px;margin:0px 0px 0px 0px;">
	          <table width="100%" border="0" cellspacing="0" cellpadding="0" >
                <tr> 
                  <td   class="crm_td">sales name��</td>
                  <td   class="crm_input"><input name="userid" type="text" value="<?=$_SESSION["userdlname"];?>" id="userid" size="20" maxlength="30" readonly></td>
                  <td align="right"   class="crm_td">Ԥ�Ƴɽ���</td>
                  <td   class="crm_tdright"> <input name="gujje"  type="text"  id="gujje" size="20"  maxlength="20">
                    <font color="#FF0000">Ԫ/�����</font></td>
                </tr>
                <tr> 
                  <td width="15%"   class="crm_td"> <font color="#FF0000">*</font>�޽ύ�׷�ʽ��</td>
                 <!-- <td width="45%"   class="crm_input"> <input name="chancename" type="text" id="chancename" size="30" maxlength="40" > </td>-->
                  <td   class="crm_tdright">
                  <span class="crm_tdright">
                    <select name="chancename" size=1 id="chancename" class="crm_select">
                      <option value="" selected>-��ѡ��-</option>
                      <!--��ӿ�ʼ-->
                      <option value="Ԥ�����ͬ" >-Ԥ�����ͬ-</option>
                      <option value="���𿨹�����ͬ" >-���𿨹�����ͬ-</option>
                      <option value="���ⶨ����ͬ" >-���ⶨ����ͬ-</option>
                      <option value="��ǩ��ֱͬ�ӹ���" >-��ǩ��ֱͬ�ӹ���-</option>
                      <option value="���ⶨ��Э��" >-���ⶨ��Э��-</option>
                      <option value="����" >-����-</option>
                      <!--��ӽ���-->
                    </select>
                    </span>
                  </td>
                  <td   class="crm_td">Ԥ��ǩԼʱ�䣺</td>
                  <td   class="crm_input"><input name="signDate"  onClick="return Calendar('signDate');" type="text"  id="signDate" size="20"  maxlength="20">                  </td>
                    </tr>
                <!--������ڿ�ʼ-->
                <tr> 
                <td   class="crm_td"><font color="#FF0000">*</font>��ϵ�ˣ�</td>
                  <td   class="crm_input"> <input name="linkname" type="text" id="linkname" readonly size="10" maxlength="20" > 
                    <input type="hidden" name="linknameid"  id="linknameid"> 
                    
                  <INPUT name="select_linkman" TYPE="button"   class="submit" id="select_linkman"   onclick="select_linkmans();"   value="ѡ��" title="ѡ����ϵ��ʱ���ͻ���Ҳ�Զ���д">                  </td>
                  
                  <td align="right"   class="crm_td"><font color="#FF0000">*</font>Ԥ�Ƹ������ڣ�</td>
                  <td   class="crm_tdright"><script type="text/javascript" src="../js/date_select.js"></script> 
                    <input name="payDate"  onClick="return Calendar('payDate');" type="text"  id="payDate" size="20"  maxlength="20">                  </td>
                </tr>
                <!--������ڽ���-->
                <tr> 
                 
                    <td   class="crm_td"><font color="#FF0000">*</font>�ͻ����ƣ�ȫ�ƣ���</td>
                  <td   class="crm_input"><input name="clientname" type="text" id="clientname" size="30" maxlength="40" readonly> 
                    <input type="hidden" name="clientid"  id="clientid"> </td>
                  <td align="right"   class="crm_td"><font color="#FF0000">*</font>���ۿ����ԣ�</td>
                  <td   class="crm_tdright"><select name=jied size=1 id="jied" class="crm_select">
                    <option value="" selected>-��ѡ��-</option>
                    <!--��ӿ�ʼ-->
                    <option value="10% ������" >-10% ������-</option>
                    <option value="25% ��ѿ��" >-25% ��ѿ��-</option>
                    <option value="50% ������" >-50% ������-</option>
                    <option value="75% ������" >-75% ������-</option>
                    <option value="90% ժ����" >-90% ժ����-</option>
                    <option value="100% �����" >-100% �����-</option>
                    <!--��ӽ���-->
                  </select></td>
                </tr>
                <tr id=chinaaddress1> 
                  
                    <td align="right"   class="crm_td">�ͻ�����</td>
                   
                  <td   class="crm_input"><SELECT 
      name=possibility size=1 id="possibility" class="crm_select">
                      <OPTION value="" selected>-��ѡ�񼶱�-</OPTION>
                    <OPTION value="A">A</OPTION>
                    <OPTION value="B">B</OPTION>
                    <OPTION value="C">C</OPTION>
                    <OPTION value="D">D</OPTION>
                 
                    </SELECT> </td>
                  
                    <td width="40%" align="right"   class="crm_td">�������ڣ�</td>
                <td width="40%"   class="crm_tdright"><script type="text/javascript" src="../js/date_select.js"></script> <input name="chengjrq"  onClick="return Calendar('chengjrq');" type="text"  id="chengjrq" size="20"  maxlength="20">                </tr>
                <!--�������-->
                 <tr id=chinaaddress2> 
                 <td align="right"   class="crm_td">����Ŀ�ģ�</td>
                  <td   class="crm_input">
                  <SELECT name="directly" size=1 id="directly" class="crm_select">
                    <OPTION value="" selected>-��ѡ����Ŀ��-</OPTION>
                    <OPTION value="����">����</OPTION>
                    <OPTION value="��Ʒ">��Ʒ</OPTION>
                    <OPTION value="�����Ź�">�����Ź�</OPTION>
                    <OPTION value="�����Ź�">�����Ź�</OPTION>
                    <OPTION value="����">����</OPTION>
                    </SELECT> </td>
                  <td align="right"   class="crm_td">��Ʒ��ʽ��</td>
                  <td   class="crm_input">
                  <SELECT name="content" size=1 id="content" class="crm_select">
                    <OPTION value="" selected>-��ѡ����ʽ-</OPTION>
                    <OPTION value="ֽ�ʴ���ȯ">ֽ�ʴ���ȯ</OPTION>
                    <OPTION value="����">����</OPTION>
                    <OPTION value="��ֵ��">��ֵ��</OPTION>
                    <OPTION value="����ȯ">����ȯ</OPTION>
                    <OPTION value="���">���</OPTION>
                    <OPTION value="����">����</OPTION>
                    </SELECT> </td>
                </tr>
                 <!--��ӹ���Ŀ�Ĺ������ݽ���-->
                 <!--�ۿۺ���Լ��ʽ-->
                  <tr id=chinaaddress3> 
                  <td   class="crm_td">�ۿۣ�</td>
                  <td   class="crm_input"><input name="discount" type="text" id="discount" size="30" maxlength="40" > 
                    <input type="hidden" name="disId"  id="disId"> </td>
                  <td align="right"   class="crm_td">���۲�Ʒ���ƣ�</td>
                  <td   class="crm_input">
                  <SELECT  name="contract" size=1 id="contract" class="crm_select">
                      <OPTION value="" selected>-��ѡ��-</OPTION>
                    <OPTION value="���⿨">���⿨</OPTION>
                    <OPTION value="���⿨�ײ����">���⿨�ײ����</OPTION>
                 
                    </SELECT> </td>
                </tr>
                <!--�ۿۺ���Լ��ʽ-->
               
                <tr> 
                  <td   class="crm_td">  ��һ���� </td>
                  <td  id=areacodetd class="crm_input"><input name="next" type="text" id="next" size="30" maxlength="50" >                  </td>
                  <td align="right"   class="crm_td">�������棺</td>
                  <td   class="crm_tdright"><input name="qiwsy" type="text"  id="qiwsy" size="30" maxlength="50"></td>
                </tr>
                <tr> 
                  <td   class="crm_td">������Դ��</td>
                  <td   class="crm_input"><select name=xiansuo size=1 id="xiansuo" class="crm_select">
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
                    </select> </td>
                  <td align="right"   class="crm_td">�г��Դ��</td>
                  <td   class="crm_tdright"><input name="shic" type="text"  id="shic" size="30" readonly maxlength="80">
                    <input type="hidden" name="shicid"  id="shicid">
                    <INPUT name="select_market" TYPE="button"   class="submit"   onclick="select_markets();"   value="ѡ��">                  </td>
                </tr>
                <tr> 
                  <td   class="crm_td">��ע��</td>
                  <td colspan="3"   class="crm_input"><textarea name="beiz" cols="85" rows="5"  id="beiz" onkeyUp="textLimitCheck(this, 500);"></textarea>
                    ���500���֣� 
                    <input type="hidden" name="address"  id="address">
                    <input type="hidden" name="postcode"  id="postcode"></td>
                </tr>
                <tr align="center"> 
                  <td colspan="5"   class="crm_submit"> <input type="submit" name="Submit" class="submit" value="-ȷ���½�-"> 
                    &nbsp;&nbsp;&nbsp;&nbsp; <input type="reset" name="Submit2" class="submit" value="-����-"> 
                    &nbsp;&nbsp;&nbsp;&nbsp; <input type="button" value="-����-" onClick="history.go(-1)" class="buttons">                  </td>
                </tr>
              </table>

      </form></td>
  </tr>
  <tr>
    <td bgcolor="#FFFFFF" height="30" style="padding:3px;line-height:22px;"><strong>˵����</strong><br>
            1��<font color="#000000">�̻���Ϣ����ϸ��д</font><font color="#FF0000"> *</font>Ϊ������д��<br>
            2��ѡ����ϵ����ʱ���ͻ���Ҳ���Զ���д��</td>
  </tr>
</table>