<?
require_once('../lib07/auto_load.php');
require_once('../lib07/pages.inc.php');
if(!defined('dbzz_net')) {
	exit('Access Denied');
}
require_once('../lib07/islogin.php');
$id=addslashes(trim($_GET['id']));

	$sql="select * from market where id='".$id."'";
//	echo $sql;
	$rs=$obj->fetchrow($sql);
	$id=trim($rs->id);
	$marketname=trim($rs->marketname);
	$leix=trim($rs->leix);
	$zhuangt=trim($rs->zhuangt);
	$starttime=trim($rs->starttime);
	$endtime=trim($rs->endtime);
	$qiwsy=trim($rs->qiwsy);
	$qiwcgl=trim($rs->qiwcgl);
	$yuscb=trim($rs->yuscb);
	$shijcb=trim($rs->shijcb);
	$facsl=trim($rs->facsl);
	$remark=trim($rs->remark);
 
	if ($marketname=="")
	{
			echo "<script language=javascript>alert('�г����ݴ���3');document.location.href=('market_manage.php');</script>";
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

  if (myform.marketname.value=="")
  {
    alert("�г�����Ʋ���Ϊ�գ�");
    document.myform.marketname.focus();
    return false;
  }
  if (myform.qiwcgl.value=="")
  {
    alert("��ѡ�������ɹ��ʣ�");
    document.myform.qiwcgl.focus();
    return false;
  }
  if (myform.yuscb.value=="")
  {
    alert("����д�Ԥ��ɱ���");
    document.myform.yuscb.focus();
    return false;
  }   
  return true;  
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
          <td>&nbsp;�ͻ���Դ����->�༭�г��</td>
  </tr>
</table>


<table border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#CCCCCC"  class="bianmamanage" style="padding:0px;">
  <tr> 
          <td bgcolor="#EBEBEB" class="tishi">&nbsp;�༭�г��(<font color="#FF0000">*</font>����д)</td>
  </tr>
  <tr> 
    <td bgcolor="#FFFFFF" height="30" style="padding:0px;border-bottom:1px solid #C6CBEE;"> 
	<form name="myform" method="post" action="market_editto.php" onsubmit="return FormCheck();" style="padding:0px;margin:0px 0px 0px 0px;">
	          <table width="100%" border="0" cellspacing="0" cellpadding="0" >
                <tr> 
                  <td   class="crm_td">�г�������ߣ�</td>
                  <td   class="crm_input"><input name="userid" type="text" value="<?=$_SESSION["userdlname"];?>" id="userid" size="20" maxlength="30" readonly></td>
                  <td align="right"   class="crm_td">���ͣ�</td>
                  <td   class="crm_tdright"> <select name=leix size=1 id="leix" class="crm_select">
                      <OPTION value="��" selected>-��-</OPTION>
                      <OPTION value="����" <?if ($leix=="����") echo "selected";?>>-����-</OPTION>
                      <OPTION value="WEB����" <?if ($leix=="WEB����") echo "selected";?>>-WEB����-</OPTION>
                      <OPTION value="���׻�" <?if ($leix=="���׻�") echo "selected";?>>-���׻�-</OPTION>
                      <OPTION value="����ý��" <?if ($leix=="����ý��") echo "selected";?>>-����ý��-</OPTION>
                      <OPTION value="�������" <?if ($leix=="�������") echo "selected";?>>-�������-</OPTION>
                      <OPTION value="���" <?if ($leix=="���") echo "selected";?>>-���-</OPTION>
                      <OPTION value="ֱ���ʼ�" <?if ($leix=="ֱ���ʼ�") echo "selected";?>>-ֱ���ʼ�-</OPTION>
                      <OPTION value="�������" <?if ($leix=="�������") echo "selected";?>>-�������-</OPTION>
                      
                    </select>
                  </td>
                </tr>
                <tr> 
                  <td width="15%"   class="crm_td"> <font color="#FF0000">*</font>�г�����ƣ�</td>
                  <td width="45%"   class="crm_input"> <input name="marketname" type="text" id="marketname" value="<?=$marketname;?>" size="30" maxlength="40" > 
                  </td>
                  <td width="40%" align="right"   class="crm_td">״̬��</td>
                  <td width="40%"   class="crm_tdright"><select name=zhuangt size=1 id="zhuangt" class="crm_select">
                      <OPTION value="��" selected>-��-</OPTION>
                      <OPTION value="�ƻ���" <?if ($zhuangt=="�ƻ���") echo "selected";?>>-�ƻ���-</OPTION>
                      <OPTION value="��Ч��" <?if ($zhuangt=="��Ч��") echo "selected";?>>-��Ч��-</OPTION>
                      <OPTION value="�ǻ��" <?if ($zhuangt=="�ǻ��") echo "selected";?>>-�ǻ��-</OPTION>
                      <OPTION value="���" <?if ($zhuangt=="���") echo "selected";?>>-���-</OPTION>
                       
                    </select> </tr>
                <tr> 
                  <td   class="crm_td">��ʼ���ڣ�</td>
                  <td   class="crm_input"><input name="kaisrq"  onClick="return Calendar('kaisrq');" type="text" value="<?=$starttime;?>" id="kaisrq" size="20"  maxlength="20"> 
                  </td>
                  <td align="right"   class="crm_td">�������ڣ�</td>
                  <td   class="crm_tdright"><script type="text/javascript" src="../js/date_select.js"></script> 
                    <input name="jiesrq"  onClick="return Calendar('jiesrq');" type="text"  id="jiesrq" size="20" value="<?=$endtime;?>" maxlength="20"> 
                  </td>
                </tr>
                <tr id=chinaaddress1> 
                  <td   class="crm_td">�������棺</td>
                  <td   class="crm_input"><input name="qiwsy" type="text" value="<?=$qiwsy;?>" id="qiwsy" size="30" maxlength="50"> 
                  </td>
                  <td align="right"   class="crm_td"><font color="#FF0000">*</font>�����ɹ��ʣ�</td>
                  <td   class="crm_input"><SELECT 
      name=qiwcgl size=1 id="qiwcgl" class="crm_select">
                      <OPTION value="" selected>-��ѡ��-</OPTION>
<OPTION value=100 <?if ($qiwcgl=="100") echo "selected";?>>100%</OPTION>
<OPTION value=90 <?if ($qiwcgl=="90") echo "selected";?>>90%</OPTION>
<OPTION value=80 <?if ($qiwcgl=="80") echo "selected";?>>80%</OPTION>
<OPTION value=70 <?if ($qiwcgl=="70") echo "selected";?>>70%</OPTION>
<OPTION value=60 <?if ($qiwcgl=="60") echo "selected";?>>60%</OPTION>
<OPTION value=50 <?if ($qiwcgl=="50") echo "selected";?>>50%</OPTION>
<OPTION value=40 <?if ($qiwcgl=="40") echo "selected";?>>40%</OPTION>

                    </SELECT> </td>
                </tr>
                <tr> 
                  <td   class="crm_td"> <font color="#FF0000">*</font>�Ԥ��ɱ��� 
                  </td>
                  <td  id=areacodetd class="crm_input"><input name="yuscb"  value="<?=$yuscb;?>" type="text" id="yuscb" size="20" maxlength="30" >
                    Ԫ/����� </td>
                  <td align="right"   class="crm_td">�ʵ�ʳɱ���</td>
                  <td   class="crm_tdright"><input name="shijcb" type="text" value="<?=$shijcb;?>" id="shijcb" size="20" maxlength="30" >
                    Ԫ/�����</td>
                </tr>
                <tr> 
                  <td   class="crm_td">����������</td>
                  <td   class="crm_input"><input name="facsl" type="text" value="<?=$facsl;?>" id="yuscb3" size="20" maxlength="30" > 
                  </td>
                  <td align="right"   class="crm_td">&nbsp;</td>
                  <td   class="crm_tdright">&nbsp; </td>
                </tr>
                <tr> 
                  <td   class="crm_td">��ע��</td>
                  <td colspan="3"   class="crm_input">
			<?
		  					$spintr=trim($remark);
								$spintr=str_replace("<br />","", $spintr);
                $spintr=str_replace("&nbsp;", " ", $spintr);
		  ?>                  	
                  	<textarea name="beiz" cols="85" rows="5"  id="beiz" onkeyUp="textLimitCheck(this, 500);"><?=stripslashes($spintr);?></textarea>
                    ���500���֣� 
                    <input type="hidden" name="id"  id="id" value="<?=$id;?>">
                     </td>
                </tr>
                <tr align="center"> 
                  <td colspan="5"   class="crm_submit"> <input type="submit" name="Submit" class="submit" value="-ȷ���޸�-"> 
                    &nbsp;&nbsp;&nbsp;&nbsp; <input type="reset" name="Submit2" class="submit" value="-����-"> 
                    &nbsp;&nbsp;&nbsp;&nbsp; <input type="button" value="-����-" onClick="history.go(-1)" class="buttons"> 
                  </td>
                </tr>
              </table>

        </form></td>
  </tr>
  <tr>
    <td bgcolor="#FFFFFF" height="30" style="padding:3px;line-height:22px;"><strong>˵����</strong><br>
            1���г����Ϣ����ϸ��д<font color="#FF0000"> *</font>Ϊ������д��</td>
  </tr>
</table>