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

  if (myform.chancename.value=="")
  {
    alert("��ѡ�������̻���");
    document.myform.chancename.focus();
    return false;
  }
 
	var resualt_metrics=false;
	for(var i=0;i<document.myform.metrics.length;i++)
	{
		
		if(document.myform.metrics[i].checked)
		{
		  resualt_metrics=true;
		}
	}
	if(!resualt_metrics)
	{
		alert("Metrics����ѡһ��");
		document.myform.metrics100.focus();
		return false;
	}     

	var resualt_Economic=false;
	for(var i=0;i<document.myform.Economic.length;i++)
	{
		
		if(document.myform.Economic[i].checked)
		{
		  resualt_Economic=true;
		}
	}
	if(!resualt_Economic)
	{
		alert("Economic����ѡһ��");
		document.myform.Economic1.focus();
		return false;
	}
	
	var resualt_Criteria=false;
	for(var i=0;i<document.myform.Criteria.length;i++)
	{
		
		if(document.myform.Criteria[i].checked)
		{
		  resualt_Criteria=true;
		}
	}
	if(!resualt_Criteria)
	{
		alert("Criteria����ѡһ��");
		document.myform.Criteria1.focus();
		return false;
	}
	
	var resualt_Process=false;
	for(var i=0;i<document.myform.Process.length;i++)
	{
		
		if(document.myform.Process[i].checked)
		{
		  resualt_Process=true;
		}
	}
	if(!resualt_Process)
	{
		alert("Process����ѡһ��");
		document.myform.Process1.focus();
		return false;
	}
	
	var resualt_Identify=false;
	for(var i=0;i<document.myform.Identify.length;i++)
	{
		
		if(document.myform.Identify[i].checked)
		{
		  resualt_Identify=true;
		}
	}
	if(!resualt_Identify)
	{
		alert("Identify Pain����ѡһ��");
		document.myform.Identify100.focus();
		return false;
	}


  if (myform.Champions.value=="")
  {
    alert("��ѡ��championsְλ��Ϣ��");
    document.myform.Champions.focus();
    return false;
  }
  
	var resualt_Championszt=false;
	for(var i=0;i<document.myform.Championszt.length;i++)
	{
		
		if(document.myform.Championszt[i].checked)
		{
		  resualt_Championszt=true;
		}
	}
	if(!resualt_Championszt)
	{
		alert("Championszt�ҳ϶�����ѡһ��");
		document.myform.Championszt1.focus();
		return false;
	}
				
		    
  return true;  
}

 
  function   select_linkmans(){   
    window.open("chance_select_meddic.php","mywin",   "menubar=no,width=410,height=480,resizeable=yes");   
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
          <td>&nbsp;MEDDIC���۷���->�½�����</td>
  </tr>
</table>


<table border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#CCCCCC"  class="bianmamanage" style="padding:0px;">
  <tr> 
          
    <td bgcolor="#EBEBEB" class="tishi">&nbsp;�½�����(<font color="#FF0000">*</font>����д) 
      MEDDIC���������˽�</td>
  </tr>
  <tr> 
    <td bgcolor="#FFFFFF" height="30" style="padding:0px;border-bottom:1px solid #C6CBEE;"> 
	<form name="myform" method="post" action="meddic_addto.php" onsubmit="return FormCheck();" style="padding:0px;margin:0px 0px 0px 0px;">
	          
        <table width="100%" border="0" cellspacing="0" cellpadding="0" >
          <tr> 
            <td bgcolor="#F3F3F3"   class="crm_td">���������ߣ�</td>
            <td width="35%"   class="crm_input"><input name="userid" type="text" value="<?=$_SESSION["userdlname"];?>" id="userid" size="20" maxlength="30" readonly> 
            </td>
            <td width="40%" align="right" bgcolor="#F3F3F3"   class="crm_td"><font color="#FF0000">*</font>�����̻���</td>
            <td width="40%"   class="crm_tdright"> <font color="#FF0000">&nbsp; 
              <input name="chancename" type="text" id="chancename" size="30" maxlength="40" readonly>
              <input type="hidden" name="chanceid"  id="chanceid">
              <input name="select_linkman" type="button"   class="submit" id="select_linkman2"   onClick="select_linkmans();"   value="ѡ��" title="ѡ���̻���">
              </font></td>
          </tr>
          <tr> 
            <td width="15%" bgcolor="#F3F3F3"   class="crm_td"><font color="#FF0000">*</font>Metrics��<br>
              <font color="#0000FF">10��</font> <br> </td>
            <td colspan="3"   class="crm_input"> <font color="#FF0000"> ������������Ч�桢Ͷ������ȣ���ѡ��Ͷ��Ϊ100ʱ�Ĳ����ȣ�������Խ��˵���Կͻ�Խ������</font><br>
              <input type="radio" name="metrics" id="metrics100" value="10">
               <label for="metrics100">100%</label> &nbsp;&nbsp;<input type="radio" name="metrics" id="metrics90" value="9">
               <label for="metrics90">90%</label>&nbsp;&nbsp;<input type="radio" name="metrics" id="metrics80" value="8">
               <label for="metrics80">80%</label>&nbsp;&nbsp;<input type="radio" name="metrics" id="metrics70" value="7">
               <label for="metrics70">70%</label>&nbsp;&nbsp;<input type="radio" name="metrics" id="metrics60" value="6">
               <label for="metrics60">60%</label>&nbsp;&nbsp;<input type="radio" name="metrics" id="metrics50" value="5">
               <label for="metrics50">50%</label>&nbsp;&nbsp;<input type="radio" name="metrics" id="metrics40" value="4">
               <label for="metrics40">40%</label>&nbsp;&nbsp;<input type="radio" name="metrics" id="metrics30" value="3">
               <label for="metrics30">30%</label>&nbsp;&nbsp;<input type="radio" name="metrics" id="metrics20" value="2">
               <label for="metrics20">20%</label>&nbsp;&nbsp;<input type="radio" name="metrics" id="metrics10" value="1">
               <label for="metrics10">10%</label>
               
               
               </td>
          </tr>
          <tr> 
            <td bgcolor="#F3F3F3"   class="crm_td"><font color="#FF0000">*&nbsp;</font>Economic 
              Buyer��<br>
              <font color="#0000FF">(�и���)20��</font> </td>
            <td colspan="3"   class="crm_input"> <font color="#FF0000"> �ʽ�����ˣ���ѡ�����ʽ�����˹�ϵ��</font> 
              <br>
              <input type="radio" name="Economic" id="Economic1" value="20">
               <label for="Economic1">�϶�վ�������</label>&nbsp;&nbsp;<input type="radio" name="Economic" id="Economic2" value="0">
               <label for="Economic2">�м��ˣ���վ���κ���һ��</label>&nbsp;&nbsp;<input type="radio" name="Economic" id="Economic3" value="-10">
               <label for="Economic3">վ�ھ�������һ��</label>
            </td>
          </tr>
          <tr id=chinaaddress1> 
            <td bgcolor="#F3F3F3"   class="crm_td"><font color="#FF0000">*</font>Decision 
              Criteria��<br>
              <font color="#0000FF">(�и���)10��</font> </td>
            <td colspan="3"   class="crm_input"><font color="#FF0000">�˽�ͻ���׼�ľ������̣������Ƿ��˽�ͻ�����֯�ṹ��ϵ���ܻ�����֯�ṹ��ϵͼ��</font>
            	<br>
								<input  type="radio" name="Criteria" id="Criteria1" value="10"><label for="Criteria1">֪����׼�������̣����˽���֯����</label>&nbsp;&nbsp;<input type="radio" name="Criteria" id="Criteria2" value="-10">
               <label for="Criteria2">����̫���</label>            	
            	</td>
          </tr>
          <tr id=chinaaddress1> 
            <td bgcolor="#F3F3F3"   class="crm_td"><font color="#FF0000">*</font>Decision 
              Process��<br>
              <font color="#0000FF">(�и���)10��</font> </td>
            <td colspan="3"   class="crm_input"><font color="#FF0000">���λ����������ʵʩ����������</font>
            	<br>
								<input  type="radio" name="Process" id="Process1" value="10"><label for="Process1">���</label>&nbsp;&nbsp;<input type="radio" name="Process" id="Process2" value="-10">
               <label for="Process2">�����</label>               	
            	</td>
          </tr>
          <tr id=chinaaddress1>
            <td bgcolor="#F3F3F3"   class="crm_td"><font color="#FF0000">*</font>Identify 
              Pain��<br>
              <font color="#0000FF">10��</font> </td>
            <td colspan="3"   class="crm_input"><font color="#FF0000">���ͻ�ȷ�ϵĿͻ�ʹ�����˽�ͻ�ʹ���������Խ���ͻ�ʹ���ٷֱȣ�<br>
              </font> 
 <input type="radio" name="Identify" id="Identify100" value="10">
               <label for="Identify100">100%</label> &nbsp;&nbsp;<input type="radio" name="Identify" id="Identify90" value="9">
               <label for="Identify90">90%</label>&nbsp;&nbsp;<input type="radio" name="Identify" id="Identify80" value="8">
               <label for="Identify80">80%</label>&nbsp;&nbsp;<input type="radio" name="Identify" id="Identify70" value="7">
               <label for="Identify70">70%</label>&nbsp;&nbsp;<input type="radio" name="Identify" id="Identify60" value="6">
               <label for="Identify60">60%</label>&nbsp;&nbsp;<input type="radio" name="Identify" id="Identify50" value="5">
               <label for="Identify50">50%</label>&nbsp;&nbsp;<input type="radio" name="Identify" id="Identify40" value="4">
               <label for="Identify40">40%</label>&nbsp;&nbsp;<input type="radio" name="Identify" id="Identify30" value="3">
               <label for="Identify30">30%</label>&nbsp;&nbsp;<input type="radio" name="Identify" id="Identify20" value="2">
               <label for="Identify20">20%</label>&nbsp;&nbsp;<input type="radio" name="Identify" id="Identify10" value="1">
               <label for="Identify10">10%</label>
              &nbsp;&nbsp; </td>
          </tr>
          <tr id=chinaaddress1> 
            <td bgcolor="#F3F3F3"   class="crm_td"><font color="#FF0000">*</font>Champions��<br>
              <font color="#0000FF">40��</font> </td>
            <td colspan="3"   class="crm_input"><font color="#FF0000">����֯����Ȩ������Ӱ������Ը��Ϊ�����۵��ˣ������ӵ���ߣ��ͻ��ڲ�֧������ˡ�
              </font><br>
              <SELECT   name=Champions size=1 id="Champions" style="background-color:#F0F0F0;">
                <OPTION value="" selected>-Championsְλ-</OPTION>
                <OPTION value="30">�ܲ�(CEO/C*O)</OPTION>
                <OPTION value="20">����/�ܹ�/�����ܼ��</OPTION>
                <OPTION value="10">����/����/�����Ȳ��ż�����</OPTION>
                <OPTION value="1">��ְͨԱ</OPTION>
              </SELECT> 
              &nbsp;&nbsp;
              <input type="radio" name="Championszt" id="Championszt1" value="10">
               <label for="Championszt1">�϶�ӵ���ң����Թ�Champions�ҳ϶�</label>&nbsp;&nbsp;<input type="radio" name="Championszt" id="Championszt2" value="5">
               <label for="Championszt2">ֻ����ɰ��գ�δ���Թ��ҳ϶�</label>&nbsp;&nbsp;     
              </td>
          </tr>
          <tr> 
            <td   class="crm_td">��ע˵����</td>
            <td colspan="3"   class="crm_input"><textarea name="beiz" cols="85" rows="4"  id="beiz" onkeyUp="textLimitCheck(this, 500);"></textarea>
              <br>
              ���500���֣����������̻���������ʶ�� </td>
          </tr>
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
      1��MEDDIC���۷������Ǹ���רҵ��MEDDIC�������������е��̻���������������������������Ա���̻��������˽⣬�Ӷ����ֲ��㣬��ʱ������<br>
       </td>
  </tr>
</table>
<br>